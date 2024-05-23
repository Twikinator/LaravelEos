<?php

namespace App\Containers\Members\Controllers;

use Illuminate\Http\Request;
use App\Containers\Members\Models\Member;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Containers\Members\Actions\AttachTagAction;
use App\Containers\Members\Actions\ShowAllAction;
use App\Containers\Members\Actions\ShowOneAction;
use App\Containers\Members\Actions\StoreAction;
use App\Containers\Members\Actions\UpdateAction;
use App\Containers\Members\Actions\DestroyMemberAction;
use App\Containers\Members\Repositories\MemberRepositoryInterface;
use Illuminate\Http\JsonResponse;

class MemberController extends Controller
{
    protected $memberRepository;
    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }


    public function attachTag(Request $request, $memberId, AttachTagAction $result) : JsonResponse
    { 
        return response()->json($result->run($request, $memberId, $this->memberRepository));
    }

    public function index(ShowAllAction $result) : JsonResponse
    {
        return response()->json($result->run($this->memberRepository));
    }

    public function store(Request $request, StoreAction $result) : JsonResponse
    {
        return response()->json($result->run($request, $this->memberRepository));
    }

    public function show(string $id, ShowOneAction $result) : JsonResponse
    {
        return response()->json($result->run($id, $this->memberRepository));
    }

    public function update(Request $request, string $id, UpdateAction $result) : JsonResponse
    {
        try {
            $request->validate([
                Member::NAME => 'string|max:255',
                MEMBER::SURNAME => 'string|max:255',
                MEMBER::EMAIL => 'email|unique:members,email',
                MEMBER::DATE_OF_BIRTH => 'date',
            ]);
            return response()->json($result->run($request, $id, $this->memberRepository));
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function destroy(string $id, DestroyMemberAction $result) : JsonResponse
    {
        return response()->json($result->run($id, $this->memberRepository));
    }
}
