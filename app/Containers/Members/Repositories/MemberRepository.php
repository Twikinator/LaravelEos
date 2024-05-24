<?php

namespace App\Containers\Members\Repositories;

use App\Containers\Members\Repositories\MemberRepositoryInterface;
use App\Containers\Members\Models\Member;
use App\Models\MemberTag;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class MemberRepository implements MemberRepositoryInterface
{
    public function all(): JsonResponse
    {
        return response()->json(Member::all());
    }

    public function find($id): JsonResponse
    {
        try {
            return response()->json(Member::findOrFail($id));
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Member not found'], 404);
        }
    }

    public function create(array $data): JsonResponse
    {
        try {
            Validator::make($data, [
                Member::NAME => 'required|string|max:255',
                Member::SURNAME => 'required|string|max:255',
                Member::EMAIL => 'required|email|unique:members,email',
                Member::DATE_OF_BIRTH => 'required|date',
            ])->validate();
            Member::create($data);
            return response()->json(['message' => 'Member created'], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function update($id, array $data): JsonResponse
    {
        try {
            $member = Member::findOrFail($id);
            try {
                Validator::make($data, [
                    Member::NAME => 'string|max:255',
                    Member::SURNAME => 'string|max:255',
                    Member::EMAIL => 'email|unique:members,email',
                    Member::DATE_OF_BIRTH => 'date',
                ])->validate();
                $member->update($data);
                return response()->json(['message' => 'Member updated'], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => $e->getMessage()], 404);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Member not found'], 404);
        }
    }

    public function delete($id): JsonResponse
    {
        $tags = MemberTag::where(MemberTag::MEMBER_ID, $id)->get();
        // foreach ($tags as $tag) {
        //     $tag->delete();
        // }
        foreach ($tags as $tag) {
            $tag->member_id = null;
            $tag->save();
        }

        try {
            Member::findOrFail($id);
            Member::destroy($id);
            return response()->json(['message' => 'Member deleted'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Member not found'], 404);
        }
    }

    public function attachTag(array $data, $memberId): JsonResponse
    {
        try {
            Member::findOrFail($memberId);
            try {
                $tag = MemberTag::findOrFail($data['tag_id']);
                $tag->member_id = $memberId;
                $tag->save();
                return response()->json(['message' => 'Tag attached to member'], 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'Tag not found'], 404);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Member not found'], 404);
        }
    }
}
