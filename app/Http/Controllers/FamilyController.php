<?php

namespace App\Http\Controllers;

use App\Http\Requests\FamilyStoreRequest;
use App\Models\Family;
use App\Models\Member;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.families.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::where('is_active', 1)->get();

        return view('backend.families.create', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FamilyStoreRequest $request)
    {
        $data = [
            'family_name' => ucwords($request->family_name),
            'father' => $request->father,
            'mother' => $request->mother,
        ];

        $data = Family::create($data);

        if($data) {
            toastr()->success('New Family has been created successfully!');
            return redirect()->route('families.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        //
    }
}
