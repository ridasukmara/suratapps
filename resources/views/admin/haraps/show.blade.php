@extends('layouts.app')

@section('content')
    @include('admin.haraps.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.haraps.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
