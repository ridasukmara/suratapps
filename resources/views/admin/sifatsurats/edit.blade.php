@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Sifat Surat</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($sifatsurat, ['route' => ['admin.sifatsurats.update', $sifatsurat->id], 'method' => 'patch']) !!}

            @include('admin.sifatsurats.fields')

            {!! Form::close() !!}
        </div>
@endsection
