<table class="table table-responsive" id="disposisis-table">
    <thead>
        <th>Id Suratmasuk</th>
        <th>Harap</th>
        <th>Catatan Pengolah</th>
        <th>Catatan Admintu</th>
        <th>Catatan Adminkepala</th>
        <th>Verifikasi</th>
        <th>Tanggal Verifikasi</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($disposisis as $disposisi)
        <tr>
            <td>{!! $disposisi->id_suratmasuk !!}</td>
            <td>{!! $disposisi->harap->nama_harap !!}</td>
            <td>{!! $disposisi->catatan_pengolah !!}</td>
            <td>{!! $disposisi->catatan_admintu !!}</td>
            <td>{!! $disposisi->catatan_adminkepala !!}</td>
            <td>
            @if($disposisi->verifikasi==1)
                <p>Sudah</p>
            @else
                <p>Belum</p>
            @endif
            </td>
            <td>{!! $disposisi->tanggal_verifikasi !!}</td>
            <td>
                {!! Form::open(['route' => ['disposisis.destroy', $disposisi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.suratmasuks.disposisi.show', [$suratmasuk->id,$disposisi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.suratmasuks.disposisi.edit', [$suratmasuk->id, $disposisi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @if(Auth::guard('pegawais')->user() && Auth::guard('pegawais')->user()->hak_akses()=='1' || (Auth::user() && Auth::user()->is_admin()==1) )
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
