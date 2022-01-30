<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role_id' => '1'
        ]);

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }

    //api

    public function api_reg(Request $request){

//        return response($request, 200);

        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:App\Models\User',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role_id' => '2'
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' =>$token
        ];

        return response($response, 201);

    }
}
