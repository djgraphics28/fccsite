<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\GroupStoreRequest;
use App\Http\Requests\GroupUpdateRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.groups.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::where('is_active', 1)->get();

        return view('backend.groups.create', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupStoreRequest $request)
    {
        $data = [
            'name' => ucwords($request->name),
            'member_id' => $request->leader,
        ];

        $data = Group::create($data);

        if($data) {
            toastr()->success('New Group has been created successfully!');
            return redirect()->route('groups.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $members = Member::where('is_active', 1)->get();
        return view('backend.groups.edit', compact('group', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupUpdateRequest $request, string $id)
    {
        $group = Group::findOrFail($id);

        $data = [
            'name' => ucwords($request->name),
            'member_id' => $request->leader,
        ];

        $group->update($data);

        return redirect()->route('groups.index')->with('success', 'Group Info is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
