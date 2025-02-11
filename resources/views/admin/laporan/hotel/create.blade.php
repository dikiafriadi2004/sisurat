@extends('admin.layouts.app')

@section('title')
    Tambah Data Bulanan Pajak Hotel
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
                            Tambah Data Bulanan Pajak Hotel
                        </h5>
                        <div class="">
                            <div>
                                <form action="{{ route('laporanpajakhotel.store', $pajakhotel->slug) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Bulan</label>
                                        <select class="form-select" name="bulan" id="example-select">
                                            <option selected disabled>--- Select Bulan ---</option>
                                            @foreach ($bulan as $item)
                                                <option value="{{ $item->nama_bulan }}">{{ $item->nama_bulan }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Tahun</label>
                                        <select class="form-select" name="tahun" id="example-select">
                                            <option selected disabled>--- Select Tahun ---</option>
                                            @foreach ($tahun as $item)
                                                <option value="{{ $item->nama_tahun }}">{{ $item->nama_tahun }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Jumlah Setoran</label>
                                        <input type="number" id="simpleinput" name="jumlah_setoran" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Bukti Laporan</label>
                                        <input type="file" id="simpleinput" name="bukti_laporan" class="form-control">
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
