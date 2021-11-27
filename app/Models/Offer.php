<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    // Relations offers
    public function files(){
        return $this->belongsToMany('App\Models\File')->withTimestamps();
    }

    public function locations(){
        return $this->belongsToMany('App\Models\location')->withTimestamps();
    }

    public function users(){
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
}
