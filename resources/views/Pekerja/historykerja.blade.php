@extends("Pekerja.master")
@section("title","History Pekerjaan")
@section("content")

<style>
    body{
        background-color: whitesmoke;
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
    ul,li{
        list-style-type: none;
    }

</style>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4"></h1>
  </div>

  <div class="container">
      <h3 style='width:500px;'  class="mt-5">History Pekerjaan</h3>
      <br>
      <table id="tabel" border='1' class="table table-bordered">
        <?php $ctr = 1?>
          <thead>
              <th>No</th>
              <th>Nama Jasa</th>
              <th>Nama Pelanggan</th>
              <th>Tanggal Pengerjaan</th>
              <th>Tanggal Penyelesaian</th>
              <th>Status</th>
              <th>Gaji Yang Didapatkan</th>
          </thead>
          <tbody>

            @foreach ($history as $h)
                <tr>
                    <td>{{$ctr}}</td>
                    <td>{{$h->nama_subscription}}</td>
                    <td>{{$h->full_name}}</td>
                    <td>
                        <?php
                            $date = new DateTime($h->jam_mulai);
                            $df = date_format($date,'d F Y , H:i:s');
                        ?>
                        {{$df}}
                    </td>
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
                                    $df1 = "Belum Selesai";
                                }

                            ?>
                            {{$df1}}
                        @endif
                    </td>

                    @if ($h->status == 1)
                        <td style="color: #5CBD36;">Selesai</td>
                    @endif

                    <td>
                        {{-- Ini untuk penggajian (Kalkulasie, 65% dari harga pembersihan akan diterima pekerja, sisanya pihak homecleaning) --}}
                        <?php
                            $hargasubs = $h->harga_subscription;
                            $gaji = $hargasubs * 0.65;
                            $formatgaji = number_format($gaji,0,",",".");
                        ?>
                        Rp. {{$formatgaji}}
                    </td>

                </tr>
                <?php $ctr += 1?>
            @endforeach
          </tbody>

      </table>


  </div>
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
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
