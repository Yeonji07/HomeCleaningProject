
@extends("Admin.master");
@section("title","Daftar Appointment")
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
<div class="pricing-header px-3 py-5 pt-md-5 pb-md-5 mx-auto text-center">
    <h1 class="display-4"></h1>
</div>

<div class="container">
    <h1 style="font-family: Arial, Helvetica, sans-serif;">Daftar Appointment</h1>
    <table border='1' style="text-align: center;" class="table table-bordered" id="tabel">
        <?php $ctr = 1?>
        <thead>
            <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Nama Jasa</th>
            <th>Nama Pekerja</th>
            <th>Tanggal Pengerjaan</th>
            <th>Tanggal Penyelesaian</th>
            <th>Status</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Status</th>
                </tr>
        </tfoot>
        <tbody id="tbody">
            @foreach ($appointment as $item)
                <tr>
                    <td>{{$ctr}}</td>
                    <td>{{$item->full_name}}</td>
                    <td>{{$item->nama_subscription}}</td>
                    <td>{{$item->nama_pekerja}}</td>
                    <td>
                        <?php
                            $date1 = new DateTime($item->dipesan_untuk);
                            $df1 = date_format($date1,'d F Y , H:i:s');
                        ?>
                        {{$df1}}
                    </td>
                    <td>
                        @if ($item->jam_selesai == "0000-00-00 00:00:00")
                            {{"Belum Selesai"}}
                        @else
                            <?php
                                if ($item->jam_selesai != null) {
                                    $date = new DateTime($item->jam_selesai);
                                    $df = date_format($date,'d F Y , H:i:s');
                                }
                                else{
                                    $df = "Belum Selesai";
                                }

                            ?>
                            {{$df}}
                        @endif
                    </td>
                    <td>
                        @if ($item->status == 0)
                            {{"ONGOING"}}
                        @elseif ($item->status == 1)
                            {{"Confirmed by worker"}}
                        @elseif ($item->status == 2)
                            {{"Confirmed by customer"}}
                        @endif
                    </td>
                </tr>
                <?php $ctr = $ctr+1?>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Dummy Div -->
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-5 mx-auto text-center">
    <h1 class="display-4"></h1>
</div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

<!-- Vendor JS Files -->


<script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>
<script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="/assets/vendor/counterup/counterup.min.js"></script>
<script src="/assets/vendor/venobox/venobox.min.js"></script>
<script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
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
    } );


}

} );

$('.image').on('click', function(){
        $(this).toggleClass('zoomed');
    });
});
</script>
@endsection
