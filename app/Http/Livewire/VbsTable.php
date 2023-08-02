<?php

namespace App\Http\Livewire;

use App\Models\Vbs;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class VbsTable extends Component
{
    use WithPagination;
    // public $status;

    public $searchTerm;
    public $sortByAgeRange;
    public $kids = [];

    protected $listeners = ['remove'];
    public $approveConfirmed;
    // filters
    public $perPage = 10;

    protected $paginationTheme = 'bootstrap';

    public $selectAll = false;
    public $selectedRows = [];

    public function mount()
    {
        $minAge = 4;
        $maxAge = 50;

        $this->kids = DB::table('members')
            ->select('*') // Select the columns you need
            ->whereRaw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN ? AND ?", [$minAge, $maxAge])
            ->orderBy(DB::raw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE())"), 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.vbs-table', [
            'records'=> $this->records
        ]);
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
        return Vbs::with('member')
        ->when($this->sortByAgeRange, function($query){
            $query->where('age_range', $this->sortByAgeRange);
        })
        ->latest()
        ->paginate($this->perPage);
    }

    public function showMembers()
    {
        $this->dispatchBrowserEvent('show-add-modal');
    }
}
