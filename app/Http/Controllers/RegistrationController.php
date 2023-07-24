<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration');
    }

    public function store(Request $request)
    {

    }

    public function success($firstName)
    {
        return view('success', compact('firstName'));
    }
}
