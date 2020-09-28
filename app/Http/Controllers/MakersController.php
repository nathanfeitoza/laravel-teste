<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Maker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class MakersController extends Controller
{
    use ControllerTrait;

    const TABLE = 'makers';
    const VALIDATION_INPUTS = [
        'name' => ['required', 'max:100'],
        'email' => ['required', 'unique:makers', 'max:100'],
        'website' => ['required', 'max:255'],
        'logo' => ['required', 'max:255'],
        'password' => ['required', 'max:50'],
    ];

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
        $request->validate(self::VALIDATION_INPUTS);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $maker = new Maker();
        $maker->fill($data);
        $save = $maker->save();

        return $this->responser(['save' => $save]);
    }

    public function update(Request  $request, $id)
    {
        $this->validateUpdate($request);

        $data = $request->all();

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $maker = new Maker();
        $update = $maker->newQuery()->where($maker->getPrimaryKey(), '=', $id)->update(
            $data
        );

        return $this->responser(['save' => $update]);
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
