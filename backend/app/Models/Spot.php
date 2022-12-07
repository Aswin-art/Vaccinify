<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at', 'regional_id'];

    public function regionals()
    {
        return $this->belongsTo(Regional::class, 'regional_id', 'id');
    }

    public function spot_vaccines()
    {
        return $this->hasMany(SpotVaccine::class);
    }

    public function medicals()
    {
        return $this->hasMany(Medical::class);
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }
}
