<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CertificateTemplate;

class MembersTable extends Component
{
    use WithPagination;
    // public $status;

    public $searchTerm;

    protected $listeners = ['remove'];
    public $approveConfirmed;
    // filters
    public $perPage = 10;
    public $sortByGender = '';

    protected $paginationTheme = 'bootstrap';

    public $selectAll = false;
    public $selectedRows = [];
    public $certTemp = [];
    public $certOption;

    public function mount()
    {
        $this->certTemp = CertificateTemplate::all();
    }

    public function render()
    {
        return view('livewire.members-table', [
            'records'=> $this->records
        ]);
    }

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedRows = $this->records->pluck('id');
        }else{
            $this->selectedRows = [];
        }
    }

    public function getRecordsProperty()
    {
        return Member::when($this->sortByGender, function($query){
            $query->where('gender', $this->sortByGender);
        })->latest()
        ->search(trim($this->searchTerm))
        ->paginate($this->perPage);
    }

    public function printCertificate($id)
    {
        $id = collect([
            0 => $id
        ]);

        $this->selectedRows = $id;
        return redirect()->route('generate.certificate', ['memberId' => $id]);
    }

    public function showCertModal()
    {
        $this->dispatchBrowserEvent('show-cert');
    }

    public function bulkPrint()
    {
        $tempId = $this->certOption;

        if($this->selectedRows instanceof \Illuminate\Database\Eloquent\Collection){
            $ids = $this->selectedRows;
        } else {
            $ids = collect($this->selectedRows);
        }
        return redirect()->route('generate.certificate', ['memberId' => $ids, 'tempId'=>$tempId]);
    }
}
