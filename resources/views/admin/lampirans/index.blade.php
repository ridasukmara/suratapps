@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Lampiran Surat Masuk</h1>
		<div class="btn btn-group pull-right">
		@if(Auth::guard('pegawais')->user() && Auth::guard('pegawais')->user()->hak_akses()=='1' || (Auth::user() && Auth::user()->is_admin()==1) )
        <a class="btn btn-primary" style="margin-top: 25px" href="{!! route('admin.suratmasuks.lampiran.create', [$suratmasuk->id]) !!}">Add New</a>
        @endif
        <a class="btn btn-default" style="margin-top: 25px" href="{!! route('admin.suratmasuks.index') !!}">Back</a>
		</div>
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('admin.lampirans.table')
        
@endsection
