<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Team Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tema', 'Team:') !!}
    @foreach($userTeams as $item)
        <fieldset>
            {!! Form::checkbox('team[]', $item->id , in_array($item->id, $team)?true:false, ['id'=>'inputTim-'.$item->id]) !!}
            <label for="inputTim-{{$item->id}}">{{$item->name}}</label>
        </fieldset>
    @endforeach
</div>

<!-- Project Statuses Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_statuses_id', 'Project Status:') !!}
    {!! Form::select('project_statuses_id', $status->pluck('name', 'id') ,null, ['class' => 'form-control', 'required']) !!}
</div>