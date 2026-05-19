<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;



class AuthController extends Controller
{
    



// registerUSer
public function registerUser(request $request){
    try{

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'user_image'=>'required',
            
        ]);

        $imagePath = $request->file('user_image')->store('user_image','public');
        
        $user = User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password'=>Hash::make($request->password),
            'user_image'=>$imagePath
        ]);

        return response()->json([
            'status' =>true,
            'message'=>'User register succesfully',
            'data'=>$user
        ]);

    }catch(Exception $e){
        return response()->json([
            'status'  => false,
            'message' => $e->getMessage()
        ]);

    }  

}


// Login
public function login(request $request){

    $request->validate([
        "email" =>'required|email',
        "password"=>'required'
    ]);

    $credential = [
    "email" =>$request->email,
    "password" => $request->password 
    ];

    if(!Auth::attempt($credential)){
            return response()->json([
                "code" =>401,
                "status" => false,
                "message" => "Invalid credentials"
            ]);
    }

    $user = Auth::user();

    // generate token
    $token = $user->createToken("auth_token")->plainTextToken;

        return response([  
            "status" =>true,
            "message" =>"Login successfull",
            "user" =>$user,
            "token" =>$token
        ],200);
 
}






















}