<?php

namespace App\Http\Controllers;



 class usercontroller extends Controller
{
    //


    public function __construct()
    {

    }


    public function getUsers(){
        return "Hello from the controller";
    }

//
//     public function userDetails(){
//         return view('user_details',['firstname'=>'wafa','lastname'=>'adham']);
//     }
}
