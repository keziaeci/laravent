<?php

namespace App\Repositories\Event;

use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use LaravelEasyRepository\Implementations\Eloquent;

class EventRepositoryImplement extends Eloquent implements EventRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Event $model;

    public function __construct(Event $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
    function createEvent(array $data) {
        return $this->model->create($data);
    }

    function getAll(
        string $orderBy = 'created_at',
        string $orderDirection = 'desc',
        int $paginate = 10,
        mixed $search ) {
        
            return $this->model
            ->when($search, function (Builder $query) use ($search) {
                return $query->where('name', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE' , "%$search%");
            })
            ->orderBy($orderBy,$orderDirection)
            ->paginate($paginate);
    }

}
