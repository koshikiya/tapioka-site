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
    
    public function tapiokas(){
        
        return $this->hasMany(Tapioka::class);
    }
    //お気に入りしているタピオカ
    public function favorites(){
        
        return $this->belongsToMany(Tapioka::class,'favorites','user_id','tapioka_id')->withTimestamps();
    }
    
    public function favorite($tapiokaId){
        
        $exist = $this->is_favorite($tapiokaId);
        
        if($exist){
            return false;
        }else{
            $this->favorites()->attach($tapiokaId);
            return true;
        }
    }
    public function unfavorite($tapiokaId){
        
        $exist = $this->is_favorite($tapiokaId);
        if($exist){
            $this->favorites()->detach($tapiokaId);
            return true;
        }else{
            return false;
        }
    }
    //お気に入りしているかどうか
    public function is_favorite($tapiokaId){
        
        return $this->favorites()->where('tapioka_id',$tapiokaId)->exists();
    }
}
