@extends('layout.main')
@section('title', "Dashboard")
@section('content')
<div class="container mt-5">
    <h2>Hallo Nama Saya : {{request()->session()->get('name')}}</h2>
    <h3>Email Saya : {{request()->session()->get('email')}}</h3>
    <a href="{{url('logoutHandler')}}">logout</a>
</div>
@endsection