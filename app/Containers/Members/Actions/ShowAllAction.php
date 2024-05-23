<?php
namespace App\Containers\Members\Actions;
use App\Containers\Members\Repositories\MemberRepositoryInterface;

class ShowAllAction {
    protected $memberRepository;
    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function run() {
        return response()->json($this->memberRepository->all());
    }
}