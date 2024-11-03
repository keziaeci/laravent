<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(protected UserService $userService) {
    }
    
    function __invoke(StoreUserRequest $request) {
        $data = $request->validated();
        return $this->userService->create($data);
    }
}
