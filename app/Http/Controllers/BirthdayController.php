<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    public function index()
    {
         // Get the member grouped by birth month
         $membersByMonth = Member::select('id', 'first_name', 'birth_date', 'gender')
         ->orderBy('birth_date')
         ->get()
         ->groupBy(function ($member) {
             return date('F', strtotime($member->birth_date)); // Format the date to get the month name (e.g., January, February, etc.)
         });

        // Create an array to map month number to month name
        $monthsMap = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December',
        ];

        return view('backend.birthdays.index',[
            'membersByMonth' => $membersByMonth,
            'monthsMap' => $monthsMap,
        ]);
    }
}
