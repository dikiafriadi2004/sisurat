@extends('admin.layouts.app')

@section('title')
    Buat Surat Pemberitahuan Restoran
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
                            Buat Surat Pemberitahuan Pajak Restoran
                        </h5>
                        <div class="">
                            <div>
                                <form action="{{ route('restoran.buatsuratpemberitahuan', $pajakrestoran->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">NPWPD</label>
                                        <input type="text" class="form-control" name="npwpd" data-toggle="input-mask"
                                            data-mask-format="NP099.099.099.099.000" data-reverse="true"
                                            value="{{ $pajakrestoran->npwpd }}" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <span>Nama Pemilik : {{ $pajakrestoran->nama_pemilik }}</span>
                                        <input type="hidden" name="nama_pemilik"
                                            value="{{ $pajakrestoran->nama_pemilik }}">
                                    </div>

                                    <div class="mb-3">
                                        <span>Nomor Telepon : {{ $pajakrestoran->no_hp }}</span>
                                        <input type="hidden" name="no_hp" value="{{ $pajakrestoran->no_hp }}">
                                    </div>

                                    <div class="mb-3">
                                        <span>Nama Usaha : {{ $pajakrestoran->nama_usaha }}</span>
                                        <input type="hidden" name="nama_usaha" value="{{ $pajakrestoran->nama_usaha }}">
                                    </div>

                                    <div class="mb-3">
                                        <span>Alamat Usaha : {{ $pajakrestoran->alamat_usaha }}</span>
                                        <input type="hidden" name="alamat_usaha"
                                            value="{{ $pajakrestoran->alamat_usaha }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Tanggal Surat</label>
                                        <input type="text" id="humanfd-datepicker" name="tgl_surat_pemberitahuan"
                                            class="form-control" placeholder="Tanggal Surat Pemberitahuan"
                                            value="{{ $pajakrestoran->tgl_surat_pemberitahuan }}">
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">Buat Surat</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection

@push('js')
    <script>
        document.getElementById('humanfd-datepicker').flatpickr({
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "d M Y",
        });
    </script>
@endpush
