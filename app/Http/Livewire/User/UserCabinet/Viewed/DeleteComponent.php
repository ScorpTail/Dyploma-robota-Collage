<?php

namespace App\Http\Livewire\User\UserCabinet\Viewed;

use Livewire\Component;
use Livewire\WithPagination;

class DeleteComponent extends Component
{
    use WithPagination;

    protected $viewed;
    protected $time;

    public function removeAll()
    {
        session()->forget("history" . "." . auth()->user()->id);
        session()->save();
    }

    public function delete($id)
    {
        session()->forget("history" . "." . auth()->user()->id . "." . $id);
        session()->save();
        $this->resetPage();
    }

    public function render()
    {
        foreach (session()->get("history", [])[auth()->user()->id] ?? [] as $key => $value) {
            $this->time = $value["time"];
            $this->viewed[$key] = $value["value"];
        }
       // dd($this->viewed);
        return view(
            'livewire.user.user-cabinet.viewed.delete-component', ["viewed" => $this->viewed, "time" => $this->time]
        );
    }
}
