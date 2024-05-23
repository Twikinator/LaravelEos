<?php

namespace App\Containers\Members\Controllers;

use Illuminate\Http\Request;
use App\Containers\Members\Models\Member;
use Illuminate\Validation\ValidationException;
use App\Containers\Members\Repositories\MemberRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Containers\Members\Actions\AttachTagAction;
use App\Containers\Members\Actions\ShowAllAction;
use App\Containers\Members\Actions\ShowOneAction;
use App\Containers\Members\Actions\StoreAction;
use App\Containers\Members\Actions\UpdateAction;
use App\Containers\Members\Actions\DestroyMemberAction;

class MemberController extends Controller
{
    protected $memberRepository;
    
    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function attachTag(Request $request, $memberId)
    { 
        // if (Member::find($memberId)) {
        //     $tag = MemberTag::find($request->tag_id);
        //     if ($tag) {
        //         $tag->member_id = $memberId;
        //         $tag->save();
        //         return response()->json(["message" => "Tag attached to member"], 200);
        //     } else {
        //         return response()->json(["message" => "Tag not found"], 404);
        //     }
        // }
        // else {
        //     return response()->json(["message" => "Member not found"], 404);
        // }
            $result = new AttachTagAction($this->memberRepository);
            return response()->json($result->run($request, $memberId));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $members = Member::all();
        // return response()->json($members);

        $result = new ShowAllAction($this->memberRepository);
        return response()->json($result->run());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*try {
            $request->validate([
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'email' => 'required|email|unique:members,email',
                'date_of_birth' => 'required|date',
            ]);

            // Member::create($validated);
            // return response()->json(["message" => "Member record created"], 201);

            $member = $this->memberRepository->create($request->all());
            return response()->json($member, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }*/
        $result = new StoreAction($this->memberRepository);
        return response()->json($result->run($request));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $member = Member::find($id);
        // $tags = MemberTag::where('member_id', $id)->get();
        // if ($member) {
        //     return response()->json(['member' => $member, 'tags' => $tags]);
        // } else {
        //     return response()->json(["message" => "Member not found"], 404);
        // }

        //return response()->json($this->memberRepository->find($id));
        $result = new ShowOneAction($this->memberRepository);
        return response()->json($result->run($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $member = Member::find($id);
            $request->validate([
                'name' => 'string|max:255',
                'surname' => 'string|max:255',
                'email' => 'email|unique:members,email',
                'date_of_birth' => 'date',
            ]);

            // if ($member) {
            //     $member->update($validated);
            //     return response()->json(["message" => "Member record updated"], 200);
            // } else {
            //     return response()->json(["message" => "Member not found"], 404);
            // }

            /*$member = $this->memberRepository->update($id, $request->all());
            return response()->json($member);*/
            $result = new UpdateAction($this->memberRepository);
            return response()->json($result->run($request, $id));
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $member = Member::find($id);
        // $tags = MemberTag::where('member_id', $id)->get();
        // if ($member) {
        //     $tags->each->delete();
        //     $member->delete(); 
        //     return response()->json(["message" => "Member record deleted"], 200);
        // } else {
        //     return response()->json(["message" => "Member not found"], 404);
        // }

        /*$this->memberRepository->delete($id);
        return response()->json(null, 204);*/
        $result = new DestroyMemberAction($this->memberRepository);
        return response()->json($result->run($id));
    }
}
