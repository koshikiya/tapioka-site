<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tapioka extends Model
{
    protected $fillable =['user_id','store_name',
    'item_name','drink_taste','drink_comment','photo',
    'tapioka_taste','tapioka_size','tapioka_quantity',
    'tapioka_comment','category'];
    
    public function user(){
        
        return $this->belongsTo(User::class);
    }
    public function favorite_tapiokas(){
        
        return $this->belongsToMany(User::class,'favorites','tapioka_id','user_id')->withTimestamps();
        
    }
}
