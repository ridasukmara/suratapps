@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Harap</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($harap, ['route' => ['admin.haraps.update', $harap->id], 'method' => 'patch']) !!}

            @include('admin.haraps.fields')

            {!! Form::close() !!}
        </div>
@endsection
