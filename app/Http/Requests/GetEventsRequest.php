<?php

namespace App\Http\Requests;

use App\DTOs\GetEventsFilterDTO;
use Illuminate\Foundation\Http\FormRequest;

class GetEventsRequest extends FormRequest
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
            'order_by'        => 'in:name,description,created_by',
            'order_direction' => 'in:asc,desc',
            'per_page'        => 'nullable|integer|max:50',
            'search'          => 'nullable'
        ];
    }

    function getEventsFilterDTO() : GetEventsFilterDTO {
        return new GetEventsFilterDTO(
            order_by: $this->order_by,
            order_direction: $this->order_direction,
            per_page: $this->per_page,
            search: $this->search,
        );
    }
}
