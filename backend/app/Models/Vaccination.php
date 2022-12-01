<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function societies()
    {
        return $this->belongsTo(Society::class, 'society_id', 'id');
    }

    public function spots()
    {
        return $this->belongsTo(Spot::class, 'spot_id', 'id');
    }

    public function vaccines()
    {
        return $this->belongsTo(Vaccine::class, 'vaccine_id', 'id');
    }

    public function doctors()
    {
        return $this->belongsTo(Medical::class, 'doctor_id', 'id');
    }

    public function officers()
    {
        return $this->belongsTo(Medical::class, 'officer_id', 'id');
    }
}
