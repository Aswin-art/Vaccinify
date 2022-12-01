<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function societies()
    {
        return $this->belongsTo(Society::class, 'society_id', 'id');
    }

    public function doctors()
    {
        return $this->belongsTo(Medical::class, 'doctor_id', 'id');
    }
}
