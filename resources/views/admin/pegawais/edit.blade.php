@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Pegawai</h1>
            </div>
        </div>

        @include('core-templates::common.errors')        
        <div class="row">
            {!! Form::model($pegawai, ['route' => ['admin.pegawais.update', $pegawai->id], 'method' => 'patch', 'files' => true ]) !!}

            @include('admin.pegawais.fields')

            {!! Form::close() !!}
        </div>
@endsection
