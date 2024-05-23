<?php
namespace App\Containers\Members\Actions;
use App\Containers\Members\Repositories\MemberRepositoryInterface;

class ShowOneAction {

    public function run(string $id, MemberRepositoryInterface $memberRepository) {
        return response()->json($memberRepository->find($id));
    }
}