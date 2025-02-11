@extends('admin.layouts.app')

@section('title')
    Tambah Hotel
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
                            Tambah Data Pajak Hotel
                        </h5>
                        <div class="">
                            <div>
                                <form action="{{ route('hotel.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">NPWPD</label>
                                        <input type="text" class="form-control" name="npwpd" data-toggle="input-mask"
                                            data-mask-format="NP099.099.099.099.000" data-reverse="true">
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Nama Pemilik</label>
                                        <input type="text" id="simpleinput" name="nama_pemilik" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">No Hanphone</label>
                                        <input type="text" id="simpleinput" name="no_hp" data-toggle="input-mask" data-mask-format="9999-9999-9999" inputmode="text" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Nama Usaha</label>
                                        <input type="text" id="simpleinput" name="nama_usaha" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Alamat Usaha</label>
                                        <textarea class="form-control" name="alamat_usaha" id="example-textarea" rows="5"></textarea>
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
