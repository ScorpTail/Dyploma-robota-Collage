<?php

namespace App\Http\Livewire\User\Services;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Favorite extends Component
{

    public $serviceId;
    public $isFavorite;

    public function mount()
    {
        if (auth()->check()) {
            $this->isFavorite = DB::table('service_user')
                ->where('user_id', auth()->user()->id)
                ->where('service_id', $this->serviceId)
                ->exists();
        }
    }

    public function toggleFavorite($serviceId)
    {
        if (auth()->check()) {
            if ($this->isFavorite) {
                DB::table('service_user')
                    ->where('user_id', auth()->user()->id)
                    ->where('service_id', $serviceId)
                    ->delete();
            } else {
                DB::table('service_user')->insert([
                    'user_id' => auth()->user()->id,
                    'service_id' => $serviceId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        } else {
            return redirect()->route("user.authorization.index");
        }

        $this->isFavorite = !$this->isFavorite;
    }

    public function render()
    {
        return view('livewire.user.services.favorite');
    }
}
