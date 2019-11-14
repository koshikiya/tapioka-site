<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tapioca;


class UsersController extends Controller
{
    public function favorites($id){
        
        $user = User::find($id);
        $tapiocas = $user->favorites()->orderBy('created_at', 'desc')->paginate(12);
        
        $data = [
            'user' => $user,
            'tapiocas' => $tapiocas,
        ];
        
        return view('tapiocas.favorites', $data);
    }
    public function delete_confirm(){
        
        $user = \Auth::user();
        return view('tapiocas.delete_confirm',['user' => $user]);
    }
    
    public function deleteData($id){
    
        $user = User::find($id);
        if (\Auth::id() === $user->id){ 
            $user->tapiocas()->delete();
            $user->delete();
        }
        return redirect('/');
    }
    
   
}
