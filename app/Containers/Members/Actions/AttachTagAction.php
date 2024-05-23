<?php
namespace App\Containers\Members\Actions;
use Illuminate\Http\Request;
use App\Containers\Members\Repositories\MemberRepositoryInterface;

class AttachTagAction {
    protected $memberRepository;

    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function run(Request $request, $memberId) {
        return response()->json($this->memberRepository->attachTag($request->all(), $memberId));
    }
}