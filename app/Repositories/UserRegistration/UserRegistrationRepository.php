<?php

namespace App\Repositories\UserRegistration;

use LaravelEasyRepository\Repository;

interface UserRegistrationRepository extends Repository{

    // Write something awesome :)
    function updateOrCreate(array $data);
}
