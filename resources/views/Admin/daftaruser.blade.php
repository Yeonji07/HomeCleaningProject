@extends("Admin.master");
@section("title","Daftar User")
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
</style>
<div class="pricing-header px-3 py-5 pt-md-5 pb-md-5 mx-auto text-center">
    <h1 class="display-4"></h1>
</div>

<div class="container">
    <h1 style="font-family: Arial, Helvetica, sans-serif;">Daftar User</h1>
    <table border='1' class="table table-lg table-bordered ml-n1" id="tabel">
        <?php $ctr = 1 ?>
        <thead>
            <th>No</th>
            <th>Nama User</th>
            <th>Username</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Status Akun</th>
            <th>Status Email</th>
            <th>Detail</th>
        </thead>
        <tbody id="tbody">
            @foreach ($users as $p )
                <tr>
                    <td>{{$ctr}}</td>
                    <td>{{$p->full_name}}</td>
                    <td>{{$p->username}}</td>
                    <td>{{$p->email}}</td>
                    <td>{{$p->alamat}}</td>
                    <td>{{$p->nomor_telepon}}</td>
                    @if ($p->status == 1)
                        <td style="color: #5CBD36;">Active</td>
                    @else
                        <td style="color: red;">Non-Active</td>
                    @endif
                    @if ($p->status_email == 1)
                        <td style="color: #5CBD36;"> {{"Verified"}}</td>
                    @else
                        <td style="color: red;">{{"Not Verified"}}</td>
                    @endif
                    <td>
                        <form action="/admin/detailuser" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary ml-2" name="detailUser" value="{{$p->id_user}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </button>
                        </form>
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



<!-- Template Main JS File -->
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
    });

</script>
@endsection
