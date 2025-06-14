<?php

namespace App\Http\Controllers;

use App\Models\ApiUser;
use Illuminate\Http\Request;

class PassportAuthController extends Controller
{
    public function register(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8',
        ]);

        $user=ApiUser::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        $token=$user->createToken('Wh@T€vEr')->accessToken();

        return response()->json(['token'=>$token],200);
    }

    public function login(Request $request){

        $data=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(auth()->attempt($data)){
            $token=auth()->user()->createToken('Wh@T€vEr')->accessToken();
            return response()->json(['token'=>$token],200);
        }else{
            return response()->json(['error'=>'Unauthorised'],401);
        }
    }

    public function userInfo(){

        $user=auth()->user();
        return response()->json(['user'=>$user],200);

    }
}
