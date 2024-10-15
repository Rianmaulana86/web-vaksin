<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Travel;

class TravelController extends Controller
{
    public function getTravel($id)
    {
        if (!is_numeric($id)) {
            return response()->json(['error' => 'Invalid ID'], 400);
        }
        $travel_data = Travel::where('id', $id)->get();
        if ($travel_data->isEmpty()) {
            return response()->json(['message' => 'No records found'], 404);
        }
        return response()->json($travel_data);
    }
}