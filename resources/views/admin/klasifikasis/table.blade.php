<table class="table table-responsive" id="klasifikasis-table">
    <thead>
        <th>Kode Klasifikasi</th>
        <th>Nama Klasifikasi</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($klasifikasis as $klasifikasi)
        <tr>
            <td>{!! $klasifikasi->kode_klasifikasi !!}</td>
            <td>{!! $klasifikasi->nama_klasifikasi !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.klasifikasis.destroy', $klasifikasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.klasifikasis.show', [$klasifikasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.klasifikasis.edit', [$klasifikasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
