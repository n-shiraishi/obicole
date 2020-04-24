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
    
    public function favorite_users()
    {
      return $this->belongsToMany(User::class, 'favorites', 'obipost_id', 'user_id')->withTimestamps();  
    }
    
    public function wishing_users()
    {
        return $this->belongsToMany(User::class, 'wishes', 'obipost_id', 'user_id')->withTimestamps();
    }
}
