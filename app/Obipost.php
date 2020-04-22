<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obipost extends Model
{
    protected $fillable = ['user_id', 'content', 'title', 'book_title', 'book_author'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
