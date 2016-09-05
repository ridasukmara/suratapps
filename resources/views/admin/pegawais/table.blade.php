<table class="table table-responsive" id="pegawais-table">
    <thead>
        <th>Nama Pegawai</th>
        <th>Jabatan</th>
        <th>Nip</th>
        <th>Hak Akses</th>
        <th>Foto</th>
        <th>Username</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($pegawais as $pegawai)
        <tr>
            <td>{!! $pegawai->nama_pegawai !!}</td>
            <td>{!! $pegawai->jabatan !!}</td>
            <td>{!! $pegawai->nip !!}</td>
            <td>{!! $pegawai->hak_akses !!}</td>
            @if($pegawai->foto != '')
            <td><img width="20" height="20" src="{!! asset('foto/') !!}/{!! $pegawai->foto !!}"></td>
            @else
            <td><img width="20" height="20" src="{!! asset('foto/default.png') !!}"></td>
            @endif
            <td>{!! $pegawai->username !!}</td>            
            <td>
                {!! Form::open(['route' => ['admin.pegawais.destroy', $pegawai->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.pegawais.show', [$pegawai->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.pegawais.edit', [$pegawai->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
