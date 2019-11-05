<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function favorites($id){
        
        $user = User::find($id);
        $tapiocas = $user->favorites()->paginate(10);
        
        $data = [
            'user' => $user,
            'tapiocas' => $tapiocas,
        ];
        
        return view('tapiocas.favorites', $data);
    }
}
