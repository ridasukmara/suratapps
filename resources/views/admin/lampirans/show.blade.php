@extends('layouts.app')

@section('content')
    @include('admin.lampirans.show_fields')
    <div class="form-group">
           <a href="{!! route('admin.suratmasuks.lampiran', [$suratmasuk->id]) !!}" class="btn btn-default">Back</a>
    </div>
@endsection
