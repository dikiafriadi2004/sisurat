@extends('admin.layouts.app')

@section('title')
    Ubah User
@endsection

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-1 anchor" id="basic">
                            Ubah Data User
                        </h5>
                        <div class="">
                            <div>
                                <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nama</label>
                                        <input type="name" id="name" name="name" class="form-control"
                                            placeholder="Enter your name" value="{{ old('name', $user->name) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Enter your email" value="{{ old('email', $user->email) }}">
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
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
