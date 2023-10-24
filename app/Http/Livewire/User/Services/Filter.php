<?php

namespace App\Http\Livewire\User\Services;

use App\Models\Service;
use Livewire\Component;

class Filter extends Component
{
    public $max;
    public $min;
    public $startMax;
    public $startMin;

    public function mount()
    {
        $this->startMax = Service::all()->max("price");
        $this->startMin = Service::all()->min("price");
        $this->max = request("max") ?? $this->startMax ?? 2500;
        $this->min = request("min") ?? $this->startMin ?? 0;
    }

    public function render()
    {
        return view(
            'livewire.user.services.filter',
            [
                "max" => $this->max,
                "min" => $this->min,
                "startMax" => $this->startMax,
                "remont" => Service::where("type_work", "2")->count(),
                "restavration" => Service::where("type_work", "1")->count(),
                "new" => Service::where("status", "1")->count(),
                "popular" => Service::where("status", "2")->count(),
                "old" => Service::where("status", "3")->count(),
                "delivery" => Service::where("is_delivery", "true")->count(),
                "noDelivery" => Service::where("is_delivery", "false")->count(),
            ]
        );
    }
}
