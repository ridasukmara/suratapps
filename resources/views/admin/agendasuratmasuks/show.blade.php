@extends('layouts.app')

@section('content')
    @include('admin.agendasuratmasuks.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.agendasuratmasuks.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
