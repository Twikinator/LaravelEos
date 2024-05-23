<?php
namespace App\Containers\Members\Actions;
use Illuminate\Http\Request;
use App\Containers\Members\Repositories\MemberRepositoryInterface;

class AttachTagAction {

    public function run(Request $request, $memberId, MemberRepositoryInterface $memberRepository) {
        return response()->json($memberRepository->attachTag($request->all(), $memberId));
    }
}