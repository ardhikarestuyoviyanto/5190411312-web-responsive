@extends('layout.main')
@section('title', "Login")
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4">
            <div class="mt-5">
                {{-- Display message error --}}
                @error('message')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- Display success message success --}}
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session()->get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card shadow-lg">
                    <div class="card-header bg-white">
                        <strong class="text-center d-block h3 p-3">Form <span class="text-primary">Login</span></strong>
                    </div>
                    <div class="card-body">
                        <form action="{{url('loginHandler')}}" method="post">
                            @csrf
                            <div class="mb-3 mt-2">
                                <label class="form-label">Email address</label>
                                <input type="email" name="email" required class="form-control" placeholder="Email address">
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" required class="form-control" placeholder="Password">
                            </div>
                            <div class="mb-3 mt-4">
                                <button class="btn btn-primary" type="submit">
                                    Sign In
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <small class="text-center d-block">Belum punya akun ? <a href="{{url('register')}}" class="text-decoration-none">Register</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection