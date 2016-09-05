@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Klasifikasi</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($klasifikasi, ['route' => ['admin.klasifikasis.update', $klasifikasi->id], 'method' => 'patch']) !!}

            @include('admin.klasifikasis.fields')

            {!! Form::close() !!}
        </div>
@endsection
