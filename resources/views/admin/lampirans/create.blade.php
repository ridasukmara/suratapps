@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New lampiran</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
         {!! Form::open(array('action' => ['Admin\LampiranController@store', $suratmasuk->id ] ,'files'=> true)) !!}

            @include('admin.lampirans.fields')

        {!! Form::close() !!}
    </div>
@endsection
