@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Start here.... -->

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between gap-3">
                            <form action="{{ route('hotel.index') }}" method="GET">
                                <div class="search-bar">
                                    <span><i class="bx bx-search-alt"></i></span>
                                    <input type="search" class="form-control" id="search" name="search"
                                        placeholder="Search...">
                                </div>
                            </form>
                            <div>
                                <a href="{{ route('hotel.create') }}" class="btn btn-primary">
                                    <i class="bx bx-plus me-1"></i>Tambah Pajak Hotel
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
                                        <th class="border-0 py-2">NPWD</th>
                                        <th class="border-0 py-2">Nama Pemilik</th>
                                        <th class="border-0 py-2">Nama Usaha</th>
                                        <th class="border-0 py-2">Alamat Usaha</th>
                                        <th class="border-0 py-2">Action</th>
                                    </tr>
                                </thead> <!-- end thead-->
                                <tbody>
                                    @foreach ($pajakhotel as $item)
                                        <tr>
                                            <td>
                                                <div>
                                                    <h5 class="fs-14 m-0 fw-normal">{{ $loop->iteration }}</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <h5 class="fs-14 m-0 fw-normal">{{ $item->npwpd }}</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <h5 class="fs-14 m-0 fw-normal">{{ $item->nama_pemilik }}</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <h5 class="fs-14 m-0 fw-normal">{{ $item->nama_usaha }}</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <h5 class="fs-14 m-0 fw-normal">{{ $item->alamat_usaha }}</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('hotel.edit', $item->id) }}"
                                                    class="btn btn-sm btn-soft-secondary me-1"><i
                                                        class="bx bx-edit fs-16"></i></a>
                                                <form action="{{ route('hotel.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-soft-danger"><i
                                                            class="bx bx-trash fs-16"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> <!-- end tbody -->
                            </table> <!-- end table -->
                        </div> <!-- table responsive -->
                        <div
                            class="align-items-center justify-content-between row g-0 text-center text-sm-start p-3 border-top">
                            {{ $pajakhotel->links() }}
                        </div>
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
