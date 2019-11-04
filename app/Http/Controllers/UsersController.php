<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function favorites($id){
        
        $user = User::find($id);
        $tapiokas = $user->favorites()->paginate(10);
        
        $data = [
            'user' => $user,
            'tapiokas' => $tapiokas,
        ];
        
        return view('tapiokas.favorites', $data);
    }
}
