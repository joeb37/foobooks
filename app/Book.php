<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // This goes with Mass Assignment (opposite of 'fillable' is 'guarded')
    protected $fillable = ['title', 'author', 'published', 'cover', 'purchase_link'];

    public function author() {
        return $this->belongsTo('\App\Author');
    }
}
