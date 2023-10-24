<?php

namespace App\Http\Livewire\User\Services;

use Livewire\Component;

class Sort extends Component
{
    public $sort;

    public function mount()
    {
        $this->sort = request('sort', 'asc');
    }

    public function render()
    {
        return view('livewire.user.services.sort');
    }
}

