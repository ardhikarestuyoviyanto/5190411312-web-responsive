@extends('layout.main')
@section('title', "Register")
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4">
            <div class="mt-5">
                {{-- Display message error validation --}}
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error) {{$error}} @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- Display success message after register --}}
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session()->get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card shadow-lg">
                    <div class="card-header bg-white">
                        <strong class="text-center d-block h3 p-3">Form <span class="text-primary">Register</span></strong>
                    </div>
                    <div class="card-body"> 
                        <form action="{{url('registerHandler')}}" method="post">
                            @csrf
                            <div class="mb-3 mt-2">
                                <label class="form-label">Nama Pengguna</label>
                                <input type="text" required class="form-control" placeholder="Nama pengguna" name="name" value="{{old('name')}}">
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Email address</label>
                                <input type="email" required class="form-control" placeholder="Email address" name="email" value="{{old('email')}}">
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Password</label>
                                <input type="text" required class="form-control" placeholder="Password" name="password" value="{{old('password')}}">
                            </div>
                            <div class="mb-3 mt-4">
                                <button class="btn btn-primary" type="submit">
                                    Sign Up
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <small class="text-center d-block">Sudah punya akun ? <a href="{{url('login')}}" class="text-decoration-none">Login</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection