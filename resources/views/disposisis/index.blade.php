@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Disposisi</h1>
        <a class="btn btn-default pull-right" style="margin-top: 25px" href="{!! route('admin.suratmasuks.index') !!}">Back</a>
		@if($haraps)
			@foreach($haraps as $harap)
				<?php $arr_harap[$harap->id] = $harap->nama_harap ?>
			@endforeach
		@endif

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('disposisis.table')
        
@endsection
