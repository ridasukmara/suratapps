<table class="table table-responsive" id="haraps-table">
    <thead>
        <th>Nama Harap</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($haraps as $harap)
        <tr>
            <td>{!! $harap->nama_harap !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.haraps.destroy', $harap->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.haraps.show', [$harap->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.haraps.edit', [$harap->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
