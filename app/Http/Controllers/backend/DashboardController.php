<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request){
        return response()->json([
            'message' => 'Dashboard'
        ]);
    }
}
