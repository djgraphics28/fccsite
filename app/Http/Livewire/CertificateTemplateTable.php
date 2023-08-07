<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CertificateTemplate;

class CertificateTemplateTable extends Component
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
        return view('livewire.certificate-template-table', [
            'records'=> $this->records
        ]);
    }

    public function getRecordsProperty()
    {
        return CertificateTemplate::latest()
        ->search(trim($this->searchTerm))
        ->paginate($this->perPage);
    }
}
