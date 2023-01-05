@extends("Admin.master");
@section("title","Daftar Pekerja")
@section("content")
<style>
    body{
        background-color: white;
    }
    input[type=text],input[type=password],input[type=email],textarea, select {
        width: 80%;
        height: 40px;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    #btnEdit,#btnDelete{
        display: inline-flex;
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

    #tbody tr:nth-child(odd){
        background-color: #f2f2f2;
    }

    input[type=text],input[type=password],input[type=email],input[type=datetime-local],textarea, select {
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
</style>
<div class="pricing-header px-3 py-5 pt-md-5 pb-md-5 mx-auto text-center">
    <h1 class="display-4"></h1>
</div>

<!-- Content -->
<div class="container">
    <h1 style="font-family: Arial, Helvetica, sans-serif;">Daftar Pekerja</h1>
    <table id="tabel" class="table table-lg table-bordered" style="width:100%;">
        <?php $ctr = 1?>

        <thead>
            <th>No</th>
            <th>Nama Pekerja</th>
            <th>Username</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No.Telp</th>
            <th>Action</th>
        </thead>
        @foreach ($pekerja as $p )
        <tbody id="tbody">
            <tr>
                <td>{{$ctr}}</td>
                <td>{{$p->nama_pekerja}}</td>
                <td>{{$p->username_pekerja}}</td>
                <td>{{$p->alamat_pekerja}}</td>
                <td>{{$p->email_pekerja}}</td>
                <td>{{$p->telepon_pekerja}}</td>
                @if ($p->status == 1)
                    <form action="/admin/deletepekerja" method="post">
                        @csrf
                        {{-- <input type="hidden" name="username" value="{{$p->username_pekerja}}"> --}}
                        <td><button class='btn btn-danger' name="btnDelete" value="{{$p->username_pekerja}}">Delete</button></td>
                    </form>
                @else
                    <form action="/admin/deletepekerja" method="post">
                        @csrf
                        {{-- <input type="hidden" name="username" value="{{$p->username_pekerja}}"> --}}
                        <td><button class='btn btn-warning' name="btnDelete" value="{{$p->username_pekerja}}">Activate</button></td>
                    </form>
                @endif

            </tr>
        </tbody>
        <?php $ctr = $ctr+1?>
        @endforeach
    </table>
</div>

</body>
</html>

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
                responsive : true
            }]
        });
    });

    var msg = '{{Session::get('deleted')}}';
    var exist = '{{Session::has('deleted')}}';
    if(exist){
        window.setTimeout(function () {
            swal({
                title: 'Pekerja berhasil di delete!',
                icon: 'success',
                showCloseButton: true
            });
        },200);
    }

    var msg1 = '{{Session::get('activated')}}';
    var exist1 = '{{Session::has('activated')}}';
    if(exist1){
        window.setTimeout(function () {
            swal({
                title: 'Pekerja berhasil di activated!',
                icon: 'success',
                showCloseButton: true
            });
        },200);
    }
</script>


<!-- Template Main JS File -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="/assets/js/main.js"></script>
@endsection
