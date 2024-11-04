<?php

namespace App\Services\User;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\User\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class UserServiceImplement extends ServiceApi implements UserService{

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
     protected UserRepository $mainRepository;

    public function __construct(UserRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
    function create($data)
    {
        try {
          $result = $this->mainRepository->create($data);

          return $this->setStatus(true)
                      ->setMessage('User Created Successfully!')
                      ->setCode(Response::HTTP_CREATED)
                      ->setData($result);
        } catch (\Exception $e) {
          return $this->exceptionResponse($e);
        }
    }
}
