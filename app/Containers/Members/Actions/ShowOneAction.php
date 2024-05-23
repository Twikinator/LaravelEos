<?php
namespace App\Containers\Members\Actions;
use App\Containers\Members\Repositories\MemberRepositoryInterface;

class ShowOneAction {
    protected $memberRepository;
    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function run(string $id) {
        return response()->json($this->memberRepository->find($id));
    }
}