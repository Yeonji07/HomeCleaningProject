@extends("Customer.master")
@section("title","Detail Pekerja")
@section("content")
    <style>
        body{
            background-color: #AED0FE;
        }
        .eye{
            background-color: cyan;
            padding: 5px;
        }
        .colt{
            background-color: white;
            padding: 2%;
            box-shadow: 1px 1px 4px;
        }
        .container{
            background-color: white;
            border-radius: 8px;
        }
        ul,li{
            list-style-type: none;
        }
        #tbody tr:nth-child(odd){
            background-color: white;
        }
    </style>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>
    <!-- Dummy Div -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <div class="container mt-5 pt-4">
        <h2 style='width:500px;'>Data Pegawai</h2>
        <br>
        <b>Nama :</b> {{$nama}} <br>
        <b>Nomor Telepon :</b> {{$nomor}} <br>
        <b>Email : </b> {{$email}} <br>
        <b>Rating : </b> {{$nilaipekerja}}<br>
        <b>Jumlah Semua Pekerjaan : </b> {{$totalPekerjaan}}<br>
        <br>
    </div>

    <!-- Dummy Div -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

@endsection
