@extends("Customer.master")
@section("title","Order")
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
        box-shadow: 1px 1px 3px;
        border-radius: 8px;
    }
    ul,li{
        list-style-type: none;
    }

</style>

<div class="container mt-5">
    <div class="col-sm" style="width:56%;display:inline-block;">
        <h1 style='width:400px;margin-left:10%;'>Form Pemesanan</h1>
    </div>

    <div class="col-10 colt mt-2" style="position:center; top:26%;margin-left:7%;">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama Customer</label>
                <input type="text" class="form-control" value="{{$nama}}" name="fullname" readonly>
            </div>

            <div class="form-group">
                <label>Alamat Pemesanan</label>
                <input type="text" class="form-control" value="{{$alamat}}" name="txtAlamat" readonly>
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" class="form-control" name="txtTelp" value="{{$nomor_telepon}}" readonly>
            </div>

            <div class="form-group">
                <label>Jenis Layanan</label>
                <select name="subscription" class='form-control' id="subscription" style="background-color: white;">
                    @foreach ($subscription as $i)
                        <option value="{{$i->id_subscription}}">{{$i->nama_subscription}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Metode Pembayaran</label><br>
                <select name="payment" id="datapayment" class='form-control' style="background-color: white;">
                    @foreach ($metode_pembayaran as $i)
                        <option value="{{$i->id_metode_pembayaran}}">{{$i->nama_metode_pembayaran}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Detail Paket</label>
                <textarea class="form-control" name="detailpaket" id="detailpkt" cols="30" rows="5" readonly></textarea>
            </div>

            <div class="form-group">
                <label>Bukti Pembayaran</label>
                <br>
                <input type="file" name="image"><br>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" rows="5" name="txtKeterangan"></textarea>
            </div>

            <button class="col-12 btn btn-success" type="submit" name="btnOrder" id="btnOrder">Order</button>
        </form>
    </div>
    <br><br><br>
</div>

@if ($errors->any())
    @foreach ($errors->all() as $err)
        <p>{{$err}}</p>
    @endforeach
@endif

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/jquery.js"></script>
<script>
    $(document).ready(function () {
        var idpaket = 1;
        $.get("{{ url('/user/order/ajaxDetailPaket') }}/"+idpaket)
            .done(function(r){
                var html = "Total Pembersihan yang didapatkan : "+r.pembersihan+" Kali \n"
                +"Masa Berlaku: "+r.masa_berlaku+" \n"
                +"Rp. "+r.harga;
                $("#detailpkt").val(html);
        });
    });

    $("#subscription").on("change", function() {
        var idpaket = $("#subscription").val();
        $.get("{{ url('/user/order/ajaxDetailPaket') }}/"+idpaket)
            .done(function(r){
                var html = "Total Pembersihan yang didapatkan : "+r.pembersihan+" Kali \n"
                +"Masa Berlaku: "+r.masa_berlaku+" \n"
                +"Rp. "+r.harga;
                $("#detailpkt").val(html);
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@endsection
