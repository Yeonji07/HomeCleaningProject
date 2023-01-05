@extends("Pekerja.master")
@section("title","Surat Laporan Kerja")
@section("content")
    <style>
        body{
            background-color: #AED0FE;
        }
        .container{
            background-color: white;
            border-radius: 8px;
            max-width: 85vw;
            height: fit-content;
        }
    </style>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <div class="container mt-5 mb-5 pt-4">
        <h2 class="ml-3 mt-2" style='width:100%;'>Surat Keterangan Kerja</h2>
        <div class="container mt-5 mb-5">
            <p class="pb-5">
                <b class="h3">PT. HomeCleaning</b> <br><br>
                <b>Jl. Ngagel Jaya Tengah No.73-77, Baratajaya, Kec. Gubeng, Kota SBY, Jawa Timur 60284</b><br>
                Telp : <b>88899</b> <br>
                Email : <b>contact@homecleaning.com</b><br><br>
                <b>No: 01/SKK/PT. RIK/12/2019</b><br>
                <b>Perihal: Surat Keterangan Kerja</b><br>
                <br>
                Saya yang bertanda tangan dibawah ini,<br>
                Nama Penanggung Jawab : <b>Gregorius Oscar</b><br>
                Jabatan : <b>PT. HomeCleaning</b><br>
                <br>
                Dengan ini menerangkan bahwa:<br>
                <br>
                Nama Staff : <b>{{$datasurat["namapekerja"]}}</b><br>
                NIP : <b>ST{{$datasurat["id_pekerja"]}}</b><br>
                Jabatan Staff : <b>Staff PT HomeCleaning</b><br>
                <br>
                Yang ditugaskan untuk melakukan pelayanan pembersihan untuk customer kami : <br> <br>
                Nama Customer : <b>{{$datasurat["namacustomer"]}}</b> <br>
                Alamat Customer : <b>{{$datasurat["alamatcustomer"]}}</b><br>
                Tanggal Pembersihan : <b>{{date("d F Y",strtotime($datasurat["tanggalpesan"]))}}</b> <br>
                <br>
                Dengan ini menyampaikan bahwa saudara yang bernama <b>{{$datasurat["namapekerja"]}}</b> memang menjadi karyawan tetap di PT. HomeCleaning.<br>
                <br>
                Surat keterangan kerja ini diterbitkan sebagai persyaratan <b>{{$datasurat["namasubscription"]}}</b>. Semua hal yang berkaitan dengan <b>{{$datasurat["namasubscription"]}}</b> menjadi tanggung jawab karyawan tersebut di atas.<br>
                <br>
                Demikian surat keterangan kerja ini kami buat agar dapat digunakan sebagaimana mestinya.<br>
                Hormat Kami,<br>
                <br>
                <b>Direktur PT. HomeCleaning<br>
                Gregorius Oscar</b><br>
            </p>
        </div>

    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
