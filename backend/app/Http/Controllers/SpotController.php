<?php

namespace App\Http\Controllers;

use App\Models\Society;
use App\Models\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function getSpot(Request $request)
    {
        $user = Society::where('login_token', $request->bearerToken())->first();
        $spots = Spot::where('regional_id', $user->regional_id)->get();

        return response()->json([
            'data' => $spots,
            'message' => 'Get spots success'
        ]);
    }

    public function showSpot(Request $request, $id)
    {
        $spot = Spot::where('id', $id)->first();

        return response()->json([
            'data' => $spot,
            'message' => 'Show spot success'
        ]);
    }
}
