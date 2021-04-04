<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

  protected $guarded=[];

    public function scopeCategories($query){
        return $query->with('sous_categories');
    }

    public function sous_categories(){
        return $this->hasMany(SousCategory::class);
    }
}
