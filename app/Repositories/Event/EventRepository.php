<?php

namespace App\Repositories\Event;

use LaravelEasyRepository\Repository;

interface EventRepository extends Repository{

    // Write something awesome :)
    function getAll(
        string $orderBy = 'created_at',
        string $orderDirection = 'desc',
        int $paginate = 10,
        mixed $search
    );
    
    function createEvent(array $data);
}
