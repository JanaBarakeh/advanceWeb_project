<?php

namespace App\Http\Controllers;
use App\Models\User;
class userController extends Controller
{
    public function getUser(){
     $users = User::all();
     return response($users);
    }
}