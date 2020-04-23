<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function obiposts()
    {
        return $this->hasMany(Obipost::class);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Obipost::class, 'favorites', 'user_id', 'obipost_id')->withTimestamps();
    }
    
    public function favorite($obipostId)
    {
        $exist = $this->favorite_obiposts($obipostId);
        
        if($exist) {
            return false;
        } else {
            $this->favorites()->attach($obipostId);
            return true;
        }
    }
    
    public function unfavorite($obipostId)
    {
        $exist = $this->favorite_obiposts($obipostId);
        
        if($exist) {
            $this->favorites()->detach($obipostId);
            return true;
        } else {
            return false;
        }
    }
    
    public function favorite_obiposts($obipostId)
    {
        return $this->favorites()->where('obipost_id', $obipostId)->exists();
    }
}
