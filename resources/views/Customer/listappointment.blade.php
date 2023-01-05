@extends("Customer.master")
@section("title","List Appointment")
@section("content")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
        .container-fluid{
            background-color: white;
            border-radius: 8px;
            max-width: 95vw;
        }
        ul,li{
            list-style-type: none;
        }
        #tbody tr:nth-child(odd){
            background-color: white;
        }
        #exampleModal {
            padding-top: 10vw;
        }
        #modalBody{
            padding-left: 6vw;
            padding-top: 6vw;
            padding-bottom: 3vw;
        }
    </style>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>
    <!-- Dummy Div -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <div class="container-fluid mt-5 pt-4">
        <h3 style='width:500px;'>Daftar Appointment</h3>
        <br>
        <table id="tabel" border='1' class="table table-bordered">
            <thead>
                <tr>
                <th>Nama Jasa</th>
                <th>Nama Pekerja</th>
                <th>Tanggal Pemesanan</th>
                <th>Tanggal Pengerjaan</th>
                <th>Tanggal Penyelesaian</th>
                <th>Status</th>
                <th>Bukti Penyelesaian</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th>Nama Jasa</th>
                <th>Nama Pekerja</th>
                <th>Tanggal Pemesanan</th>
                <th>Tanggal Pengerjaan</th>
                <th>Tanggal Penyelesaian</th>
                <th>Status</th>
                <th></th>
                <th></th>
                </tr>
            </tfoot>
            @php
                $sudahDikonfirmasi = "";
                $ctrGambar = 0;
            @endphp
            <tbody id="tbody">
                @foreach ($listappointment as $item)
                    <tr>
                        <td>{{$item->nama_subscription}}</td>
                        <td>{{$item->nama_pekerja}}</td>
                        <td>
                            <?php
                                $date = new DateTime($item->dipesan_untuk);
                                $df = date_format($date,'d F Y , H:i:s');
                            ?>
                        {{$df}}
                        </td>
                        <td>
                            @if ($item->jam_mulai == null)
                                Belum Mulai
                                <?php $sudahDikonfirmasi = "";?>
                            @else
                                <?php
                                    $date1 = new DateTime($item->jam_mulai);
                                    $df1 = date_format($date,'d F Y , H:i:s');
                                    $sudahDikonfirmasi = "disabled";
                                ?>
                                {{$df1}}
                            @endif
                        </td>
                        <td>
                            @if ($item->jam_selesai == null)
                                Belum Selesai
                            @else
                                <?php
                                    $date2 = new DateTime($item->jam_selesai);
                                    $df2 = date_format($date2,'d F Y , H:i:s');
                                ?>
                                {{$df2}}
                            @endif
                        </td>

                        @if($item->status == 0)
                            <td>Menunggu Konfirmasi User</td>
                            <?php $disabled = "disabled"; ?>
                        @elseif ($item->status == 1)
                            <td>ONGOING</td>
                            <?php $disabled = ""; ?>
                        @elseif($item->status == 2)
                            <td>Confirmed by worker</td>
                            <?php $disabled = ""; ?>
                        @elseif($item->status == 3)
                            <td>Confirmed by customer </td>
                            <?php $disabled = "disabled"; ?>
                        @endif
                        {{-- <td>bukti foto</td> --}}
                        <td>
                            @if ($item->bukti_foto==null)
                            <img src="{{url('/assets/img/nophoto.jpg')}}" style="width: 50px;">
                            @elseif ($item->bukti_foto!=null)
                            {{-- bukti foto --}}
                            <img src="{{url('storage/buktipekerja/'.$item->bukti_foto)}}" style="width: 50px;" id="imgmodal" data-toggle="modal" data-target="#exampleModal{{$ctrGambar}}">
                            @endif
                        </td>
                        <td>
                            <form action="/user/appointmentdone" method="post">
                                @csrf
                                <button type='submit' class='btn btn-primary' {{$disabled}} name='btnSelesai' value="{{$item->id_dt_transaksi}}">Selesai</button>
                            </form>
                            <br>
                            <form action="/user/showdetailpekerja" method="get">
                                @csrf
                                <input type="hidden" value="{{$item->id_pekerja}}" name="idPekerjaa">
                                <button type='submit' class='btn btn-warning' name='btnDetailPekerja' >Detail Pekerja</button>
                            </form>

                            {{-- untuk memulai pekerjaan --}}
                            <br>
                            <form action="/user/mulaipekerjaan" method="post">
                                @csrf
                                <input type="hidden" value="{{$item->id_dt_transaksi}}" name="idDetail">
                                <button type='submit' class='btn btn-success' name='btnDetail' {{$sudahDikonfirmasi}} >Konfirmasi Mulai Pekerjaan</button>
                            </form>
                        </td>

                    </tr>
                    <div class="modal fade" id="exampleModal{{$ctrGambar}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content ">
                            <div class="modal-body" id="modalBody">
                                <img src="{{url('storage/buktipekerja/'.$item->bukti_foto)}}" style="width: 300px;" id="imgmodal">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    @php
                        $ctrGambar++;
                    @endphp
                @endforeach

            </tbody>

        </table>
    </div>
    <!-- Dummy Div -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js" defer></script>

    <script src="/assets/js/main.js"></script>
    <script>
        $(document).ready(function(){
            var table = $('#tabel').DataTable({
            pageLength: 5,
            "order": [[ 1, "desc" ]],
            "lengthMenu": [[ 5,10, 25, 50, -1], [ 5,10, 25, 50, "All"]],
            'columnDefs': [{
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
                    table.column( i ).data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' );
                        });
                }
            });
        });

        var exist = '{{Session::has('selesai')}}';
        if(exist){
            window.setTimeout(function () {
                swal({
                    title: 'Berhasil Menyelesaikan Appointment!',
                    text: 'Selamat, Rumah Kamu Sekarang Sudah Bersih!',
                    icon: 'success',
                    showCloseButton: true
                });
            },200);
        }

    </script>


@endsection
