<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $projectStatus->name }}</p>
</div>

<!-- Color Field -->
<div class="col-sm-12">
    {!! Form::label('color', 'Color:') !!}
    <p>{{ $projectStatus->color }}</p>
</div>

<!-- Is Default Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('is_default', 'Is Default:') !!}
    <p>{{ $projectStatus->is_default }}</p>
</div> --}}

