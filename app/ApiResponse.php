<?php

namespace App;

trait ApiResponse
{
    protected function sendResponse($result, $message, $code = 200) {
        return response()->json([
            'success' => true,
            'data'    => $result,
            'message' => $message
        ],$code);
    }

    protected function sendError($error, $errorMessages = [], $code = 400) {
        $response = [
            'success' => false,
            'message' => $error
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response,$code);
    }
}
