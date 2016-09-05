<!-- Id Field -->


<!-- Nama Pegawai Field -->

 <div class="pull-right">
        <br>
        @if($pegawai->foto)
        <img src="{!! asset('foto') !!}/{!! $pegawai->foto !!}" width="80" height="80">
        @else
        <img src="{!! asset('foto/default.png') !!}" width="80" height="80">
        @endif
</div>

<div class="container breadcrumb">
<div class="col-md-6">
    <div class="form-group">
        <h4>Nama</h4>
        <p>{!! $pegawai->nama_pegawai !!}</p>
    </div>
    <!-- Jabatan Field -->
    <div class="form-group">
        <h4>Jabatan</h4>
        <p>{!! $pegawai->jabatan !!}</p>
    </div>

    <!-- Nip Field -->
    <div class="form-group">
        <h4>NIP</h4>
        <p>{!! $pegawai->nip !!}</p>
    </div>
</div>

<div class="col-md-4">
    <!-- Hak Akses Field -->
    <div class="form-group">
        <h4>Hak Akses</h4>
        @if($pegawai->hak_akses == 1)
            <p>Staff</p>
        @elseif($pegawai->hak_akses == 2)
            <p>Admin TU</p>
        @elseif($pegawai->hak_akses == 3)
            <p>Admin Kepala</p>
        @endif
    </div>

    <div class="form-group">
        <h4>ID</h4>
        <p>{!! $pegawai->id !!}</p>
    </div>

    <!-- Username Field -->
    <div class="form-group">
        <h4>Username</h4>
        <p>{!! $pegawai->username !!}</p>
    </div>
</div>

</div>