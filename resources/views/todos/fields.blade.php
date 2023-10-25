<!-- Projects Field -->
<div class="form-group col-sm-6">
    {!! Form::label('projects_id', 'Projects') !!}
    {!! Form::select('projects_id', $project->pluck('name', 'id') ,null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Description:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Owner Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('owner_id', 'PM:') !!}
    {!! Form::select('owner_id', $owner->pluck('name', 'id') ,null, ['class' => 'form-control']) !!}
</div>

<!-- Responsible Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible_id', 'Teams :') !!}
    {!! Form::select('responsible_id', [Auth::user()->id => Auth::user()->name], null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Ticket Statuses Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ticket_statuses_id', 'Ticket Status:') !!}
    {!! Form::select('ticket_statuses_id', $todoStatus->pluck('name', 'id') ,null, ['class' => 'form-control', 'required']) !!}
</div>
