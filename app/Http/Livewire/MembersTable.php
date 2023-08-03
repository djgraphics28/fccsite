<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;

class MembersTable extends Component
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
        return view('livewire.members-table', [
            'records'=> $this->records
        ]);
    }

    public function getRecordsProperty()
    {
        return Member::latest()
        ->search(trim($this->searchTerm))
        ->paginate($this->perPage);
    }

    public function printCertificate($id)
    {
        return redirect()->route('generate.certificate', ['memberId' => $id]);
    }
}
