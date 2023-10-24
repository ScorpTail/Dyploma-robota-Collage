<?php

namespace App\Http\Livewire\User\UserCabinet\Filter;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class ReportFilter extends Component
{
    use WithPagination;

    public $selectFilter = 3;

    public function updatedSelectFilter()
    {
        $this->resetPage();
    }

    public function resetPage()
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        $reportsQuery = Report::withTrashed()->where('user_id', auth()->user()->id);

        if ($this->selectFilter == 2) {
            $reportsQuery->where('is_read', true);
        } elseif ($this->selectFilter == 3) {
            $reportsQuery->where('is_read', false);
        }

        $reports = $reportsQuery->paginate(2);
        //  dd($reports);
        return view('livewire.user.user-cabinet.filter.report-filter', ['reports' => $reports]);
    }

}
