<?php

namespace App\Http\Controllers;

use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginSociety(Request $request)
    {
        $data = $request->validate([
            'id_card_number' => 'required',
            'password' => 'required'
        ]);

        $society = Society::with('regionals')->where('id_card_number', $data['id_card_number'])->first();

        if($society){
            if(Hash::check($data['password'], $society->password)){
                $token = md5($society->id_card_number);
                $society->login_tokens = $token;
                $society->save();
                $society['token'] = $society->login_tokens;
                return response()->json([
                    'data' => $society,
                    'message' => 'Login success'
                ]);
            }
        }

        return response()->json([
            'data' => [],
            'message' => 'ID Card Number or Password incorrect'
        ]);
    }

    public function logoutSociety(Request $request)
    {
        $society = Society::where('login_tokens', $request->bearerToken())->first();
        
        if($society){
            $society->login_tokens = null;
            $society->save();
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
