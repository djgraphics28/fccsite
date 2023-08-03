<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VbsController extends Controller
{
    public function index()
    {
        return view('backend.vbs.index');
    }
}
