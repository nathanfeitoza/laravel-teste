<?php

namespace App\Http\Controllers;

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
}
