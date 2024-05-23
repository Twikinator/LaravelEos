<?php
namespace App\Containers\Members\Actions;
use App\Containers\Members\Repositories\MemberRepositoryInterface;
use Illuminate\Http\Request;

class DestroyMemberAction {
    protected $memberRepository;
    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function run(string $id) {
        $result = $this->memberRepository->delete($id);
        return response()->json($result);
    }
}