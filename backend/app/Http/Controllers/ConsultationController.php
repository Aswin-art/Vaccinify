<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Society;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function postConsultation(Request $request)
    {
        $user = Society::where('login_token', $request->bearerToken())->first();
        $data = $request->validate([
            'disease_history' => 'required',
            'current_symptoms' => 'required'
        ]);

        $data['society_id'] = $user->id;

        $consultation = Consultation::create($data);

        return response()->json([
            'data' => $consultation,
            'message' => 'Request consultation sent successful'
        ]);
    }
    
    public function getConsultation(Request $request)
    {
        $user = Society::where('login_token', $request->bearerToken())->first();
        $consultation = Consultation::with('doctors')->where('society_id', $user)->get();
        return response()->json([
            'data' => $consultation,
            'message' => 'Get data success'
        ]);
    }
}
