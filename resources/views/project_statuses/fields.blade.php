<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color', 'Color:') !!}
    {!! Form::text('color', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Is Default Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_default', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_default', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_default', 'Is Default', ['class' => 'form-check-label']) !!}
    </div>
</div>