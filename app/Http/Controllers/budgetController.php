<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trips;

class budgetController extends Controller
{

    public function insertExpense(Request $request)
{
    // Get trip_id from frontend (via GET or POST)
    $tripId = $request->input('trip_id'); // or $request->get('trip_id');

    // Fetch remaining budget
    $remaining = Trips::where('trip_id', $tripId)->value('remaining_budget');

    // Return as JSON (better for AJAX)
    return response()->json([
        'remaining_budget' => $remaining
    ]);
}

}
