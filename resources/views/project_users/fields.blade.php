<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control', 'required']) !!}
    {{-- <select name="users_id" class="form-control" required autofocus>
        <option value="">Pilih User</option>
        @isset($Users)
        @foreach($Users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
        @endisset
    </select> --}}
</div>

<!-- Projects Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('projects_id', 'Projects Id:') !!}
    {!! Form::number('projects_id', null, ['class' => 'form-control', 'required']) !!}
</div>