<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        $validateData= $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|required|unique:users',  // unique according users table
            'password'=> 'required'  //   we can add confirmed to write password again for sure
        ]);
        $validateData['password']=bcrypt($validateData['password'])
        $user=User::create($validateData);
        $accessToken=$user->createToken('authToken')->accessToken;
        return response(['user'=>$user,'access_token'=>$accessToken]);
    }
    public function login(Request $request){
        $user=User::where('email',$request->email)->first();
        if(!$user){
            return response(['message'=>'User not found']);
        }
        if(!Hash::check($request->password,$user->password)){
            return response(['message'=>'Password is nor correct']);
        }
        $user->tokens()->delete();
        return response()->json([
            'status'=>'success',
            'message'=>'User logged in successfullt',
            'name'=> $user->name,
            'token'=>$user->createToken('auth_token')->plainTextToken,
        ]);
    }
    public function logout(){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status'=>'success',
            'message'=>'User logged out successfuly'
        ]);
    }
}
