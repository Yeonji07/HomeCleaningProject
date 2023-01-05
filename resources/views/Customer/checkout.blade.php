@extends("Customer.master")
@section("title","Checkout")
@section("content")
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Work+Sans:wght@800&display=swap');
        .container-checkout {
            margin: 0px auto;
            max-width: 1050px;
            background-color: white;
        }
        .form-control[readonly]{
            background-color: white;
        }
        .form-control {
            height: 25px;
            width: fit-content;
            border: none;
            border-radius: 4px;
            font-weight: 700;
            padding: 2px 0 5px 5px;
            background-color: white;
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            margin: 0;
            font-size: 14px;
        }

        .form-control:focus {
            box-shadow: none;
            background-color: white;
            border-bottom: 2px solid #ccc;
        }

        .form-control2 {
            font-size: 14px;
            height: 20px;
            width: 65px;
            border: none;
            border-radius: 0;
            font-weight: 800;
            padding: 0 0 5px 0;
            background-color: transparent;
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            margin: 0
        }

        .form-control2:focus {
            box-shadow: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent
        }

        .form-control3 {
            font-size: 14px;
            height: 20px;
            width: 32px;
            border: none;
            border-radius: 0;
            font-weight: 800;
            padding: 0 0 5px 0;
            background-color: transparent;
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            margin: 0
        }

        .form-control3:focus {
            box-shadow: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent
        }

        p {
            margin: 0
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: fill
        }

        .text-muted {
            font-size: 12px
        }

        .textmuted {
            color: #6c757d;
            font-size: 13px
        }

        .fs-14 {
            font-size: 14px
        }

        .btn-purchase {
            width: 100%;
            height: 55px;
            border-radius: 0;
            padding: 13px 0;
            background-color: black;
            border: none;
            font-weight: 600;
        }

        .btn.btn-primary:hover .fas {
            transform: translateX(10px);
            transition: transform 0.5s ease
        }

        .fw-900 {
            font-weight: 900
        }

        ::placeholder {
            font-size: 12px
        }

        .ps-30 {
            padding-left: 30px
        }

        .h2 {
            font-family: 'Work Sans', sans-serif !important;
            font-weight: 800 !important
        }

        .textmuted,
        h5,
        .text-muted {
            font-family: 'Poppins', sans-serif
        }
    </style>
    <!-- Dummy Div -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>
    <!-- Dummy Div -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>
    <div class="container-checkout mt-5">
        <div class="row m-0">
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div class="row mr-3">
                    <div class="col-12 ml-n5">
                        @if ($paket->id_subscription == 1)
                            <img src="/assets/img/paket_a.jpeg" style="width:100%;" alt="">
                        @elseif ($paket->id_subscription == 2)
                            <img src="/assets/img/paket_b.jpeg" style="width:100%;" alt="">
                        @elseif ($paket->id_subscription == 3)
                            <img src="/assets/img/paket_c.jpeg" style="width:100%;" alt="">
                        @elseif ($paket->id_subscription == 4)
                            <img src="/assets/img/single.jpeg" style="width:100%;" alt="">
                        @endif
                    </div>
                    <div class="row mt-5 bg-light" style="width: 555px;">
                        <div class="col-md-5 col-6 ps-30 pe-0 my-4">
                            <p class="text-muted">Jenis Layanan</p>
                            <p class="h5">{{$paket->nama_subscription}}</p>
                        </div>
                        <div class="col-md-5 col-6 ps-30 my-4">
                            <p class="text-muted">Total Voucher</p>
                            <p class="h5">{{$paket->total_pembersihan}} voucher</p>
                        </div>
                        <div class="col-md-5 col-6 ps-30 my-4">
                            <p class="text-muted">Harga Paket</p>
                            <p class="h5">Rp. {{number_format($paket->harga_subscription,0,",",".")}}</p>
                        </div>
                        <div class="col-md-5 col-6 ps-30 my-4">
                            <p class="text-muted">Nominal Per Voucher</p>
                            <p class="h5">Rp. 50.000</p>
                        </div>
                        <div class="col-md-5 col-6 ps-30 my-4">
                            <p class="text-muted">Masa Berlaku</p>
                            @if ($paket->masa_berlaku == 0)
                                <p class="h5">7 Hari</p>
                            @elseif ($paket->masa_berlaku == 1)
                                <p class="h5">1 Bulan</p>
                            @elseif ($paket->masa_berlaku == 1)
                                <p class="h5">3 Bulan</p>
                            @elseif ($paket->masa_berlaku == 1)
                                <p class="h5">6 Bulan</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 p-0 ps-lg-4">
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <p class="mb-4"><b>{{$err}}</b></p>
                    @endforeach
                @endif
                <div class="row m-0">
                    <form action="/user/purchase" method="post" enctype="multipart/form-data" style="width: 100%;">
                        @csrf
                        <div class="form-group col-12 px-0">
                            <div class="d-flex align-items-end mb-4">
                                <input type="hidden" name="subscription" value="{{$paket->id_subscription}}">
                                <p class="h2 m-0"><span class="pe-1">{{$paket->nama_subscription}}</span></p>
                            </div>
                        </div>
                        <div class="form-group col-12 px-0 mt-3">
                            <div class="d-flex justify-content-between mb-2 mt-4">
                                <p class="textmuted"><b>Detail Order:</b></p>
                            </div>
                            <div class="d-flex justify-content-between mb-2 mt-3">
                                <p class="textmuted">Qty</p>
                                <p class="fs-14 fw-bold"><b>1</b></p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="textmuted">Total</p>
                                <p class="fs-14 fw-bold"><span class="fas fa-dollar-sign pe-1"></span><b>Rp. {{number_format($paket->harga_subscription,0,",",".")}}</b></p>
                            </div>
                            <div class="d-flex mb-4 mt-4">
                                <span style="width: 100%;">
                                    <p class="text-muted"><b>Alamat Order</b></p> <input class="form-control mt-2" style="width: 100%;" type="text" name="txtAlamat" value="{{$datauser->alamat}}" readonly>
                                </span>
                            </div>
                            <div class="d-flex mb-4">
                                <span class="me-5" style="width: 100%;">
                                    <input type="hidden" name="payment" value="{{$metodepayment->id_metode_pembayaran}}">
                                    <p class="text-muted"><b>Metode Pembayaran</b></p> <input class="form-control mt-2" style="width: 100%;" type="text" value="{{$metodepayment->nama_metode_pembayaran}}" readonly>
                                </span>
                            </div>
                            <div class="d-flex mb-4">
                                <span class="me-5" style="width: 100%;">
                                    <p class="text-muted mb-2"><b>Silahkan Transfer ke Rekening dibawah ini</b></p>
                                    <p class="fs-14 fw-bold"><b>7880496560 - HomeCleaning</b></p>
                                </span>
                            </div>
                            <div class="d-flex">
                                <div class="form-group">
                                    <label class="text-muted">Bukti Pembayaran</label>
                                    <br>
                                    <input type="file" name="bukti_pembayaran"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-muted">Keterangan</label>
                                <textarea class="form-control w-100" rows="6" name="txtKeterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 px-0 mt-1">
                                <button class="btn-purchase btn btn-primary mt-3" type="submit">Buy</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Dummy Div -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script> --}}

    <script>
        var msg = '{{Session::get('failed')}}';
        var exist = '{{Session::has('failed')}}';
        if(exist){
            window.setTimeout(function () {
                swal({
                    title: 'Checkout Gagal!',
                    text: "Bukti Payment belum di-inputkan!",
                    icon: 'error',
                    showCloseButton: true
                });
            },200);
        }
    </script>

    <!-- Template Main JS File -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
