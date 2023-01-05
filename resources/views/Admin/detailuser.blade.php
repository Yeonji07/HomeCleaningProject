@extends("Admin.master")
@section("title","Detail User")
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
        <h3 style='width:500px;'>Daftar Transaksi {{$user->full_name}}</h3>
        <br>
        <table id="tabel" border='1' class="table table-bordered">
            <?php $ctr = 1?>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Nama Subscription</th>
                    <th>Metode Pembayaran</th>
                    <th>Tanggal Order</th>
                    <th>Tanggal Expired</th>
                    <th>Bukti Payment</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            {{-- <tfoot>
                <tr>
                    <th>Nama Jasa</th>
                    <th>Nama Pekerja</th>
                    <th>Tanggal Pengerjaan</th>
                    <th>Tanggal Penyelesaian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot> --}}
            <tbody id="tbody">
                @foreach ($datatransaksi as $item)
                    <tr>
                        <td>{{$ctr}}</td>
                        <td>{{$item->full_name}}</td>
                        <td>{{$item->nama_subscription}}</td>
                        <td>{{$item->nama_metode_pembayaran}}</td>
                        <td>
                            <?php
                                $date = new DateTime($item->tanggal_order);
                                $df = date_format($date,'d F Y , h.i A');
                            ?>
                            {{$df}}
                        </td>
                        <td>
                            <?php
                                $date1 = new DateTime($item->tanggal_expired);
                                $df1 = date_format($date1,'d F Y , h.i A');
                            ?>
                            {{$df1}}
                        </td>
                        <td>
                            <img src="{{url("storage/assetGambar/buktipayment/".$item->bukti_payment)}}" class='image' style="width: 250px;"></td>
                        @if ($item->statusconfirm == 0)
                            <td style="color: red;">Belum Dikonfirmasi</td>
                        @else
                            <td style="color: #5CBD36;">Sudah Dikonfirmasi</td>
                        @endif
                    </tr>

                    <?php $ctr = $ctr+1?>
                @endforeach

            </tbody>

        </table>
        <!-- Dummy Div -->
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4"></h1>
        </div>
    </div>
    <!-- Dummy Div -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <!-- Vendor JS Files -->

    {{-- <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="/assets/vendor/counterup/counterup.min.js"></script>
    <script src="/assets/vendor/venobox/venobox.min.js"></script>
    <script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script> --}}

    <!-- Template Main JS File -->
    <script>
        $(document).ready(function(){
            var table = $('#tabel').DataTable({
            pageLength: 5,
            "order": [[ 0, "asc" ]],
            "oLanguage": {
                "sInfo": "Showing _START_ to _END_ of _TOTAL_ items."
            },
            "lengthMenu": [[ 5,10, 25, 50, -1], [ 5,10, 25, 50, "All"]],
            'columnDefs': [ {
                    // @see https://datatables.net/reference/option/columnDefs
                    'targets': [2], /* table column index */
                    'orderable': true, /* true or false */
                    responsive : true
                }],
            });
            $("#tabel tfoot th").each( function (i) {
                if ($(this).text() !== '') {
                    if($(this).text()=="Status Pembayaran"){
                        var isStatusColumn = (($(this).text() == 'Status') ? true : false);
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(this).empty() )
                            .on( 'change', function () {
                                var val = $(this).val();

                                table.column( i )
                                    .search( val ? '^'+$(this).val()+'$' : val, true, false )
                                    .draw();
                            });

                        // Get the Status values a specific way since the status is a anchor/image
                        if (isStatusColumn) {
                            var statusItems = [];

                            /* ### IS THERE A BETTER/SIMPLER WAY TO GET A UNIQUE ARRAY OF <TD> data-filter ATTRIBUTES? ### */
                            table.column( i ).nodes().to$().each( function(d, j){
                                var thisStatus = $(j).attr("data-filter");
                                if($.inArray(thisStatus, statusItems) === -1) statusItems.push(thisStatus);
                            });

                            statusItems.sort();

                            $.each( statusItems, function(i, item){
                                select.append( '<option value="'+item+'">'+item+'</option>' );
                            });

                        }
                        // All other non-Status columns (like the example)
                        else {
                            table.column( i ).data().unique().sort().each( function ( d, j ) {
                                select.append( '<option value="'+d+'">'+d+'</option>' );
                            });
                        }
                    }
                }
            });

            $('.image').on('click', function(){
                $(this).toggleClass('zoomed');
            });
        });
    </script>

@endsection
