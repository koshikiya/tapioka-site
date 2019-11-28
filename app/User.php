<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

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
    
    protected $table = 'users';
    protected $dates = ['deleted_at'];
    
    //投稿したタピオカ
    public function tapiocas(){
        
        return $this->hasMany(Tapioca::class);
    }
    //お気に入りしているタピオカ
    public function favorites(){
        
        return $this->belongsToMany(Tapioca::class,'favorites','user_id','tapioca_id')->withTimestamps();
    }
    
    public function favorite($tapiocaId){
        
        $exist = $this->is_favorite($tapiocaId);
        
        if($exist){
            return false;
        }else{
            $this->favorites()->attach($tapiocaId);
            return true;
        }
    }
    public function unfavorite($tapiocaId){
        
        $exist = $this->is_favorite($tapiocaId);
        if($exist){
            $this->favorites()->detach($tapiocaId);
            return true;
        }else{
            return false;
        }
    }
    //お気に入りしているかどうか
    public function is_favorite($tapiocaId){
        
        return $this->favorites()->where('tapioca_id',$tapiocaId)->exists();
    }
    
    
}
