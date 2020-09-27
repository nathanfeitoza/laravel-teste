<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutosController extends Controller
{
    const TABLE = 'autos';

    public function index()
    {
        $autos = Auto::all();

        return response()->json($autos);
    }

    public function show($id)
    {
        $auto = Auto::query()->find($id);

        if (!$auto) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        return response()->json($auto);
    }
}
