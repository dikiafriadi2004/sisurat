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
                            <div class="search-bar">
                                <span><i class="bx bx-search-alt"></i></span>
                                <input type="search" class="form-control" id="search" placeholder="Search task...">
                            </div>
                            <div>
                                <a href="{{route('restoran.create')}}" class="btn btn-primary">
                                    <i class="bx bx-plus me-1"></i>Tambah Pajak Restoran
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
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 class="fs-14 m-0 fw-normal">1</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="fs-14 m-0 fw-normal">NP123413911921</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="fs-14 m-0 fw-normal">Sean Kemper</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="fs-14 m-0 fw-normal">Restoran Mie Berkah</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h5 class="fs-14 m-0 fw-normal">Jalan Jalan</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-soft-secondary me-1"><i
                                                    class="bx bx-edit fs-16"></i></button>
                                            <a href="" class="btn btn-sm btn-soft-danger"><i
                                                    class="bx bx-trash fs-16"></i></button>
                                        </td>
                                    </tr>
                                </tbody> <!-- end tbody -->
                            </table> <!-- end table -->
                        </div> <!-- table responsive -->
                        <div
                            class="align-items-center justify-content-between row g-0 text-center text-sm-start p-3 border-top">
                            <div class="col-sm">
                                <div class="text-muted">
                                    Showing <span class="fw-semibold">10</span> of <span class="fw-semibold">52</span>
                                    tasks
                                </div>
                            </div>
                            <div class="col-sm-auto mt-3 mt-sm-0">
                                <ul class="pagination pagination-rounded m-0">
                                    <li class="page-item">
                                        <a href="#" class="page-link"><i class='bx bx-left-arrow-alt'></i></a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link"><i class='bx bx-right-arrow-alt'></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
