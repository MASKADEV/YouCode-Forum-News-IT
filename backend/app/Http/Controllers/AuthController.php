<?php

namespace App\Http\Controllers;

use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Validation\Rules\Exists;

class AuthController extends Controller
{
    //
    public function index()
    {
        return utilisateur::all();
    }
    public function destroy($id)
    {
        return utilisateur::destroy(($id));
    }

    public function register(Request $request)
    {

        $fields = $request->validate([
            'nom' => 'required|String',
            'prenom' => 'required|String',
            'date_naissance' => 'required|Date',
            'email' => 'required|string|unique :utilisateurs,email',
            'pass' => 'required|string'
        ]);
        $utilisateur = utilisateur::create([
            'nom' => $fields['nom'],
            'prenom' => $fields['prenom'],
            'date_naissance' => $fields['date_naissance'],
            'age' => $this->getAge($fields['date_naissance']),
            'email' => $fields['email'],
            'pass' => bcrypt($fields['pass'])
        ]);
        $token = $utilisateur->createToken('myapptoken')->plainTextToken;
        $response = [
            'utilisateur' => $utilisateur,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function login(Request $request)
    {

        $fields = $request->validate([

            'email' => 'required|string',
            'pass' => 'required|string'
        ]);
        // check email
        $utilisateur = utilisateur::where('email', $fields['email'])->first();
        // check password
        if (!$utilisateur || !Hash::check($fields['pass'], $utilisateur->pass)) {

            return response([
                'message' => 'Bad creds'
            ]);
        }

        $token = $utilisateur->createToken('myapptoken')->plainTextToken;
        $response = [
            'message' => 'success',
            'utilisateur' => $utilisateur,
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
        $request->user()->tokens()->delete();



        return [
            'message' => 'Logged out'

        ];
    }

    public function test($id)
    {
    }
    // function getAge 
    public function  getAge($date_naissance)
    {

        $date = new DateTime($date_naissance);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    // update user info 
    public function update(Request $request, $id)
    {

        // $fields = $request->validate([
        //     'nom' => 'required|String',
        //     'prenom' => 'required|String',
        //     'date_naissance' => 'required|Date',
        //     'email' => 'required|string|unique :utilisateurs,email',
        //     'pass' => 'required|string'
        // ]);
        // $utilisateur = utilisateur::create([
        //     'nom' => $fields['nom'],
        //     'prenom' => $fields['prenom'],
        //     'date_naissance' => $fields['date_naissance'],
        //     'age' => $this->getAge($fields['date_naissance']),
        //     'email' => $fields['email'],
        //     'pass' => bcrypt($fields['pass'])
        // ]);
        $fields = $request->all();


        
        if (isset($fields['pass'])) {
            $fields['pass'] = bcrypt($fields['pass']);
        }
        $user = utilisateur::find($id);


        $user->update($fields);

        return $user;
    }

    //  find user info
    public function show($id)
    {
        return  utilisateur::find($id);
    }

    //test old pass

    public function testPass(Request $request,$id)
    {

        $fields = $request->validate([

            'pass' => 'required'
        ]);
        // check email
        $utilisateur = utilisateur::where('id',$id)->first();
        // check password
        if (!$utilisateur || !Hash::check($fields['pass'], $utilisateur->pass)) {

            return response([
                'message' => 'Bad creds'
            ], 200);
        }

        $response = [
            'message'=>"sucess",
            'utilisateur' => $utilisateur,
        ];
        return response($response, 201);
    }
}
