<?php
namespace App\Containers\Members\Actions;
use App\Containers\Members\Repositories\MemberRepositoryInterface;

class ShowAllAction {
    
    public function run(MemberRepositoryInterface $memberRepository) {
        return response()->json($memberRepository->all());
    }
}