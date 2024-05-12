<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message'=> "Validation Error!",
                'reason' => $validator->errors()->messages(),
            ]);
        }

        $validated = $validator->validated();
        
        if (
            Auth::attempt([
            'email'=>$validated['email'],
            'password'=>$validated['password']
            ])) {
                $request->user()->tokens()->delete();

                $token = $request->user()->createToken("MOBILE_APP_KEY")->plainTextToken;

                return response()->json([
                    'status' => 'ok',
                    'message' => 'Anda telah berhasil masuk',
                    "reason"=>null,
                    "token"=>$token,
                ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Wrong email / password',
                "reason"=>null,
            ]);
        }
 
    }

    
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:12',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message'=>"Validation Error!",
                'reason' => $validator->errors()->messages(),
            ]);
        }

        $validated = $validator->validated();
         
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];

        $result = $user->save();
        if($result){
            return response()->json([
                'status' => 'ok',
                'message' => 'Anda telah berhasil mendaftar',
                "reason"=>null,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occured',
                "reason"=>null,
            ]);
        }
    }


}
