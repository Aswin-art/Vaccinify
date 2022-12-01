<?php

namespace App\Http\Controllers;

use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginSociety(Request $request)
    {
        $data = $request->validate([
            'id_card_number' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            $society = Society::with('regionals')->where('id_card_number', $request->id_card_number)->first();
            $token = md5($society->id_card_number);
            $society->id_card_number = $token;
            $society->save();
            return response()->json([
                'data' => $society,
                'message' => 'Login success'
            ]);
        }else{
            return response()->json([
                'data' => [],
                'message' => 'ID Card Number or Password incorrect'
            ]);
        }
    }

    public function logoutSociety(Request $request)
    {
        $society = Society::where('token', $request->token)->first();
        
        if($society){
            return response()->json([
                'data' => [],
                'message' => 'Logout success'
            ]);
        }else{
            return response()->json([
                'data' => [],
                'message' => 'Invalid token'
            ]);
        }
    }
}
