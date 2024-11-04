<?php

namespace App\Repositories\UserRegistration;

use App\Models\User;
use LaravelEasyRepository\Implementations\Eloquent;

class UserRegistrationRepositoryImplement extends Eloquent implements UserRegistrationRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)


    function updateOrCreate(array $data) {
        return $this->model->updateOrCreate([
            'username' => $data['username'],
            'email'    => $data['email'],
        ],[
            'name'     => $data['name'],
            'password' => $data['password'],
        ]);
    }
}
