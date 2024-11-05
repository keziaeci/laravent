<?php

namespace App\DTOs;

class GetEventsFilterDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public ?string $order_by = 'created_at',
        public ?string $order_direction = 'desc',
        public ?int $per_page = 10,
        public ?string $search = '',
    )
    {
        //
    }

    function toArray() : array {
        return [
            'order_by'        => $this->order_by,
            'order_direction' => $this->order_direction,
            'per_page'        => $this->per_page,
            'search'          => $this->search
        ];
    }
}
