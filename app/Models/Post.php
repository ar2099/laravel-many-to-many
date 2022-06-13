<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'category_id',  'author', 'data', 'title', 'text'
    ];

    public function Category(){
        return $this->belongsTo("App\Models\Category");
    }
}
