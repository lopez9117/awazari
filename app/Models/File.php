<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    public function offers(){
        return $this->belongsToMany('App\Models\Offer')->withTimestamps();
    }
}
