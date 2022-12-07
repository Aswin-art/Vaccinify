<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Medical;
use App\Models\Society;
use App\Models\SpotVaccine;
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
            'date' => 'required|date'
        ]);

        $society = Society::where('login_tokens', $request->bearerToken())->first();
        $consultation = Consultation::where('society_id', $society->id)->first();
        $total_consultation = Consultation::where('society_id', $society->id)->count();
        $total_vaccine = Vaccination::where('society_id', $society->id)->get()->count();
        $medical_doctor = Medical::where('spot_id', $request->spot_id)->where('role', 'doctor')->first();
        $medical_officer = Medical::where('spot_id', $request->spot_id)->where('role', 'officer')->first();
        $spot_vaccine = SpotVaccine::where('spot_id', $request->spot_id)->first();
        $vaccine = Vaccine::where('id', $spot_vaccine->vaccine_id)->first();

        if($consultation->status == 'accepted'){
            if($total_vaccine >= 2){
                return response()->json([
                    'data' => [],
                    'message' => 'Society has been 2x vaccinated'
                ], 401);
            }elseif($total_vaccine == 1){
                if($total_consultation == 1){
                    return response()->json([
                        'data' => [],
                        'message' => 'You must consultation first before get vaccine'
                    ], 401);
                }
                $first_vaccine = Vaccination::where('society_id', $society->id)->first();
                $picked_date = Carbon::parse($data['date']);
                $first_vaccine_date = Carbon::parse($first_vaccine->date);
                $diff_days = $picked_date->diffInDays($first_vaccine_date);

                if($diff_days >= 30){
                    $data['society_id'] = $society->id;
                    $data['dose'] = 2;
                    $data['doctor_id'] = $medical_doctor->id;
                    $data['officer_id'] = $medical_officer->id;
                    $data['vaccine_id'] = $vaccine->id;
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
                $data['doctor_id'] = $medical_doctor->id;
                $data['officer_id'] = $medical_officer->id;
                $data['vaccine_id'] = $vaccine->id;
                // $data['date'] = Carbon::make($request->date);
                Vaccination::create($data);

                return response()->json([
                    'data' => [],
                    'message' => 'First vaccination registered successful'
                ]);
            }
        }else{
            return response()->json([
                'data' => [],
                'message' => 'Your consultation must be accepted by doctor before'
            ], 401);
        }
    }

    public function getVaccine(Request $request)
    {
        $society = Society::where('login_tokens', $request->bearerToken())->first();
        $first_vaccinations = Vaccination::with(['spots.regionals', 'vaccines', 'doctors'])->where('society_id', $society->id)->where('dose', 1)->first();
        $second_vaccinations = Vaccination::with(['spots.regionals', 'vaccines', 'doctors'])->where('society_id', $society->id)->where('dose', 2)->first();
        $get_first_vaccinations = Vaccination::query()->where('dose', 1)->orderBy('created_at', 'asc')->get();
        $get_second_vaccinations = Vaccination::query()->where('dose', 2)->orderBy('created_at', 'asc')->get();

        if($first_vaccinations){
            $first_vaccinations['vaccination_date'] = $first_vaccinations->date;
            $first_vaccinations['status'] = 'done';
            $count = 1;
            foreach($get_first_vaccinations as $first_vaccine){
                if($first_vaccine->society_id == $society->id){
                    break;
                }

                $count++;
            }

            $first_vaccinations['queue'] = $count;
        }

        if($second_vaccinations){
            $second_vaccinations['vaccination_date'] = $second_vaccinations->date;
            $second_vaccinations['status'] = 'done';
            $count = 1;
            foreach($get_second_vaccinations as $second_vaccine){
                if($second_vaccine->society_id == $society->id){
                    break;
                }

                $count++;
            }

            $first_vaccinations['queue'] = $count;
        }

        return response()->json([
            'data' => [
                'vaccination' => [
                    'first' => $first_vaccinations,
                    'second' => $second_vaccinations
                ]
            ],
            'message' => 'Get data success'
        ]);
    }
}
