<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
}
