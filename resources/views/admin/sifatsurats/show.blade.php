@extends('layouts.app')

@section('content')
    @include('admin.sifatsurats.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.sifatsurats.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
