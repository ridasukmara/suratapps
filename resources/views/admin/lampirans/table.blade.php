<table class="table table-responsive" id="lampirans-table">
    <thead>
        <th>ID Lampiran</th>
        <th>Lampiran</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>

    @foreach($lampirans as $lampiran)
        <tr>
            <td>{!! $lampiran->id !!}</td>
            <td>{!! $lampiran->lampiran !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.suratmasuks.lampiran.destroy', $lampiran->id, $suratmasuk->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.suratmasuks.lampiran.show', [$suratmasuk->id,  $lampiran->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>                   
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
