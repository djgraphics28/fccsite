<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;

class GroupsTable extends Component
{
    use WithPagination;
    // public $status;

    public $searchTerm;

    protected $listeners = ['remove'];
    public $approveConfirmed;
    // filters
    public $perPage = 10;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.groups-table', [
            'records'=> $this->records
        ]);
    }

    public function getRecordsProperty()
    {
        return Group::with('leader')->latest()
        ->search(trim($this->searchTerm))
        ->paginate($this->perPage);
    }

    public function members()
    {
        dd('members');
    }
}
