<?php

namespace App\Http\Controllers;

use App\Models\Maker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MakersController extends Controller
{
    const TABLE = 'makers';

    public function index()
    {
        $makers = DB::table(self::TABLE)->get();

        return response()->json($makers);
    }

    public function show($id)
    {
        $maker = DB::table(self::TABLE)->where('idmaker', '=', $id)->first(['*']);

        if (!$maker) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        return response()->json($maker);
    }

    public function store(Request $request)
    {
        $maker = new Maker();
        $maker->fill($request->all());
        $maker->save();

        return response()->json($maker, 201);
    }
}
