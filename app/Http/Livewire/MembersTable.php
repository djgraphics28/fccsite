<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;

class MembersTable extends Component
{
    public function render()
    {
        $records = Member::latest()->get();
        return view('livewire.members-table', [
            'records'=> $records
        ]);
    }
}
