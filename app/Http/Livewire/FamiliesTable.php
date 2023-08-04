<?php

namespace App\Http\Livewire;

use App\Models\Family;
use Livewire\Component;
use Livewire\WithPagination;

class FamiliesTable extends Component
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
        return view('livewire.families-table', [
            'records'=> $this->records
        ]);
    }

    public function getRecordsProperty()
    {
        return Family::with(['fatherData', 'motherData'])->latest()
        ->search(trim($this->searchTerm))
        ->paginate($this->perPage);
    }
}
