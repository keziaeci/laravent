<?php

namespace App\DTOs;

class UpdateEventDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $name,
        public ?string $description = null,
        public string $location,
        public bool $is_active,
        public string $date_time,
    )
    {
        // 
    }

    function toArray() : array {
        return [
            'name'        => $this->name,
            'description' => $this->description,
            'location'    => $this->location,
            'is_active'   => $this->is_active,
            'date_time'   => $this->date_time,
        ]
    }
}
