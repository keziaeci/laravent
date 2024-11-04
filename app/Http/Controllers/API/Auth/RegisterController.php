<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserRegistration\UserRegistrationService;

class RegisterController extends Controller
{
    public function __construct(protected UserRegistrationService $userRegistrationService) {
    }
    
    function __invoke(StoreUserRequest $request) {
        try {
            return $this->userRegistrationService->registerUser($request->createUserDTO())->toJson();
        } catch (\Exception $e) {
            Log::error(json_encode($e->getMessage(),JSON_PRETTY_PRINT));
        }
    }
}
