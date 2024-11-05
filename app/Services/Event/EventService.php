<?php

namespace App\Services\Event;

use App\DTOs\CreateEventDTO;
use App\DTOs\GetEventsFilterDTO;
use LaravelEasyRepository\BaseService;

interface EventService extends BaseService{

    // Write something awesome :)
    function createEvent(CreateEventDTO $createEventDTO);
    function getAllEvent(GetEventsFilterDTO $params);
}
