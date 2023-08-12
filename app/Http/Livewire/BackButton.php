<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BackButton extends Component
{
    protected $debug = true;
    public function render()
    {
        return view('livewire.back-button');
    }

    public function goBack()
    {
        logger('goBack method called');
        return redirect()->back();
    }
}
