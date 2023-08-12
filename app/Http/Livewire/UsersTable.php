<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
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
        return view('livewire.users-table', [
            'records'=> $this->records
        ]);
    }

    public function getRecordsProperty()
    {
        return User::latest()
        ->search(trim($this->searchTerm))
        ->paginate($this->perPage);
    }
}
