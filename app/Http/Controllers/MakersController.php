<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Maker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MakersController extends Controller
{
    use ControllerTrait;

    const TABLE = 'makers';

    public function index()
    {
        $makers = Maker::all(['*']);

        return $this->responser($makers);
    }

    public function show($id)
    {
        $maker = Maker::query()->find($id);

        if (!$maker) {
            return $this->responser(
                'Record not found',
                4041,
                true,
                404
            );
        }

        return $this->responser($maker);
    }

    public function store(Request $request)
    {
        $maker = new Maker();
        $maker->fill($request->all());
        $save = $maker->save();

        return $this->responser(['save' => $save]);
    }

    public function autosOfMaker($id)
    {
        $autosOfMaker = Auto::query()
            ->where('idmaker', '=', $id)->get(['*']);

        if ($autosOfMaker->isEmpty()) {
            return $this->responser(
                'Record not found',
                4042,
                true,
                404
            );
        }

        return $this->responser($autosOfMaker);
    }
}
