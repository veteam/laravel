<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try{
            $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            ]);
        // echo('die');
            $user = User::create(request(['name', 'email', 'password' => Hash::make($request->password)]));

            $token = $user->createToken('My Token')->accessToken;
            return response()->json(['token' => $token], 200);
        }
        catch(\Throwable $th){
            return ('Return to Jamrock');
        }
        // return $user;
    }
}

