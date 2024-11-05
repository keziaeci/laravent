<?php

namespace App\Services\Event;

use App\DTOs\CreateEventDTO;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\Event\EventRepository;
use Symfony\Component\HttpFoundation\Response;

class EventServiceImplement extends ServiceApi implements EventService{

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
     protected EventRepository $mainRepository;

    public function __construct(EventRepository $mainRepository)
  {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)

    function getAllEvent(\App\DTOs\GetEventsFilterDTO $params) {
      try {
        $events = $this->mainRepository->getAll(
          orderBy: $params->order_by,
          orderDirection: $params->order_direction,
          paginate: $params->per_page,
          search: $params->search
        );

        return $this->setMessage('Events retrieved successfully.')
                    ->setCode(Response::HTTP_OK)
                    ->setData($events);
      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }

    }

    function createEvent(CreateEventDTO $createEventDTO) {
      try {
        $event = $this->mainRepository->createEvent($createEventDTO->toArray());
        
        return $this->setMessage('Event created successfully.')
                    ->setCode(Response::HTTP_CREATED)
                    ->setData($event);
      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }

    }

    function find($id) {
      try {
        $event = $this->mainRepository->find($id);

        return $this->setMessage('Event retrieved successfully.')
                    ->setCode(Response::HTTP_OK)
                    ->setData($event);
      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }
    }
    
    function findOrFail($id) {
      try {
        $event = $this->mainRepository->findOrFail($id);
  
        return $this->setMessage('Event retrieved successfully.')
                    ->setCode(Response::HTTP_OK)
                    ->setData($event);
      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }
    }
}
