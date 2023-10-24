<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "type_users";
    protected $guarded = false;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
