<table class="table table-responsive" id="sifatsurats-table">
    <thead>
        <th>Nama Sifatsurat</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sifatsurats as $sifatsurat)
        <tr>
            <td>{!! $sifatsurat->nama_sifatsurat !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.sifatsurats.destroy', $sifatsurat->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.sifatsurats.show', [$sifatsurat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.sifatsurats.edit', [$sifatsurat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
