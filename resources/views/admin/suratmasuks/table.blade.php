<table class="table table-responsive" id="suratmasuks-table">
    <thead>
        <th>Dari</th>
        <th>Klasifikasi Surat</th>
        <th>Indeks</th>
        <th>Perihal</th>
        <th>Isi Ringkas</th>
        <th>Tgl Masuk</th>
        <th>Catatan</th>
        <th colspan="4">Action</th>
    </thead>
    <tbody>
    @foreach($suratmasuks as $suratmasuk)

        <tr>            
            <td>{!! $suratmasuk->dari !!}</td>
            <td>{!! $suratmasuk->klasifikasi->nama_klasifikasi !!}</td>
            <td>{!! $suratmasuk->indeks !!}</td>
            <td>{!! $suratmasuk->perihal !!}</td>
            <td>{!! $suratmasuk->isi_ringkas !!}</td>            
            <td>{!! $suratmasuk->tanggal_suratmasuk !!}</td>
            <td>{!! $suratmasuk->catatan !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.suratmasuks.destroy', $suratmasuk->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.suratmasuks.show', [$suratmasuk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @if(Auth::guard('pegawais')->user() && Auth::guard('pegawais')->user()->hak_akses()=='1' || (Auth::user() && Auth::user()->is_admin()==1) )
                    <a href="{!! route('admin.suratmasuks.edit', [$suratmasuk->id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon 
                    glyphicon-edit"></i></a>                    
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                    <a href="{!! route('admin.suratmasuks.disposisi', [$suratmasuk->id]) !!}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-check"></i></a>
                     <a href="{!! route('admin.suratmasuks.lampiran', [$suratmasuk->id]) !!} " class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-file"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>    
</table>
