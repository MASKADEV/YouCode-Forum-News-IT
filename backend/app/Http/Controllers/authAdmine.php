<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Validation\Rules\Exists;

use Illuminate\Http\Request;

class authAdmine extends Controller

{
    
    public function register(Request $request)
    {

        $fields = $request->validate([
            'reff_admin' => 'required|String|unique :admins',
            'pass' => 'required|String',
           
        ]);
        $admin = admin::create([
            'reff_admin' => $fields['reff_admin'],
            'pass' => bcrypt($fields['pass']),
           
        ]);
        $token = $admin->createToken('myapptoken')->plainTextToken;
        $response = [
            'admin' => $admin,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function login(Request $request)
    {

        $fields = $request->validate([

            'reff_admin' => 'required|String',
            'pass' => 'required|String',
        ]);
        // check email
        $utilisateur = admin::where('reff_admin', $fields['reff_admin'])->first();
        // check password
        if (!$utilisateur || !Hash::check($fields['pass'], $utilisateur->pass)) {

            return response([
                'message' => 'Bad creds'
            ]);
        }

        $token = $utilisateur->createToken('myapptoken')->plainTextToken;
        $response = [
            'message' => 'success',
            'admin' => $utilisateur,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function logout(Request $request)
    {

        // auth('sanctum')->user()->currentAccessToken()->delete();
        // $request->utilisateur()->currentAccessToken()->delete();
        // $this->->token()->revoke();   
        //  Auth::user()->tokens->each(function($token, $key) {
        //    ->tokens()->delete();
        // auth('sanctum')-> $request->user()->tokens()->delete();
        // $request->user()->currentAccessToken()->delete()
        // $request->user()->token()->delete();
        $request->admin()->tokens()->delete();



        return [
            'message' => 'Logged out'

        ];
    }
}
