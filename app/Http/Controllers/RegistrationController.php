<?php

namespace App\Http\Controllers;

use App\Models\Member;
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

    public function success($id)
    {
        $data = Member::find($id);
        $name = $data->first_name;
        $isFirstTime = $data->is_first_time;
        return view('success', compact('name','isFirstTime'));
    }

    public function submitESignature($id)
    {
        return view('submit-e-signature');
    }

    public function storeSignature(Request $request)
    {
        dd($request->all());
    }
}
