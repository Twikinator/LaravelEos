<?php
namespace App\Containers\Members\Actions;
use App\Containers\Members\Repositories\MemberRepositoryInterface;
use Illuminate\Http\Request;

class UpdateAction {
    protected $memberRepository;
    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function run(Request $request, string $id) {
        $result = $this->memberRepository->update($id, $request->all());
        return response()->json($result);
    }
}