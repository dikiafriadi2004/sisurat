@extends('admin.layouts.app')

@section('title')
    Detail Restoran
@endsection

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo & title -->
                        <div class="clearfix">
                            <div class="float-sm-start">
                                <h5 class="card-title mb-2">NPWPD: {{ $pajakrestoran->npwpd }}</h5>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h6 class="fs-16"> {{ $pajakrestoran->nama_pemilik }}</h6>
                                <address>
                                    Alamat : {{ $pajakrestoran->alamat_usaha }}
                                    <br>
                                    Phone : {{ $pajakrestoran->no_hp }}
                                </address>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('laporanpajakrestoran.create', $pajakrestoran->slug) }}"
                                    class="btn btn-primary">Tambah Laporan</a>
                                <div class="table-responsive table-borderless text-nowrap mt-3 table-centered">
                                    <table class="table mb-0">
                                        <thead class="bg-light bg-opacity-50">
                                            <tr>
                                                <th class="border-0 py-2">#</th>
                                                <th class="border-0 py-2">Bulan</th>
                                                <th class="border-0 py-2">Tahun</th>
                                                <th class="border-0 py-2">Jumlah Setoran</th>
                                                <th class="border-0 py-2">Bukti Laporan</th>
                                                <th class="border-0 py-2">Surat Pemberitahuan</th>
                                                <th class="border-0 py-2">Surat Teguran</th>
                                                <th class="border-0 py-2">Buat Surat</th>
                                            </tr>
                                        </thead> <!-- end thead -->
                                        <tbody>
                                            @foreach ($pajakrestoran->laporan_pajak_restoran as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->bulan }}</td>
                                                    <td>{{ $item->tahun }}</td>
                                                    <td>@currency($item->jumlah_setoran)</td>
                                                    <td>
                                                        @if ($item->bukti_laporan)
                                                            <a href="{{ asset(getenv('CUSTOM_UPLOAD_LOCATION') . '/' . $item->bukti_laporan) }}"
                                                                target="_blank">Lihat</a>
                                                        @else
                                                            <span>Tidak Ada Bukti Laporan</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align:center;padding-top:5px;">
                                                        @if ($item->tgl_surat_pemberitahuan != null)
                                                            <form
                                                                action="{{ route('restoran.downloadsuratpemberitahuan', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @include('admin.surat.restoran.download-surat-pemberitahuan')
                                                                <a href="{{ route('restoran.downloadsuratpemberitahuan', $item->id) }}"
                                                                    class="text-primary"
                                                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">Download
                                                                    {{ $item->tgl_surat_pemberitahuan }}</a>
                                                            </form>
                                                        @else
                                                            <div>
                                                                <h5 class="fs-14 m-0 fw-normal">Tidak Ada Surat</h5>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td style="text-align:center;padding-top:5px;">
                                                        @if ($item->tgl_surat_teguran != null)
                                                            <form
                                                                action="{{ route('restoran.downloadsuratteguran', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @include('admin.surat.restoran.download-surat-teguran')
                                                                <a href="{{ route('restoran.downloadsuratteguran', $item->id) }}"
                                                                    class="text-primary"
                                                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">Download
                                                                    {{ $item->tgl_surat_teguran }}</a>
                                                            </form>
                                                        @else
                                                            <div>
                                                                <h5 class="fs-14 m-0 fw-normal">Tidak Ada Surat</h5>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>

                                                        <div>
                                                            <a href="{{ route('laporanpajakrestoran.getsuratpemberitahuan', [$pajakrestoran->slug, $item]) }}"
                                                                class="btn btn-outline-primary mb-2">Buat Surat
                                                                Pemberitahuan</a>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('laporanpajakrestoran.getsuratteguran', [$pajakrestoran->slug, $item]) }}"
                                                                class="btn btn-outline-primary mb-2">Buat Surat Teguran</a>
                                                        </div>
                                                        <!-- Button trigger modal -->
                                                        {{-- <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                            Buat Surat
                                                        </button>

                                                        @include('admin.restoran.modal-surat') --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody> <!-- end tbody -->
                                    </table> <!-- end table -->
                                </div> <!-- end table responsive -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
@endsection

@push('js')
@endpush
