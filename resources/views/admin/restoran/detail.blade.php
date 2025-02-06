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
                                    Phone :
                                </address>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive table-borderless text-nowrap mt-3 table-centered">
                                    <table class="table mb-0">
                                        <thead class="bg-light bg-opacity-50">
                                            <tr>
                                                <th class="border-0 py-2">Product Name</th>
                                                <th class="border-0 py-2">Quantity</th>
                                                <th class="border-0 py-2">Price</th>
                                                <th class="text-end border-0 py-2">Total</th>
                                            </tr>
                                        </thead> <!-- end thead -->
                                        <tbody>
                                            <tr>
                                                <td>G15 Gaming Laptop</td>
                                                <td>3</td>
                                                <td>$240.59</td>
                                                <td class="text-end">$721.77</td>
                                            </tr>
                                            <tr>
                                                <td>Sony Alpha ILCE 6000Y 24.3 MP Mirrorless Digital SLR Camera</td>
                                                <td>5</td>
                                                <td>$135.99</td>
                                                <td class="text-end">$679.95</td>
                                            </tr>
                                            <tr>
                                                <td>Sony Over-Ear Wireless Headphone with Mic</td>
                                                <td>1</td>
                                                <td>$99.49</td>
                                                <td class="text-end">$99.49</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>Adam ROMA USB-C / USB-A 3.1 (2-in-1 Flash Drive) – 128GB</td>
                                                <td>2</td>
                                                <td>$350.19</td>
                                                <td class="text-end">700.38</td>
                                            </tr>
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
