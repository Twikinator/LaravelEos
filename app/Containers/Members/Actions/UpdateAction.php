<?php
namespace App\Containers\Members\Actions;
use App\Containers\Members\Repositories\MemberRepositoryInterface;
use Illuminate\Http\Request;

class UpdateAction {

    public function run(Request $request, string $id, MemberRepositoryInterface $memberRepository) {
        $result = $memberRepository->update($id, $request->all());
        return response()->json($result);
    }
}