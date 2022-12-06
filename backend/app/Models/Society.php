<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at', 'password', 'login_tokens', 'id', 'id_card_number', 'regional_id'];

    public function regionals()
    {
        return $this->belongsTo(Regional::class, 'regional_id', 'id');
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
