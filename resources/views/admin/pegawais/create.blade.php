@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New Pegawai</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'admin.pegawais.store', 'files' => true ]) !!}

            @include('admin.pegawais.fields')

        {!! Form::close() !!}
    </div>
@endsection
