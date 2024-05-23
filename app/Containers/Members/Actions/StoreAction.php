<?php
namespace App\Containers\Members\Actions;
use App\Containers\Members\Repositories\MemberRepositoryInterface;
use Illuminate\Http\Request;

class StoreAction {
    protected $memberRepository;
    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function run(Request $request) {
        $member = $this->memberRepository->create($request->all());
        return response()->json($member);
    }
}