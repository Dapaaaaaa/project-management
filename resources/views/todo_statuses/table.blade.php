<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="todo_statuses-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Color</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($todoStatuses as $todoStatus)
                <tr>
                    <td>{{ $todoStatus->name }}</td>
                    <td>{{ $todoStatus->color }}</td>
                    {{-- <td>{{ $todoStatus->project_id }}</td> --}}
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['todoStatuses.destroy', $todoStatus->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('todoStatuses.show', [$todoStatus->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('todoStatuses.edit', [$todoStatus->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $todoStatuses])
        </div>
    </div>
</div>
