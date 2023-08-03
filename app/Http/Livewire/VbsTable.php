<?php

namespace App\Http\Livewire;

use App\Models\Vbs;
use App\Models\Member;
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
        $maxAge = 12;

        $this->kids = Member::whereRaw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN ? AND ?", [$minAge, $maxAge])
            ->where('vbs_added', 0)
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

    public function addToVbs($id)
    {
        $birthDate = Member::find($id)->value('birth_date');
        $age = date_diff(date_create($birthDate), date_create('today'))->y;

        if ($age >= 4 && $age <= 6) {
            $ageRange = '4 - 6';
        } else if ($age >= 7 && $age <= 9) {
            $ageRange = '7 - 9';
        } else if ($age >= 10 && $age <= 12) {
            $ageRange = '10 - 12';
        } else {
            $ageRange = '4 - 6';
        }

        $data = Vbs::updateOrCreate(
            ['member_id' => $id],
            ['member_id' => $id, 'age_range' => $ageRange, 'vbs_added' => 1]
        );

        if($data) {
            toastr()->success('Successfully added to VBS!');
        }
    }
}
