<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function search(Request $request) {
        $query = $request->input('query');
        $stocks = Stock::where('symbol', $query)
            ->get(['symbol', 'name']);

        if ($stocks->isEmpty()) {
            return response()->json(['message' => 'No Matchin results found.'], 404);
        }
        return response()-> json($stocks);
    }
}
