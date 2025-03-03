@extends('admin.layouts.app')

@section('title')
    Buat User
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
                            Tambah Data User
                        </h5>
                        <div class="">
                            <div>
                                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nama</label>
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
                                    <div class="mb-3">
                                        <div class="mt-3">
                                            <span>Role Permission</span>
                                        </div>
                                        @foreach ($permissions as $permission)
                                            <div class="form-check form-check-inline">
                                                <input id="permissions-{{ $permission->name }}" class="form-check-input"
                                                    type="checkbox" value="{{ $permission->name }}"
                                                    {{ old('permission') && in_array($permission->name, old('permission')) ? 'checked' : '' }}
                                                    name="permissions[]">
                                                <label class="form-check-label"
                                                    for="permissions-{{ $permission->name }}">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
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
