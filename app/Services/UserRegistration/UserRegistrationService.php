<?php

namespace App\Services\UserRegistration;

use App\DTOs\CreateUserDTO;
use LaravelEasyRepository\BaseService;

interface UserRegistrationService extends BaseService{

    // Write something awesome :)
    function registerUser(CreateUserDTO $createUserDTO);
}
