<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project_user extends Model
{
    public $table = 'projects_user';

    public $fillable = [
        'users_id',
        'projects_id'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'users_id' => 'required',
        'projects_id' => 'required'
    ];

    public function projects(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Project::class, 'projects_id');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }
}
