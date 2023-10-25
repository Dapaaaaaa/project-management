<?php

namespace App\Repositories;

use App\Models\Todo_status;
use App\Repositories\BaseRepository;

class Todo_statusRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'color',
        'project_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Todo_status::class;
    }
}
