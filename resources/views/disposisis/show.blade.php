@extends('layouts.app')

@section('content')
    @include('disposisis.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.suratmasuks.disposisi', $suratmasuk->id, $disposisi->id) !!}" class="btn btn-default">Back</a>
    </div>
@endsection
