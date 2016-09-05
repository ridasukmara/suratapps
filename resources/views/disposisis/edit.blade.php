@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Update Disposisi</h1>
            </div>
        </div>

        @include('core-templates::common.errors')
        @if($haraps)
            @foreach($haraps as $harap)
                <?php $arr_harap[$harap->id] = $harap->nama_harap ?>
            @endforeach
        @endif

        <div class="row">
            {!! Form::model($disposisi, ['route' => ['disposisis.update', $disposisi->id], 'method' => 'patch']) !!}

            @include('disposisis.fields')

            {!! Form::close() !!}
        </div>
@endsection
