<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tapioca extends Model
{
    protected $fillable =['user_id','store_name',
    'item_name','drink_taste','drink_comment','photo',
    'tapioca_taste','tapioca_size','tapioca_quantity',
    'tapioca_comment','category','photo_name'];
    
    public function user(){
        
        return $this->belongsTo(User::class);
    }
    public function favorite_tapiocas(){
        
        return $this->belongsToMany(User::class,'favorites','tapioca_id','user_id')->withTimestamps();
        
    }
   
}
