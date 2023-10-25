<?php

namespace App\Repositories;

use App\Models\Todo;
use App\Repositories\BaseRepository;

class TodoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'content',
        'owner_id',
        'responsible_id',
        'code',
        'ticket_statuses_id',
        'projects_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Todo::class;
    }
}
