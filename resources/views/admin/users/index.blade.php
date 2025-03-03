@extends('admin.layouts.app')

@section('title')
    Daftar User
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Start here.... -->

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="d-flex flex-wrap justify-content-between gap-3">
                            <form action="{{ route('users.index') }}" method="GET">
                                <div class="search-bar">
                                    <span><i class="bx bx-search-alt"></i></span>
                                    <input type="search" class="form-control" id="search" name="search"
                                        placeholder="Search...">
                                </div>
                            </form>
                            <div>
                                <a href="{{ route('users.create') }}" class="btn btn-primary">
                                    <i class="bx bx-plus me-1"></i>Tambah User
                                </a>
                            </div>
                        </div> <!-- end row -->
                    </div>
                    <div>
                        <div class="table-responsive table-centered">
                            <table class="table text-nowrap mb-0">
                                <thead class="bg-light bg-opacity-50">
                                    <tr>
                                        <th class="border-0 py-2">#</th>
                                        <th class="border-0 py-2">Nama</th>
                                        <th class="border-0 py-2">Email</th>
                                        <th class="border-0 py-2">Action</th>
                                    </tr>
                                </thead> <!-- end thead-->
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>
                                                <div>
                                                    <h5 class="fs-14 m-0 fw-normal">{{ $loop->iteration }}</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <h5 class="fs-14 m-0 fw-normal">{{ $item->name }}</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <h5 class="fs-14 m-0 fw-normal">{{ $item->email }}</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-soft-danger" data-bs-toggle="modal"
                                                    data-bs-target="#modalDeleteUser{{ $item->id }}">
                                                    <i class="bx bx-trash fs-16"></i></a>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> <!-- end tbody -->
                            </table> <!-- end table -->
                        </div> <!-- table responsive -->
                        <div
                            class="align-items-center justify-content-between row g-0 text-center text-sm-start p-3 border-top">
                            {{ $users->links() }}
                        </div>
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>

    @include('admin.users.modal-delete')
@endsection
