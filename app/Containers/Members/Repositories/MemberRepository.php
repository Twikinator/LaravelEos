<?php
namespace App\Containers\Members\Repositories;

use App\Containers\Members\Repositories\MemberRepositoryInterface;
use App\Containers\Members\Models\Member;
use App\Models\MemberTag;

class MemberRepository implements MemberRepositoryInterface
{
    public function all()
    {
        return Member::all();
    }

    public function find($id)
    {
        return Member::find($id);
    }

    public function create(array $data)
    {
        return Member::create($data);
    }

    public function update($id, array $data)
    {
        $member = Member::find($id);
        $member->update($data);
        return $member;
    }

    public function delete($id)
    {
        return Member::destroy($id);
    }

    public function attachTag(array $data, $memberId)
    {
        if (Member::find($memberId)) {
            $tag = MemberTag::find($data['tag_id']);
            if ($tag) {
                $tag->member_id = $memberId;
                $tag->save();
                return response()->json(["message" => "Tag attached to member"], 200);
            } else {
                return response()->json(["message" => "Tag not found"], 404);
            }
        } else {
            return response()->json(["message" => "Member not found"], 404);
        }
    }
}
