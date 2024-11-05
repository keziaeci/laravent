<?php

namespace App\Http\Requests;

use App\DTOs\UpdateEventDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'name' => 'required|unique:events,name,'. $this->eventId .',id',
            'description' => 'nullable',
            'location' => 'required',
            'is_active' => 'required|boolean',
            'date_time' => 'required|string'
        ];
    }

    function updateEventDTO() : UpdateEventDTO {
        return new UpdateEventDTO(
            name: $this->name,
            description: $this->description,
            location: $this->location,
            is_active: $this->is_active,
            date_time: $this->date_time
        );
    }
}
