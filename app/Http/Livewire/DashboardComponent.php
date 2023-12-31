<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\Family;
use App\Models\Member;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DashboardComponent extends Component
{
    public $totalMembers = 0;
    public $totalLeaders = 0;
    public $totalSeniors = 0;
    public $totalKids = 0;
    public $totalYouths = 0;
    public $totalVisitors = 0;
    public $totalMales = 0;
    public $totalFemales = 0;
    public $totalFamilies = 0;
    public $totalGroups = 0;

    public function mount()
    {
        $this->totalMembers = Member::all()->count();
        $this->totalLeaders = 0;
        $this->totalVisitors = Member::where('is_first_time', 1)->get()->count();

        $this->totalKids = Member::whereRaw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN ? AND ?", [4, 12])
            ->where('vbs_added', 0)
            ->orderBy(DB::raw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE())"), 'asc')
            ->get()->count();

        $this->totalYouths = Member::whereRaw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN ? AND ?", [13, 21])
            ->where('vbs_added', 0)
            ->orderBy(DB::raw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE())"), 'asc')
            ->get()->count();

        $this->totalSeniors = Member::whereRaw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN ? AND ?", [60, 100])
            ->where('vbs_added', 0)
            ->orderBy(DB::raw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE())"), 'asc')
            ->get()->count();

        $this->totalMales = Member::where('gender', 'Male')->count();
        $this->totalFemales = Member::where('gender', 'Female')->count();

        $this->totalFamilies = Family::all()->count();

        $this->totalGroups = Group::all()->count();
    }

    public function render()
    {
        return view('livewire.dashboard-component');
    }
}
