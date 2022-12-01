<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotVaccine extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function spots()
    {
        return $this->belongsTo(Spot::class, 'spot_id', 'id');
    }

    public function vaccines()
    {
        return $this->belongsTo(Vaccine::class, 'vaccine_id', 'id');
    }
}
