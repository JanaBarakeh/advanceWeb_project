<?php

namespace App\Http\Controllers;
use App\Models\User;
abstract class Controller
{
    public function getUser(){
     $users = User::all();
     return respons($users);
    }
}
