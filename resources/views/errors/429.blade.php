@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))

@extends("electro.layouts.master")

@section("content")
    <div class="container">
        <h1 class="text text-center">429 | Too Many Requests</h1>
    </div>
@endsection

