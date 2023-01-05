@extends("Customer.master")
@section("title","Make an Appointment")
@section("content")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" defer></script>
    <link href="{{ asset('homecleaning.css') }}" rel="stylesheet">

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <div class="container-fluid mt-5">
        <div class="col-lg d-flex justify-content-between ml-5" style="width:90%;">
            {{-- <div class="pl-5 ml-4">
                <h2 class="ml-5">Halo, {{$user->full_name}}</h2>
            </div> --}}
            <h2 class="mt-3" style="margin-left: 6%;">Make an Appointment</h2>
            <div>
                <label style="text-align: justify;" class="mt-1">Jumlah Voucher yang Anda Miliki : {{$jumlahVoucher}}
                </label>
                <br>
                <label style="text-align: justify;" class="mt-1">
                </label>
                <label style="text-align: justify;" class="mt-1 mr-3">Total Nominal Voucher Anda : Rp. {{$nominalVoucher}}
                </label>
            </div>
        </div>

        <div class="col-10 colt mt-4" style="position:center;top:26%;margin-left:7%;border-radius:10px;">
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p><b>{{$err}}</b></p>
                @endforeach
            @endif
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Jenis Pembersihan</label>
                    <select name="subscription" class='form-control' id="subscription" style="background-color: white;">
                        @foreach ($subscription as $i)
                            <option value="{{$i->id_subscription}}">{{$i->nama_subscription}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Pilih Pekerja</label>
                    {{-- Ini kalau pake input hidden buat id + input text buat show nama --}}
                    <input type="hidden" name="pekerja" value="{{$pekerja->id_pekerja}}">
                    <input type="text" class="form-control" name="namapekerja" value="{{$pekerja->nama_pekerja}}" style="background-color: white;" readonly>

                    {{-- Ini kalau pakai option value --}}
                    {{-- <select name="pekerja" id="" class='form-control' style="background-color: white;"> --}}

                        {{-- <option value="{{$pekerja->id_pekerja}}">{{$pekerja->nama_pekerja}}</option>
                    </select> --}}
                </div>

                <div class="form-group">
                    <label>Tanggal Appointment</label>
                    <input type="datetime-local" class="form-control" name="tglAppointment">
                    <label class="d-flex justify-content-between mt-3">
                        <p>*Appointment hanya berlaku pada Jam Operasional</p>
                        <p>Jam Operasional: 09:00 - 17:00</p>
                    </label>

                </div>

                <div class="form-group">
                    <label>Harga Paket</label>
                    <input type="text" name="hargapaket" id="hargapaket" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Jumlah Voucher yang Anda Miliki</label>
                    <input type="text" class="form-control" name="" id="jumvoucher" value="{{$jumlahVoucher}} Voucher" asli="{{$jumlahVoucher}}" readonly> <br>
                    <label>Total Nominal Voucher Anda </label>
                    <input type="text" class="form-control" name="" id="" value="Rp. {{$nominalVoucher}}"  readonly>
                </div>

                <div class="form-group">
                    <label>Jumlah Voucher yang Ingin Digunakan</label><br>
                    <input type="number" id="voucherterpakai" name="voucherterpakai" class="form-control" min="0" max="{{$jumlahVoucher}}"> <br>

                    <p>Dibayar dengan Voucher Sebesar : </p>
                    <input type="text" class="form-control" name="" id="nominalvoucher" value="Rp. 0"  readonly>
                </div>

                <div class="form-group">
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="agreepayment">
                    <label class="form-check-label ml-4" for="flexCheckDefault">
                        Dengan ini saya setuju bahwa tidak adanya pengembalian dana baik berupa tunai maupun voucher ketika transaksi telah berhasil dan berlangsung.
                    </label>
                </div>

                <button class="col-12 btn btn-primary" type="submit" name="btnAppointment" id="btnAppointment">Make Appointment</button>
            </form>
        </div>
        <br><br><br>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/jquery.js"></script>
    <script>
        // Setup harga paket jquery ajax kalau render page appointment
        $(document).ready(function () {
            var idpaket = $("#subscription").val();
            $.get("{{ url('/user/order/ajaxDetailPaket') }}/5")
                .done(function(r){
                    console.log(r);
                    var html = "Rp. "+r.harga;
                        $("#hargapaket").val(html);
                });
        });

        // Setup harga paket jquery ajax kalau render page appointment
        $("#subscription").on("change", function() {
            var idpaket = $("#subscription").val();
            $.get("{{ url('/user/order/ajaxDetailPaket') }}/"+idpaket)
                .done(function(r){
                    console.log(r);
                    var html = "Rp. "+r.harga;
                    $("#hargapaket").val(html);
            });
        });

        // Setup nominal voucher jquery ajax kalau inputan berubah di page appointment
        $("#voucherterpakai").on("change",function () {
            var hargapaket = $("#hargapaket").val();
            var position = hargapaket.search(" ");
            var hargatemp = hargapaket.substring(position,hargapaket.length);
            var harga = hargatemp.replace(".",""); //Untuk replace . jadi "" dari hasil formatting harga di php, Ex: before = 99.900, after = 99900
            // console.log(hargatemp);
            // console.log(harga);

            var voucherDimiliki = $("#jumvoucher").attr("asli");
            var jumlahvoucher = $("#voucherterpakai").val();
            var nominalVoucher = jumlahvoucher*50000;
            $("#nominalvoucher").val("Rp. "+ nominalVoucher.toLocaleString('id-ID'));

            if(nominalVoucher-50000>=harga){
                $("#voucherterpakai").val( $("#voucherterpakai").val()-1);
                var voucherDimiliki = $("#jumvoucher").attr("asli");
                var jumlahvoucher = $("#voucherterpakai").val();
                var nominalVoucher = jumlahvoucher*50000;
                $("#nominalvoucher").val("Rp. "+nominalVoucher.toLocaleString("id-ID"));
            }
        });

        //Diluar jam operasional
        var exist = '{{Session::has('timeoff')}}';
        if (exist) {
            window.setTimeout(function () {
                swal({
                    title: 'Appointment Gagal!',
                    text: 'Gagal melakukan Appointment! Appointment hanya bisa dilakukan dalam masa jam operasional kami!',
                    icon: 'error',
                    showCloseButton: true
                });
            },200);
        }

        //Appointment success
        var exist = '{{Session::has('success')}}';
        if (exist) {
            window.setTimeout(function () {
                swal({
                    title: 'Berhasil melakukan Appointment!',
                    icon: 'success',
                    showCloseButton: true
                });
            },200);
        }

        //Voucher tidak cukup
        var exist = '{{Session::has('novoucher')}}';
        if (exist) {
            window.setTimeout(function () {
                swal({
                    title: 'Appointment Gagal!',
                    text: 'Gagal melakukan Appointment! Voucher tidak mencukupi!',
                    icon: 'error',
                    showCloseButton: true
                });
            },200);
        }

        //Date di hari yang dipesan customer bentrok dengan pekerja yang sedang bekerja
        var exist = '{{Session::has('nodate')}}';
        if (exist) {
            window.setTimeout(function () {
                swal({
                    title: 'Appointment Gagal!',
                    text: 'Gagal melakukan Appointment! Jadwal yang dipilih dengan pekerja yang terpilih tidak tersedia! Silahkan memilih jadwal kembali dengan melakukan refresh halaman.',
                    icon: 'error',
                    showCloseButton: true
                });
            },200);
        }

        // Tidak agree dengan terms dan condition pada transaksi appointment
        var exist = '{{Session::has('notagree')}}';
        if (exist) {
            window.setTimeout(function () {
                swal({
                    title: 'Appointment Gagal!',
                    text: 'Gagal melakukan appointment! Mohon untuk melakukan penyetujuan pada kolom kotak dibawah.',
                    icon: 'error',
                    showCloseButton: true
                });
            },200);
        }

    </script>
@endsection
