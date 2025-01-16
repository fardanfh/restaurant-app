@extends('base')

@section('title', 'Dashboard')

@section('header_title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif


@endsection
