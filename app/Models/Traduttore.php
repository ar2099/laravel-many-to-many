<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traduttore extends Model
{
    protected $fillable = [
      'nome',  'lingua'
    ];
    public function posts(){
        return $this->belongsToMany("App\Models\Post");
    }
}
