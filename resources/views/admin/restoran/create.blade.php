@extends('admin.layouts.app')

@section('title')
    Tambah Restoran
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-1 anchor" id="basic">
                            Tambah Data Pajak Restoran
                        </h5>
                        <div class="">
                            <div>
                                <form action="">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">NPWPD</label>
                                        <input type="text" class="form-control" data-toggle="input-mask"
                                            data-mask-format="099.099.099.099.000" data-reverse="true">
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Nama Pemilik</label>
                                        <input type="text" id="simpleinput" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Nama Usaha</label>
                                        <input type="text" id="simpleinput" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Alamat Usaha</label>
                                        <textarea class="form-control" id="example-textarea" rows="5"></textarea>
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
