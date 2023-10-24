<?php

namespace App\Http\Livewire\User\UserCabinet\Filter;

use App\Models\Graduation;
use Livewire\Component;
use Livewire\WithPagination;

class GraduationFilter extends Component
{
    use WithPagination;

    public $selectFilter = 1;

    public function render()
    {
        $graduationsQuery = Graduation::withTrashed()->where('email', auth()->user()->email);
        if ($this->selectFilter == 2) {
            $graduationsQuery->where('is_read', true);
            $this->resetPage();
        } elseif ($this->selectFilter == 3) {
            $graduationsQuery->where('is_read', false);
            $this->resetPage();
        }

        $graduations = $graduationsQuery->paginate(2);
        return view('livewire.user.user-cabinet.filter.graduation-filter', ['graduations' => $graduations]);
    }
}
