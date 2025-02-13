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
                            <form action="{{ route('restoran.index') }}" method="GET">
                                <div class="search-bar">
                                    <span><i class="bx bx-search-alt"></i></span>
                                    <input type="search" class="form-control" id="search" name="search"
                                        placeholder="Search...">
                                </div>
                            </form>
                            <div>
                                <a href="{{ route('restoran.create') }}" class="btn btn-primary">
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
                                        <th class="border-0 py-2">No Hanphone</th>
                                        <th class="border-0 py-2">Alamat Usaha</th>
                                        <th class="border-0 py-2">Surat Pemberitahuan</th>
                                        <th class="border-0 py-2">Surat Teguran</th>
                                        <th class="border-0 py-2">Action</th>
                                    </tr>
                                </thead> <!-- end thead-->
                                <tbody>
                                    @foreach ($pajakrestoran as $item)
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
                                                    <h5 class="fs-14 m-0 fw-normal">{{ $item->no_hp }}</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <h5 class="fs-14 m-0 fw-normal">{{ $item->alamat_usaha }}</h5>
                                                </div>
                                            </td>
                                            <td style="text-align:center;padding-top:5px;">
                                                @if ($item->tgl_surat_pemberitahuan != null)
                                                    <form action="{{ route('restoran.suratpemberitahuan', $item->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @include('admin.surat.restoran.download-surat-pemberitahuan')
                                                        <a href="{{ route('restoran.suratpemberitahuan', $item->id) }}"
                                                            class="text-primary"
                                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">Download {{ $item->tgl_surat_pemberitahuan }}</a>
                                                    </form>
                                                @else
                                                    <div>
                                                        <h5 class="fs-14 m-0 fw-normal">Tidak Ada Surat</h5>
                                                    </div>
                                                @endif

                                            </td>
                                            <td style="text-align:center;padding-top:5px;">
                                                @if ($item->tgl_surat_pemberitahuan != null)
                                                    <form action="{{ route('restoran.suratteguran', $item->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @include('admin.surat.restoran.download-surat-teguran')
                                                        <a href="{{ route('restoran.suratteguran', $item->id) }}"
                                                            class="text-primary"
                                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">Download {{ $item->tgl_surat_teguran }}</a>
                                                    </form>
                                                @else
                                                    <div>
                                                        <h5 class="fs-14 m-0 fw-normal">Tidak Ada Surat</h5>
                                                    </div>
                                                @endif

                                            </td>
                                            <td>
                                                <form action="{{ route('restoran.destroy', $item->id) }}" method="POST">
                                                    <a href="{{ route('restoran.edit', $item->id) }}"
                                                        class="btn btn-sm btn-soft-secondary me-1"><i
                                                            class="bx bx-edit fs-16"></i></a>
                                                    <a href="{{ route('restoran.detail', $item->id) }}"
                                                        class="btn btn-sm btn-soft-primary me-1"><i
                                                            class="bx bx-file fs-16"></i></a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('restoran.destroy', $item->id) }}"
                                                        class="btn btn-sm btn-soft-danger"
                                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"><i
                                                            class="bx bx-trash fs-16"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> <!-- end tbody -->
                            </table> <!-- end table -->
                        </div> <!-- table responsive -->
                        <div
                            class="align-items-center justify-content-between row g-0 text-center text-sm-start p-3 border-top">
                            {{ $pajakrestoran->links() }}
                        </div>
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
