@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New Suratmasuk</h1>
        </div>
    </div>

    @include('core-templates::common.errors')
    <?php $suratmasuk=false ?>
    @if($klasifikasis)
        @foreach($klasifikasis as $klasifikasi)
            <?php $arr_klasifikasi[$klasifikasi->id] = $klasifikasi->nama_klasifikasi ?>    
        @endforeach
    @endif
    <?php $sifatsurat=false ?>    
    @if($sifatsurats)
        @foreach($sifatsurats as $sifatsurat)
            <?php $arr_sifatsurat[$sifatsurat->id] = $sifatsurat->nama_sifatsurat ?>
        @endforeach
    @endif
    <div class="row">
        {!! Form::open(['route' => 'admin.suratmasuks.store']) !!}

            @include('admin.suratmasuks.fields')

        {!! Form::close() !!}
    </div>
@endsection
