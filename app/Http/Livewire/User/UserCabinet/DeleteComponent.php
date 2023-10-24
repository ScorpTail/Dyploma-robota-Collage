<?php

namespace App\Http\Livewire\User\UserCabinet;

use Livewire\Component;
use Livewire\WithPagination;

class DeleteComponent extends Component
{
    use WithPagination;

    protected $services;

    public function removeAll()
    {
        auth()->user()->services()->detach();
        $this->services = auth()->user()->services;
    }

    public function delete($id)
    {
        auth()->user()->services()->detach($id);
        $this->services = auth()->user()->services()->paginate(2);
    }

    public function render()
    {
        $this->services = auth()->user()->services()->paginate(2);
        return view('livewire.user.user-cabinet.delete-component', ["services" => $this->services]);
    }
}
