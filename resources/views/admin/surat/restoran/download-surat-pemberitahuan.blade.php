{{-- @extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div>
                                <form action="{{ route('restoran.suratpemberitahuan', $pajakrestoran->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" name="npwpd"
                                            value="{{ $pajakrestoran->npwpd }}" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" name="nama_pemilik"
                                            value="{{ $pajakrestoran->nama_pemilik }}">
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" name="no_hp" value="{{ $pajakrestoran->no_hp }}">
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" name="nama_usaha" value="{{ $pajakrestoran->nama_usaha }}">
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" name="alamat_usaha"
                                            value="{{ $pajakrestoran->alamat_usaha }}">
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" name="tgl_surat_pemberitahuan" class="form-control"
                                            value="{{ $pajakrestoran->tgl_surat_pemberitahuan }}">
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">Download Surat
                                                Pemberitahuan</button>
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
@endsection --}}

<div class="mb-3">
    <input type="hidden" class="form-control" name="npwpd" value="{{ $item->npwpd }}" disabled>
</div>

<div class="mb-3">
    <input type="hidden" name="nama_pemilik" value="{{ $item->nama_pemilik }}">
</div>

<div class="mb-3">
    <input type="hidden" name="no_hp" value="{{ $item->no_hp }}">
</div>

<div class="mb-3">
    <input type="hidden" name="nama_usaha" value="{{ $item->nama_usaha }}">
</div>

<div class="mb-3">
    <input type="hidden" name="alamat_usaha" value="{{ $item->alamat_usaha }}">
</div>

<div class="mb-3">
    <input type="hidden" name="tgl_surat_pemberitahuan" class="form-control"
        value="{{ $item->tgl_surat_pemberitahuan }}">
</div>
