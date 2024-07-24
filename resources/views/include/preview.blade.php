@extends('layout.layout')
@php $base_url = "/"; @endphp

@section("include_content")

@if(!empty($data))
    {!! htmlspecialchars_decode($data["file_code"]) !!}
@endif

@endsection