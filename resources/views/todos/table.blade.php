<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="todos-table">
            <thead>
            <tr>
                <th>Projects</th>
                <th>Todo</th>
                <th>Description</th>
                <th>PM</th>
                <th>Team</th>
                <th>Code</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($todos as $todo)
                <tr>
                    <td>{{ $todo->projects->name }}</td>
                    <td>{{ $todo->name }}</td>
                    <td>{{ $todo->content }}</td>
                    <td>{{ $todo->owner->name }}</td>
                    <td>{{ $todo->responsible->name }}</td>
                    <td>{{ $todo->code }}</td>
                    <td>{{ $todo->ticketStatus->name }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['todos.destroy', $todo->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('todos.show', [$todo->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('todos.edit', [$todo->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $todos])
        </div>
    </div>
</div>
