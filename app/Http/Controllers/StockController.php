<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function search(Request $request) {
        $query = $request->input('query');
        $stocks = DB::select("SELECT * FROM stocks WHERE symbol LIKE ? OR name LIKE ? LIMIT 10", ["%$query%", "%$query%"]);

        if (count($stocks) < 1) {
            return response()->json(['message' => 'No Matchin results found.'], 404);
        }
        return response()->json($stocks, 200);
    }
}
