@extends('layouts.app')

@section('content')
    @include('admin.suratmasuks.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.suratmasuks.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
