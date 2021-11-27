<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    // relations 
    public function offers(){
        return $this->belongsToMany('App\Models\Offer')->withTimestamps();
    }
}
