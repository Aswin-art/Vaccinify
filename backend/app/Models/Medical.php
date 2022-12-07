<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at', 'spot_id', 'user_id'];

    public function spots()
    {
        return $this->belongsTo(Spot::class, 'spot_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }
}
