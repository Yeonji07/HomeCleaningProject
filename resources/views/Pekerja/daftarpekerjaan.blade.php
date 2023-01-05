@extends("Pekerja.master")
@section("title","Daftar Kerja")
@section("content")
<style>
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

    <!-- Content -->
    <div class="container">
        <h3 style='width:500px;' class="mt-5">Daftar Pekerjaan</h3>
        <br>
        <table id="tabel" border='1' class="table table-bordered justify-content-center">
            <?php $ctr = 1 ?>
            <thead>
                <th>No</th>
                <th>Nama Jasa</th>
                <th>Nama Pelanggan</th>
                <th>Alamat Pengerjaan</th>
                <th>Tanggal Pengerjaan</th>
                <th>Tanggal Penyelesaian</th>
                <th>Status</th>
                <th>Bukti Selesai</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($daftarkerja as $h)
                    <tr>
                        <td>{{$ctr}}</td>
                        <td>{{$h->nama_subscription}}</td>
                        <td>{{$h->full_name}}</td>
                        <td>{{$h->alamat}}</td>
                        <td>
                            <?php
                                $date = new DateTime($h->dipesan_untuk);
                                $df0 = date_format($date,'d F Y , H:i:s');
                            ?>
                            {{$df0}}
                        </td>
                        {{-- <td>
                            <?php
                                // if ($h->jam_mulai != null) {
                                //     $date = new DateTime($h->jam_mulai);
                                //     $df = date_format($date,'d F Y , H:i:s');
                                // }
                                // else{
                                //     $df = "Belum mulai";
                                // }

                            ?>
                            {{$df}}
                        </td> --}}
                        <td>
                            @if ($h->jam_selesai == "0000-00-00 00:00:00")
                                Belum Selesai
                            @else
                                <?php
                                    if ($h->jam_selesai != null) {
                                        $date1 = new DateTime($h->jam_selesai);
                                        $df1 = date_format($date1,'d F Y , H:i:s');
                                    }
                                    else{
                                        $df1 = "Belum selesai";
                                    }

                                ?>
                                {{$df1}}
                            @endif
                        </td>
                        @if($h->status == 0)
                            <td>Menunggu Konfirmasi Customer</td>
                            <?php $disabled = "disabled"; ?>
                        @elseif($h->status == 1)
                            <td>ONGOING</td>
                            <?php $disabled = "disabled"; ?>
                        @elseif ($h->status == 2)
                            <td>Confirmed by worker</td>
                            <?php $disabled = ""; ?>
                        @elseif($h->status == 3)
                            <td>Confirmed by customer</td>
                            <?php $disabled = "disabled"; ?>
                        @endif
                        @php
                            $isdisabled = "";
                            if($h->bukti_foto==null || $h->status == 2){
                                $isdisabled = "disabled";
                            }
                        @endphp
                        <td>
                            @if ($h->bukti_foto==null)
                            <img src="{{url('/assets/img/nophoto.jpg')}}" style="width: 50px;">
                            @elseif ($h->bukti_foto!=null)
                            {{-- bukti foto --}}
                            <img src="{{url('storage/buktipekerja/'.$h->bukti_foto)}}" style="width: 50px;" id="imgmodal" data-toggle="modal" data-target="#exampleModal{{$ctr}}">
                            @endif

                            <form action="/pekerja/bukti" method="post" enctype="multipart/form-data" style="width: 100%;">
                                @csrf
                                <input type="hidden" name="iddetail" value={{$h->id_dt_transaksi}}>
                                <input type="file" name="bukti_pekerja"><br>
                                <input type="submit" value="Upload">
                            </form>
                        </td>
                        <td>
                            <form action="/pekerja/ubahstatus" method="post">
                                @csrf
                                <input type='hidden' name='iddetail' id='iddetail' value='{{$h->id_dt_transaksi}}'>
                                <button type="submit" name="btnConfirm" class="btn btn-primary" value="{{$h->status}}" <?=$isdisabled?> >Done</button>
                            </form>
                            <br>
                            <form action="/pekerja/getSurat" method="post">
                                @csrf
                                <input type='hidden' name='iddetail1' id='iddetail1' value='{{$h->id_dt_transaksi}}'>
                                <button type="submit" name="btnConfirm1" class="btn btn-success" value="{{$h->status}}">Surat</button>
                            </form>
                        </td>

                        {{-- <td>{{$h->status}}</td> --}}
                    </tr>
                        <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$ctr}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content ">
                            <div class="modal-body" id="modalBody">
                                <img src="{{url('storage/buktipekerja/'.$h->bukti_foto)}}" style="width: 300px;" id="imgmodal">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <?php $ctr += 1?>
                @endforeach

            </tbody>
        </table>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#tabel").DataTable({
                pageLength: 5,
                "lengthMenu": [[ 5,10, 25, 50, -1], [ 5,10, 25, 50, "All"]],
                'columnDefs': [ {
                    // @see https://datatables.net/reference/option/columnDefs
                    'targets': [2], /* table column index */
                    'orderable': true, /* true or false */
                    responsive : true,
                }],
                "order": [[ 0, "asc" ]]
            });
        });

        var exist = '{{Session::has('success')}}';
        if (exist) {
            window.setTimeout(function () {
                swal({
                    title: 'Berhasil melakukan konfirmasi penyelesaian pekerjaan!',
                    text: 'Silahkan menunggu konfirmasi penyelesaian dari customer',
                    icon: 'success',
                    showCloseButton: true
                });
            },200);
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection



