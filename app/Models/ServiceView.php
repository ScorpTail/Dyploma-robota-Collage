<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceView extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = "service_views";

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
