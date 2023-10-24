<?php

namespace App\Http\Livewire\Admin;

use App\Models\Report;
use Livewire\Component;

// Підключення моделі Report

class WithTrashed extends Component
{
    public bool $is_withTrashed = false;

    public function withTrashed()
    {
        $this->is_withTrashed = !$this->is_withTrashed;
    }

    public function render()
    {
        if ($this->is_withTrashed) {
            $trashed = Report::whereHas('user', function ($query) {
                $query->whereNotNull('id')->where('deleted_at', null);
            })
                ->where('is_read', true)
                ->orderBy('id')
                ->paginate(7);
        } else {
            $trashed = Report::whereHas('user', function ($query) {
                $query->whereNotNull('id')->where('deleted_at', null);
            })
                ->where('is_read', false)
                ->orderBy('id')
                ->paginate(7);
        }

        return view('livewire.admin.with-trashed', ["reports" => $trashed]);
    }
}
