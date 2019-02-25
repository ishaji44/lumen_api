<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        # code...
        $name = $request->input('name');
        $email = $request->input('email');
        $password =Hash::make($request->input('password'));
        
        $register = User::create([
            'name'=> $name,
            'email'=>$email,
            'password'=> $password
            ]);
            if($register){
                return response()->json([
                    'succes'=>true,
                    'pesan'=> 'Register Berhasil!',
                    'data'=> $register
                ], 201);
            }else{
                return response()->json([
                    'succes'=>false,
                    'pesan'=> 'Register Gagal!',
                    'data'=> ''
                ], 400);
            }
            
        }
        
        public function login(Request $request )
        {
            # code...
            $email=$request->input('email');
            $password=$request->input('password');
            $user = User::where('email', $email)->first();
            
            if(Hash::check($password, $user->password)){
                $apiToken = base64_encode(str_random(40));
                $user->update([
                    'api_token'=>$apiToken
                    ]);
                    
                    return response()->json([
                        'succes'=> true,
                        'pesan'=> 'Login Berhasil!',
                        'data'=> [
                            'user' => $user,
                            'api token' => $apiToken
                            ]
                        ], 200);
                    }else{
                        return response()->json([
                            'succes'=> false,
                            'pesan'=> 'Login Gagal!',
                            'data'=>''
                        ], 401);
                    }
                }
                
                
            }
            