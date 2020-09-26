<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutosController extends Controller
{
    const TABLE = 'autos';

    public function index()
    {
        $autos = DB::table(self::TABLE)->get();

        return response()->json($autos);
    }

    public function show($id)
    {
        $auto = DB::table(self::TABLE)->where('idauto', '=', $id)->first(['*']);

        if (!$auto) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        return response()->json($auto);
    }
}
