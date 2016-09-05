<table class="table table-responsive" id="agendasuratmasuks-table">
    <thead>
        <th>Id Suratmasuk</th>
        <th>Tanggal Diterima</th>
        <th>No Agenda</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($agendasuratmasuks as $agendasuratmasuk)
        <tr>
            <td>{!! $agendasuratmasuk->id_suratmasuk !!}</td>
            <td>{!! $agendasuratmasuk->tanggal_diterima !!}</td>
            <td>{!! $agendasuratmasuk->no_agenda !!}</td>
            <td>{!! $agendasuratmasuk->status !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.agendasuratmasuks.destroy', $agendasuratmasuk->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.agendasuratmasuks.show', [$agendasuratmasuk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @if(Auth::guard('pegawais')->user() && Auth::guard('pegawais')->user()->hak_akses()=='1' || (Auth::user() && Auth::user()->is_admin()==1) )
                    <a href="{!! route('admin.agendasuratmasuks.edit', [$agendasuratmasuk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>                    
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
