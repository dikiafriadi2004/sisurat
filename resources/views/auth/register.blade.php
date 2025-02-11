@extends('auth.layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="card auth-card">
                        <div class="card-body px-3 py-5">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="mx-auto mb-4 text-center auth-logo">
                                <a href="index.html" class="logo-dark">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" height="30" class="me-1"
                                        alt="logo sm">
                                    <img src="{{ asset('assets/images/logo-dark.png') }}" height="24" alt="logo dark">
                                </a>

                                <a href="index.html" class="logo-light">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" height="30" class="me-1"
                                        alt="logo sm">
                                    <img src="{{ asset('assets/images/logo-light.png') }}" height="24" alt="logo light">
                                </a>
                            </div>

                            <h2 class="fw-bold text-center fs-18">Sign Up</h2>
                            <p class="text-muted text-center mt-1 mb-4">New to our platform? Sign up now! It only takes a
                                minute.</p>

                            <div class="px-4">
                                <form method="POST" action="{{ route('register') }}" class="authentication-form">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="name" id="name" name="name" class="form-control"
                                            placeholder="Enter your name" value="{{ old('name') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Enter your email" value="{{ old('email') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Enter your password">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control" placeholder="Enter confirm password">
                                    </div>

                                    <div class="mb-1 text-center d-grid">
                                        <button class="btn btn-primary" type="submit">Sign Up</button>
                                    </div>
                                </form>
                            </div> <!-- end col -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
