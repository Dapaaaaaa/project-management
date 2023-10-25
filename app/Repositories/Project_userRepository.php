<?php

namespace App\Repositories;

use App\Models\Project_user;
use App\Repositories\BaseRepository;

class Project_userRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'users_id',
        'projects_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Project_user::class;
    }
}
