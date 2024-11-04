<?php

namespace App\Http\Requests;

use App\DTOs\CreateUserDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed|min:8'
        ];
    }

    function createUserDTO() : CreateUserDTO {
        return new CreateUserDTO(
            name: $this->name,
            username: $this->username,
            email: $this->email,
            password: Hash::make($this->password)
        );
    }
}
