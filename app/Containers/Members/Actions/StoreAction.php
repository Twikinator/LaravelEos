<?php
namespace App\Containers\Members\Actions;
use App\Containers\Members\Repositories\MemberRepositoryInterface;
use Illuminate\Http\Request;

class StoreAction {

    public function run(Request $request, MemberRepositoryInterface $memberRepository) {
        $member = $memberRepository->create($request->all());
        return response()->json($member);
    }
}