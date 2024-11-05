<?php

namespace App\DTOs;

class CreateUserDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $name,
        public string $username,
        public string $email,
        public string $password,
    )
    {
        //
    }

    function toArray() : array {
        return [
            'name'     => $this->name,
            'username' => $this->username,
            'email'    => $this->email,
            'password' => $this->password
        ];
    }
}
