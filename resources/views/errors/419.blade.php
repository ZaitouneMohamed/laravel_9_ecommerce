@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))

@extends("electro.layouts.master")

@section("content")
    <div class="container">
        <h1 class="text text-center">419 | Page Expired</h1>
    </div>
@endsection

