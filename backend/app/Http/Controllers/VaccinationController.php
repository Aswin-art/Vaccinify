<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Medical;
use App\Models\Society;
use App\Models\Vaccination;
use App\Models\Vaccine;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{
    public function postVaccine(Request $request)
    {
        $data = $request->validate([
            'spot_id' => 'required',
            'vaccine_id' => 'required',
            'date' => 'required|date'
        ]);

        $society = Society::where('login_token', $request->bearerToken())->first();
        $consultation = Consultation::where('society_id', $society->id)->first();
        $total_vaccine = Vaccination::where('society_id', $society->id)->get()->count();
        $medical_doctor = Medical::where('spot_id', $request->spot_id)->where('role', 'doctor')->first();
        $medical_officer = Medical::where('spot_id', $request->spot_id)->where('role', 'officer')->first();
        $vaccine = Vaccine::where('id', $request->vaccine_id)->first();

        if($consultation->status == 'accepted'){
            if($total_vaccine == 2){
                return response()->json([
                    'data' => [],
                    'message' => 'Society has been 2x vaccinated'
                ], 401);
            }elseif($total_vaccine == 1){
                $first_vaccine = Vaccination::where('society_id', $society->id)->first();

                $picked_date = $data['date'];
                $first_vaccine_date = Carbon::make($first_vaccine->date);
                $diff_days = $picked_date->diffInDays($first_vaccine_date);

                if($diff_days >= 30){
                    $data['society_id'] = $society->id;
                    $data['dose'] = 2;
                    $data['doctor_id'] = $medical_doctor;
                    $data['officer_id'] = $medical_officer;
                    $data['vaccine_id'] = $vaccine;
                    Vaccination::create($data);
                    return response()->json([
                        'data' => [],
                        'message' => 'Second vaccination registered successful'
                    ]);
                }else{
                    return response()->json([
                        'data' => [],
                        'message' => 'Wait at least +30 days from 1st Vaccination'
                    ], 422);
                }
            }else{
                $data['society_id'] = $society->id;
                $data['dose'] = 1;
                $data['doctor_id'] = $medical_doctor;
                $data['officer_id'] = $medical_officer;
                $data['vaccine_id'] = $vaccine;
                Vaccination::create($data);

                return response()->json([
                    'data' => [],
                    'message' => 'First vaccination registered successful'
                ]);
            }
        }else{
            return response()->json([
                'data' => [],
                'message' => 'Your consultation must be accepted by 
                doctor before'
            ], 401);
        }
    }

    public function getVaccine(Request $request)
    {
        
    }
}
