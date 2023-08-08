<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $data = [
            'name' => ucwords($request->name),
            'email' =>$request->email,
            'password' => Hash::make($request->password),
        ];

        $data = User::create($data);

        if($data) {
            toastr()->success('New User has been created successfully!');
            return redirect()->route('users.index');
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
    public function edit(User $user)
    {
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        if(!empty($request->password)) {
            $data = [
                'name' => ucwords($request->name),
                'email' =>$request->email,
                'password' => Hash::make($request->password)
            ];
        } else {
            $data = [
                'name' => ucwords($request->name),
                'email' =>$request->email
            ];
        }


        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User Info is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getRoles()
    {
        return view('backend.users.roles');
    }
}
