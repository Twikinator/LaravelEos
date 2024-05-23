<?php
namespace App\Containers\Members\Actions;
use App\Containers\Members\Repositories\MemberRepositoryInterface;
use Illuminate\Http\Request;

class DestroyMemberAction {

    public function run(string $id, MemberRepositoryInterface $memberRepository) {
        $result = $memberRepository->delete($id);
        return response()->json($result);
    }
}