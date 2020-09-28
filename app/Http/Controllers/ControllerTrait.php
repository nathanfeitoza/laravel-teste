<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait ControllerTrait
{
    public function responser(
        $message,
        $statusCode = 200,
        $error = false,
        $httpStatus = 200
    ) {
        $response = [
            'message' => $message,
            'status_code' => $statusCode,
        ];

        if ($error) {
            $response['error'] = true;
        }

        return response()->json($response, $httpStatus);
    }

    private function validateForUpdate(Request $request)
    {
        if (self::VALIDATION_INPUTS) {
            $data = $request->all();

            if (empty($data)) {
                throw new \Exception('Empty data', 5123);
            }

            $dataKeys = array_keys($data);
            $validationInputArray = self::VALIDATION_INPUTS;
            $newValidation = [];

            array_map(
                function ($value) use ($validationInputArray, &$newValidation) {
                    if (isset($validationInputArray[$value])) {
                        $newValidation[$value] = $validationInputArray[$value];
                    }
                },
                $dataKeys
            );

            return $newValidation;
        }

        throw new \Exception('VALIDATION_INPUTS not found', 5124);
    }

    public function validateUpdate(Request $request)
    {
        try {
            $validArray = $this->validateForUpdate($request);
        } catch (\Exception $e) {
            return $this->responser(
                $e->getMessage(),
                $e->getCode(),
                true,
                500
            );
        }

        return $request->validate($validArray);
    }
}
