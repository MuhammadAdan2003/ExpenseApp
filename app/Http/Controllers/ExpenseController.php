<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\Trips;
use Illuminate\Validation\ValidationException;

class ExpenseController extends Controller
{
    public function addExp(Request $req)
    {
        try {
            // Validate incoming request
            $validated = $req->validate([
                'amount' => 'required|integer',
                'category' => 'required|string',
                'expense_date' => 'required|date',
                'notes' => 'nullable|string',
                'trip_id' => 'nullable',
            ]);

             $trip = Trips::find($validated['trip_id']);
            // Add user_id from logged in user
            $validated['user_id'] = auth()->id();

            // Insert into DB
            // Agar amount zyada hua to stop karo
            if ($validated['amount'] > $trip->remaining_budget) {
                return response()->json([
                    'success' => false,
                    'message' => 'Budget khatm ho gaya hai.',
                ]);
            }

           
            // Expense create
            $expense = Expenses::create($validated);

            // Budget update in DB
            $trip->remaining_budget = $trip->remaining_budget - $validated['amount'];
            $trip->save();

            return response()->json([
                'success' => true,
                'message' => 'Expense added successfully.',
                'remaining_budget' => $trip->remaining_budget,
            ]);

            // dd($currRemain);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Expense added successfully!',
                    'data' => $expense,
                ],
                200,
            ); // 201 = Created
        } catch (ValidationException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $e->errors(),
                ],
                422,
            ); // 422 = Unprocessable Entity
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Something went wrong',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }
    
    public function exp($trip_id)
    {
        $expenses = Expenses::where('trip_id', $trip_id)->get();
        return response()->json([
            'success' => true,
            'expenses' => $expenses,
        ]);
    }

    public function destroy($expense_id)
    {
        $exp = Expenses::where('expense_id', $expense_id)
                     ->where('user_id', Auth::id()) // ensure user owns the trip
                     ->first();

        if (!$exp) {
            return response()->json([
                'message' => 'Trip not found or unauthorized'
            ], 404);
        }

        $exp->delete();

        return response()->json([
            'message' => 'Trip Deleted successfully'
        ], 200);
    }
}
