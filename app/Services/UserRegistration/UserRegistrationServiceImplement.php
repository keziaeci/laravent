<?php

namespace App\Services\UserRegistration;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\UserRegistration\UserRegistrationRepository;
use Symfony\Component\HttpFoundation\Response;

class UserRegistrationServiceImplement extends ServiceApi implements UserRegistrationService{

    /**
     * set title message api for CRUD
     * @param string $title
     */
     protected string $title = "";
     /**
     * uncomment this to override the default message
     * protected string $create_message = "";
     * protected string $update_message = "";
     * protected string $delete_message = "";
     */

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected UserRegistrationRepository $mainRepository;

    public function __construct(UserRegistrationRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)

    function registerUser(\App\DTOs\CreateUserDTO $createUserDTO) {
      try {
        $user = $this->mainRepository->updateOrCreate($createUserDTO->toArray());

        return $this->setMessage('User Registered Successfully.')
                    ->setCode(Response::HTTP_CREATED)
                    ->setData($user);

      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }

    }
}
