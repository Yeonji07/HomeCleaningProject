@extends("Admin.master");
@section("title","Konfirmasi Transaksi")
@section("content")
    <style>
        body{
            background-color: white;
        }

        #tbody tr:nth-child(odd){
            background-color: #f2f2f2;
        }

        input[type=text],input[type=datetime-local],textarea, select {
            width: 330px;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        #btnbwh{
            margin-top: 8px;
            color: white;
            background-color: green;
            height:30px;
            width:70px;
            border-radius: 5px;
            border : none;
        }
        #btnBack{
            margin-top: 8px;
            color: white;
            background-color: red;
            height:30px;
            width:70px;
            border-radius: 5px;
            border : none;
        }
        #header .admin-title {
            font-size: 28px;
            margin: 0;
            padding: 0;
            line-height: 1;
            font-weight: 300;
            letter-spacing: 0.5px;
            font-family: "Poppins", sans-serif;
        }

        #header .admin-title a {
            color: #469FDF;
        }

        #header .admin-title img {
            max-height: 40px;
        }

        @media (max-width: 992px) {
            #header .admin-title {
                font-size: 28px;
            }
        }

        img{
            max-width: 300px;
            max-height: 300px;
        }

        .zoomed {
            transition: transform 0.5s;
            transform: scale(3);
            position: fixed;
            z-index: 10;
            top: 50%;
            left: 50%;
            margin-top: -50px;
            margin-left: -100px;
        }

    </style>

    <br>

    <!-- Dummy Div -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-1 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <div class="container-xl mt-5">
        <h1 style="font-family: Arial, Helvetica, sans-serif;">Konfirmasi Pembayaran</h1>
        <table border='1' style="text-align: center;" class="table table-bordered"id="tabel">
            <?php $ctr = 1?>
            <thead>
                <th>No</th>
                <th>Nama User</th>
                <th>Nama Subscription</th>
                <th>Metode Pembayaran</th>
                <th>Bukti Payment</th>
                <th>Konfirmasi</th>
            </thead>
            <tbody id="tbody">
                @foreach ($confirmation as $item)
                    <tr>

                        <td>{{$ctr}}</td>
                        <td>{{$item->full_name}}</td>
                        <td>{{$item->nama_subscription}}</td>
                        <td>{{$item->nama_metode_pembayaran}}</td>
                        <td>
                        <img src="{{url("storage/assetGambar/buktipayment/".$item->bukti_payment)}}" alt="" width="250px;"></td>

                    </tr>
                    <?php $ctr += 1?>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <!-- Vendor JS Files -->

    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="/assets/vendor/counterup/counterup.min.js"></script>
    <script src="/assets/vendor/venobox/venobox.min.js"></script>
    <script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="/assets/js/main.js"></script>
    <script>
        $(document).ready(function(){
            $("#tabel").DataTable({
                pageLength: 5,
                "lengthMenu": [[ 5,10, 25, 50, -1], [ 5,10, 25, 50, "All"]],
                'columnDefs': [ {
                    // @see https://datatables.net/reference/option/columnDefs
                    'targets': [2], /* table column index */
                    'orderable': true, /* true or false */
                    responsive : true
                }]
            });

            $('.image').on('click', function(){
                $(this).toggleClass('zoomed');
            });
        });

        var msg = '{{Session::get('notrans')}}';
        var exist = '{{Session::has('notrans')}}';
        if(exist){
            window.setTimeout(function () {
                swal({
                    title: 'Transaksi tidak ditemukan!',
                    icon: 'error',
                    showCloseButton: true
                });
            },200);
        }

        var msg1 = '{{Session::get('nosubs')}}';
        var exist1 = '{{Session::has('nosubs')}}';
        if(exist1){
            window.setTimeout(function () {
                swal({
                    title: 'Subscription tidak ditemukan!',
                    text: 'Data subscription yang ingin diupdate tidak ditemukan!',
                    icon: 'error',
                    showCloseButton: true
                });
            },200);
        }

        var msg2 = '{{Session::get('nouser')}}';
        var exist2 = '{{Session::has('nouser')}}';
        if(exist2){
            window.setTimeout(function () {
                swal({
                    title: 'User tidak ditemukan!',
                    text: 'Data user yang ingin diupdate tidak ditemukan!',
                    icon: 'error',
                    showCloseButton: true
                });
            },200);
        }

        var msg3 = '{{Session::get('success')}}';
        var exist3 = '{{Session::has('success')}}';
        if(exist3){
            window.setTimeout(function () {
                swal({
                    title: 'Konfirmasi pembayaran berhasil!',
                    icon: 'success',
                    showCloseButton: true
                });
            },200);
        }

        var msg4 = '{{Session::get('successreject')}}';
        var exist4 = '{{Session::has('successreject')}}';
        if(exist4){
            window.setTimeout(function () {
                swal({
                    title: 'Reject pembayaran berhasil!',
                    icon: 'success',
                    showCloseButton: true
                });
            },200);
        }

    </script>
@endsection
