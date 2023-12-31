<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\MemberStoreRequest;
use App\Http\Requests\MemberUpdateRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('backend.members.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberStoreRequest $request)
    {
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $memberExists = Member::where('first_name', $firstName)
                        ->where('last_name', $lastName)
                        ->first();

        if ($memberExists) {
            toastr()->warning('The first name and last name combination is already in use.');
            return;
        }

        $data = [
            'title' => ucwords(strtolower($request->title)),
            'first_name' => ucwords(strtolower($request->firstName)),
            'middle_name' => ucwords(strtolower($request->middleName)),
            'last_name' => ucwords(strtolower($request->lastName)),
            'ext_name' => ucwords(strtolower($request->extName)),
            'nickname' => ucwords(strtolower($request->nickname)),
            'gender' => $request->gender,
            'birth_date' => $request->birthDate,
            'address' => $request->address,
            'contact_number' => $request->contactNumber,
            'email' => $request->email,
            'date_baptized' => $request->dateBaptized,
            'is_first_time' => $request->isFirstTime,
            'position' => $request->position,
        ];

        $data = Member::create($data);

        // Upload profile picture if provided
        if ($request->hasFile('profile_picture')) {
        $member->addMediaFromRequest('profile_picture')
            ->toMediaCollection('profile_picture');
        }

        if($data) {
            toastr()->success('New Member has been created successfully!');
            $request->session()->put('searchTerm', $request->input('firstName'));
            return redirect()->route('members.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('backend.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberUpdateRequest $request, Member $member)
    {

        $data = [
            'title' => ucwords(strtolower($request->title)),
            'first_name' => ucwords(strtolower($request->firstName)),
            'middle_name' => ucwords(strtolower($request->middleName)),
            'last_name' => ucwords(strtolower($request->lastName)),
            'ext_name' => ucwords(strtolower($request->extName)),
            'nickname' => ucwords(strtolower($request->nickname)),
            'gender' => $request->gender,
            'birth_date' => $request->birthDate,
            'address' => $request->address,
            'contact_number' => $request->contactNumber,
            'email' => $request->email,
            'date_baptized' => $request->dateBaptized,
            'is_first_time' => $request->isFirstTime,
            'position' => $request->position,
        ];

        $member->update($data);
        // Upload profile picture if provided
        if ($request->hasFile('profile_picture')) {
            $member->addMediaFromRequest('profile_picture')
                ->toMediaCollection('profile_picture');
        }
        $request->session()->put('searchTerm', $request->input('firstName'));
        return redirect()->route('members.index')->with('success', 'Member Info is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
