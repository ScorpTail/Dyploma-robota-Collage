<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class FilterComponent extends Component
{
    use WithPagination;

    public bool $is_withTrashed = false;
    public $searchOrder = "";

    public function restore($id)
    {
        Service::withTrashed()->find($id)->update(["deleted_at" => null]);
        $this->reset();
    }

    public function searchOrder()
    {
        $this->resetPage();
    }

    public function updatingOrder()
    {
        $this->resetPage();
    }

    public function withTrashed()
    {
        $this->is_withTrashed = !$this->is_withTrashed;
    }

    public function render()
    {
        $query = Service::query();

        if ($this->searchOrder) {
            $query->where('id', 'LIKE', '%' . $this->searchOrder . '%');
        }

        if ($this->is_withTrashed) {
            $query->onlyTrashed();
        }

        $trashed = $query->orderBy("id")->paginate(15);

        return view('livewire.admin.service.filter-component', ["services" => $trashed]);
    }

}
