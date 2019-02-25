<?php

namespace App\Http\Controllers;
use App\User;

class UserController extends Controller
{
    
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        //
        $this->middleware('auth');
    }
    
    //
    
    public function index($id)
    {
        $user =  User::find($id);
        
        if($user){
            return response()->json([
                'succes'=> true,
                'pesan'=> 'Data ditemukan!',
                'user' => $user
            ], 200);
        }else{
            return response()->json([
                'succes'=> false,
                'pesan'=> 'Data tidak ditemukan!',
                'user' => ''
            ], 404);
        }
    }
}
