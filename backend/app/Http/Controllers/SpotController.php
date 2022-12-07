<?php

namespace App\Http\Controllers;

use App\Models\Society;
use App\Models\Spot;
use App\Models\SpotVaccine;
use App\Models\Vaccination;
use App\Models\Vaccine;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function getSpot(Request $request)
    {
        $user = Society::where('login_tokens', $request->bearerToken())->first();
        $spots = Spot::where('regional_id', $user->regional_id)->get();
        $vaccines = Vaccine::all();
        $available_vaccines = [];
        foreach($spots as $spot){
            foreach($vaccines as $vaccine){
                $vaccine_type = SpotVaccine::where('vaccine_id', $vaccine->id)->where('spot_id', $spot->id)->exists();
                $exist = $vaccine_type ? 'true' : 'false';
                $available_vaccines[$vaccine['name']] = $exist;
            }
            $spot['available_vaccines'] = $available_vaccines;
        }

        return response()->json([
            'data' => $spots,
            'message' => 'Get spots success'
        ]);
    }

    public function showSpot(Request $request, $id)
    {
        $spot = Spot::where('id', $id)->first();
        if($request->date){
            $date = $request->date;
        }else{
            $date = now();
        }
        $format_date = Carbon::parse($date)->format('F d, Y');
        $vaccination_count = Vaccination::where('date', $request->date)->where('spot_id', $id)->count();
        return response()->json([
            'data' => [
                'date' => $format_date,
                'spot' => $spot,
                'vaccination_count' => $vaccination_count
            ],
            'message' => 'Show spot success'
        ]);
    }
}
