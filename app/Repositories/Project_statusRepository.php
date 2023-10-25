<?php

namespace App\Repositories;

use App\Models\Project_status;
use App\Repositories\BaseRepository;

class Project_statusRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'color',
        'is_default'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Project_status::class;
    }
}
