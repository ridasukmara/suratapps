@extends('layouts.app')

@section('content')
    @include('admin.klasifikasis.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.klasifikasis.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
