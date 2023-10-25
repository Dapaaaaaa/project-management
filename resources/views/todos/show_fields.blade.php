<!-- Projects Id Field -->
<div class="col-sm-12">
    {!! Form::label('projects_id', 'Projects:') !!}
    <p>{{ $todo->projects->name }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Todo:') !!}
    <p>{{ $todo->name }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Description:') !!}
    <p>{{ $todo->content }}</p>
</div>

<!-- Owner Id Field -->
<div class="col-sm-12">
    {!! Form::label('owner_id', 'PM:') !!}
    <p>{{ $todo->owner->name }}</p>
</div>

<!-- Responsible Id Field -->
<div class="col-sm-12">
    {!! Form::label('responsible_id', 'Team:') !!}
    <p>{{ $todo->responsible->name }}</p>
</div>

<!-- Code Field -->
<div class="col-sm-12">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $todo->code }}</p>
</div>

<!-- Ticket Statuses Id Field -->
<div class="col-sm-12">
    {!! Form::label('ticket_statuses_id', 'Ticket Statuses:') !!}
    <p>{{ $todo->ticketStatus->name }}</p>
</div>


