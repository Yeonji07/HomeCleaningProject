@extends("Customer.master")
@section("title","History")
@section("content")
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js" defer></script>

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

        .row form{display:inline-block;}
        #tbody tr:nth-child(odd){
            background-color: white;
        }

        .btn-rate{
            background-color: transparent;
            outline: none;
            border: 1px solid white;
        }

        .form-rating{
            width: 45px;
        }

    </style>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <div class="container mt-5 pt-4">
        <h2 style='width:500px;'>History Transaksi</h2>
        <form id="formDate" action="/user/getHistory" method="POST">
            @csrf
            Start Date: <input type="date" id="dateStart" name="dateStart" size="30" style="margin-right: 10px;">
            End Date: <input type="date" id="dateend" name="dateend" size="30" style="margin-right:10px;">
            <button class="btn btn-primary" type="submit">Filter</button>
        </form>
        <br>
        <table id="tabel" class="table table-lg table-bordered mt-5" style="width:100%;">
            <thead id="thead">
                <tr>
                <th>Nama Transaksi</th>
                <th>Voucher</th>
                <th>Jenis Transaksi</th>
                <th>Metode Pembayaran</th>
                <th>Tanggal Transaksi</th>
                <th>Rating</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th>Nama Transaksi</th>
                <th></th>
                <th>Jenis Transaksi</th>
                <th>Metode Pembayaran</th>
                <th>Tanggal Transaksi</th>
                <th></th>
                </tr>
            </tfoot>
            <tbody id="tbody">
                @foreach ($merge as $i)
                    <tr>
                        <td>{{$i["namaTrans"]}}</td>
                        <td>{{$i["voucher"]}}</td>
                        <td>{{$i["jenisTrans"]}}</td>
                        <td>{{$i["metode_pembayaran"]}}</td>
                        <td>{{$i["tanggalTrans"]}}</td>
                        <td class="d-flex justify-content-between">
                            @if($i["statusRating"] == 0)
                                @if ($i["idsubs"] != -1)
                                    @if ($i["idsubs"] > 4)
                                        <form action='/user/rating1' method='post' class="form-rating">
                                            @csrf
                                            <input type='hidden' name='idDetail' value='{{$i["idDetail"]}}'>
                                            <button type='submit' class="btn-rate mr-5"><img src="{{url('/assets/img/Verybad.png')}}" style="width: 38px;"></button>
                                        </form>

                                        <form action='/user/rating2' method='post' class="form-rating">
                                            @csrf
                                            <input type='hidden' name='idDetail' value='{{$i["idDetail"]}}'>
                                            <button type='submit' class="btn-rate mr-5"><img src="{{url('/assets/img/Bad.png')}}" style="width: 38px;"></button>
                                        </form>

                                        <form action='/user/rating3' method='post' class="form-rating">
                                            @csrf
                                            <input type='hidden' name='idDetail' value='{{$i["idDetail"]}}'>
                                            <button type='submit' class="btn-rate mr-5"><img src="{{url('/assets/img/Good.png')}}" style="width: 38px;"></button>
                                        </form>

                                        <form action='/user/rating4' method='post' class="form-rating">
                                            @csrf
                                            <input type='hidden' name='idDetail' value='{{$i["idDetail"]}}'>
                                            <button type='submit' class="btn-rate mr-5"><img src="{{url('/assets/img/Verygood.png')}}" style="width: 38px;"></button>
                                        </form>

                                        <form action='/user/rating5' method='post' class="form-rating">
                                            @csrf
                                            <input type='hidden' name='idDetail' value='{{$i["idDetail"]}}'>
                                            <button type='submit' class="btn-rate mr-5"><img src="{{url('/assets/img/Awesome.png')}}" style="width: 38px;"></button>
                                        </form>
                                    @endif
                                @endif

                            @else
                                <b>Rated</b>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Vendor JS Files -->
    <!-- Template Main JS File -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var start_date;
        var end_date;
        var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
            var dateStart = parseDateValue(start_date);
            var dateEnd = parseDateValue(end_date);
            //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
            //nama depan = 0
            //nama belakang = 1
            //tanggal terdaftar =2
            var evalDate= parseDateValue(aData[2]);
            if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
                ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
                ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
                ( dateStart <= evalDate && evalDate <= dateEnd ) )
            {
                return true;
            }
            return false;
        });

        // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
        function parseDateValue(rawDate) {
            var dateArray= rawDate.split("/");
            var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11
            return parsedDate;
        }
        var exist = '{{Session::has('selesai')}}';
        if(exist){
            window.setTimeout(function () {
                swal({
                    title: 'Berhasil Memberikan Rating!',
                    text: 'Terimakasih atas feedback anda!',
                    icon: 'success',
                    showCloseButton: true
                });
            },200);
        }

        $(document).ready(function(){
            var table = $('#tabel').DataTable({
                pageLength: 5,
                "order": [[ 1, "desc" ]],
                "lengthMenu": [[ 5,10, 25, 50, -1], [ 5,10, 25, 50, "All"]],
                'columnDefs': [ {
                        // @see https://datatables.net/reference/option/columnDefs
                        'targets': [2], /* table column index */
                        'orderable': true, /* true or false */
                        responsive : true
                    }],
            });

            $("#tabel tfoot th").each( function ( i ) {
                if ($(this).text() !== '') {
                    var isStatusColumn = (($(this).text() == 'Status') ? true : false);
                    var select = $('<select><option value=""></option></select>')
                        .appendTo( $(this).empty() )
                        .on( 'change', function () {
                            var val = $(this).val();

                            table.column( i )
                                .search( val ? '^'+$(this).val()+'$' : val, true, false )
                                .draw();
                        } );

                    // Get the Status values a specific way since the status is a anchor/image
                    if (isStatusColumn) {
                        var statusItems = [];

                        /* ### IS THERE A BETTER/SIMPLER WAY TO GET A UNIQUE ARRAY OF <TD> data-filter ATTRIBUTES? ### */
                        table.column( i ).nodes().to$().each( function(d, j){
                            var thisStatus = $(j).attr("data-filter");
                            if($.inArray(thisStatus, statusItems) === -1) statusItems.push(thisStatus);
                        } );

                        statusItems.sort();

                        $.each( statusItems, function(i, item){
                            select.append( '<option value="'+item+'">'+item+'</option>' );
                        });

                    }
                    // All other non-Status columns (like the example)
                    else {
                        table.column( i ).data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' );
                        } );
                    }

                }
            });
        //menambahkan daterangepicker di dalam datatables
        });


    </script>
@endsection
