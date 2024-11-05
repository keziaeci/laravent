<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetEventsRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Services\Event\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(private EventService $eventService) {
    }

    function index(GetEventsRequest $request) {
        return $this->eventService->getAllEvent(
            params: $request->getEventsFilterDTO()
        )->toJson();
    }

    function store(StoreEventRequest $request) {
        return $this->eventService->createEvent($request->createEventDTO())->toJson();
    }

    function show($event) {
        return $this->eventService->findOrFail($event)->toJson();
    }

    function update($eventId, UpdateEventRequest $request) {
        // try
        $event = $this->eventService->findOrFail($eventId);

        
    }
}
