<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public $table = 'tickets';

    public $fillable = [
        'name',
        'content',
        'owner_id',
        'responsible_id',
        'code',
        'ticket_statuses_id',
        'projects_id'
    ];

    protected $casts = [
        'name' => 'string',
        'content' => 'string',
        'code' => 'string'
    ];

    public static array $rules = [
        'name' => 'nullable|string|max:255',
        'content' => 'nullable|string',
        'owner_id' => 'nullable',
        'responsible_id' => 'nullable',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'code' => 'nullable|string|max:255',
        'ticket_statuses_id' => 'required',
        'projects_id' => 'required'
    ];

    public function projects(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Project::class, 'projects_id');
    }

    public function ticketStatuses(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\TicketStatus::class, 'ticket_statuses_id');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class, 'users_has_tickets');
    }

    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'owner_id');
    }

    public function responsible(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'responsible_id');
    }

    public function ticketStatus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Todo_status::class, 'ticket_statuses_id');
    }
}
