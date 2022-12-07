<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];

    public function societies()
    {
        return $this->hasMany(Society::class);
    }

    public function spots()
    {
        return $this->hasMany(Spot::class);
    }
}
