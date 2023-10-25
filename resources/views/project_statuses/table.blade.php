<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="project_statuses-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Color</th>
                <th>Is Default</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projectStatuses as $projectStatus)
                <tr>
                    <td>{{ $projectStatus->name }}</td>
                    <td>{{ $projectStatus->color }}</td>
                    <td>{{ $projectStatus->is_default }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['projectStatuses.destroy', $projectStatus->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('projectStatuses.show', [$projectStatus->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('projectStatuses.edit', [$projectStatus->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $projectStatuses])
        </div>
    </div>
</div>
