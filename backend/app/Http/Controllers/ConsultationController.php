<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Society;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function postConsultation(Request $request)
    {
        $society = Society::where('login_tokens', $request->bearerToken())->first();
        $vaccinations = Vaccination::where('society_id', $society)->get();
        $total_vaccination = count($vaccinations);
        $pending_consultation = Consultation::where('society_id', $society->id)->where('status', 'pending')->first();
        if($total_vaccination >= 2){
            return response()->json([
                'data' => [],
                'message' => 'You already 2x vaccinated'
            ]);
        }else{
            if($pending_consultation){
                return response()->json([
                    'message' => 'Please wait your first consultation'
                ], 422);
            }else{
                $data = $request->all();

                $data['society_id'] = $society->id;

                Consultation::create($data);

                return response()->json([
                    'data' => [],
                    'message' => 'Request consultation sent successful'
                ]);
            }
        }
    }
    
    public function getConsultation(Request $request)
    {
        $society = Society::where('login_tokens', $request->bearerToken())->first();
        $consultation = Consultation::with('doctors')->where('society_id', $society->id)->get();
        return response()->json([
            'data' => $consultation,
            'message' => 'Get data success'
        ]);
    }
}
