<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo_status extends Model
{
    public $table = 'ticket_statuses';

    public $fillable = [
        'name',
        'color',
        'project_id'
    ];

    protected $casts = [
        'name' => 'string',
        'color' => 'string'
    ];

    public static array $rules = [
        'name' => 'nullable|string|max:255',
        'color' => 'nullable|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'project_id' => 'nullable'
    ];

    public function tickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Ticket::class, 'ticket_statuses_id');
    }
}
