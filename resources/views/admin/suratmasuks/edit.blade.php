@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Suratmasuk</h1>
            </div>
        </div>

        @include('core-templates::common.errors')
        @foreach($sifatsurats as $sifatsurat)
            <?php $arr_sifatsurat[$sifatsurat->id] = $sifatsurat->nama_sifatsurat ?>
        @endforeach
        @foreach($klasifikasis as $klasifikasi)
            <?php $arr_klasifikasi[$klasifikasi->id] = $klasifikasi->nama_klasifikasi ?>
        @endforeach

        <div class="row">
            {!! Form::model($suratmasuk, ['route' => ['admin.suratmasuks.update', $suratmasuk->id], 'method' => 'patch']) !!}

            @include('admin.suratmasuks.fields')

            {!! Form::close() !!}
        </div>
@endsection
