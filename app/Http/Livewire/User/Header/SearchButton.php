<?php

namespace App\Http\Livewire\User\Header;

use App\Models\Service;
use App\Models\User;
use Livewire\Component;

class SearchButton extends Component
{

    public $search;
    protected $hints = [];

    public function mount()
    {
        $this->updatedSearch();
    }

    public function updatedSearch()
    {
        $this->hints = [];

        if (!empty($this->search)) {
            $this->hints = Service::where('title', 'ilike', '%' . $this->search . '%')
                ->limit(10)->get();

            if ($this->hints->isEmpty()) {
                $query = User::where("name", "ilike", "%" . $this->search . "%")->pluck("id");
                $this->hints = Service::whereIn('user_id', $query)->limit(10)->get();
            }
        }
    }

    public function handleSearch()
    {
        return redirect()->route("user.services.services.index", ["hints" => $this->search]);
    }

    public function render()
    {
        return view('livewire.user.header.search-button', ['hints' => $this->hints]);
    }

}
