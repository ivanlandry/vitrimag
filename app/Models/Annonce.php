<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopePublier($query)
    {
        return $query->where('publier', true);
    }


    public function sous_category()
    {
        return $this->belongsTo(SousCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favoris()
    {
        return $this->hasMany(Favoris::class);
    }
}
