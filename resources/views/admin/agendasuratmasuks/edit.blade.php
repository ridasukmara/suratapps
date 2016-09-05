@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Agendasuratmasuk</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($agendasuratmasuk, ['route' => ['admin.agendasuratmasuks.update', $agendasuratmasuk->id], 'method' => 'patch']) !!}

            @include('admin.agendasuratmasuks.fields')

            {!! Form::close() !!}
        </div>
@endsection
