<?php

namespace App\Http\Controllers\API\Auth;

use App\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    use ApiResponse;

    function login(LoginRequest $request) {

        if (Auth::attempt(['username' => $request->username,'password' => $request->password],$request->remember)) {
            $user = $request->user();
            $token = $user->createToken('laravent-token')->plainTextToken;
            
            return $this->sendResponse(
                result: [
                    'user'  => $user,
                    'token' => $token
                ],
                message:'User logged in successfully.'
            );
        } else {
            return $this->sendError(
                error: 'Your credential does not match.',
                errorMessages: [
                    'error' => 'Your credential does not match.'
                ],
                code: Response::HTTP_UNAUTHORIZED
            );
        }

    }
}
