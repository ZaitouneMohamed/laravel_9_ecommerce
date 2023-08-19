@extends('electro.layouts.master')

@section('content')
    <div class="container">
        <h1 class="text text-center">403 | {{ __($exception->getMessage() ?: 'Forbidden') }} </h1>
    </div>
@endsection
