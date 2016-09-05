@extends('layouts.app')

@section('content')
    @include('admin.pegawais.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.pegawais.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
