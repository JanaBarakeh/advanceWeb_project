<?php

namespace App\Http\Controllers;
use App\Models\User;

class usercontroller extends Controller
{
    public function getUser(){
     $users = User::all();
     return response($users);
    }
}


