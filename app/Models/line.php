<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class line extends Model
{
    use HasFactory;
    // Relation
    public function offers(){
        return $this->belongsToMany('App\Models\Offer')->withTimestamps();
    }
}
