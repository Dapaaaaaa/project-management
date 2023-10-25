<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $project->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $project->description }}</p>
</div>

<!-- Owner Id Field -->
<div class="col-sm-12">
    {!! Form::label('owner_id', 'Owner Id:') !!}
    <p>{{ $project->owner->name }}</p>
</div>

<!-- Project Statuses Id Field -->
<div class="col-sm-12">
    {!! Form::label('project_statuses_id', 'Project Status:') !!}
    <p>{{ $project->projectStatus->name }}</p>
</div>

