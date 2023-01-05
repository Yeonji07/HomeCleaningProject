@extends("Admin.master");
@section("title","Tambah Pekerja")
@section("content")
    <!-- Dummy div -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <!-- Content -->
    <div class="container-fluid mt-5 d-flex justify-content-center">
        <div class="design mt-2 ml-n4"></div>
        <div class="col-7 colt mt-2">
            <form action="/admin/tambahpekerja" method="post" enctype="multipart/form-data">
                @csrf
                <h1 class="mb-3">Data Pekerja</h1>
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <p style="margin-left: 5%;margin-top:5%;"><b>{{$err}}</b></p>
                    @endforeach
                @endif
                Nama Pekerja <br>
                <input type='text' name='txtNamapekerja' value = "{{old('txtNamapekerja')}}" required><br><br>
                Username <br>
                <input type='text' name='txtUsernamepekerja' value = "{{old('txtUsernamepekerja')}}" required><br><br>
                Password <br>
                <input type='password' name='txtPasswordpekerja' id='showPass' value = "" required><br>
                <input class="mt-3" type="checkbox" name='cbShow' onclick='tampilPassword()'value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Show Password
                </label><br>
                <br>
                Email <br>
                <input type='email' name='txtEmailpekerja' value = "{{old('txtEmailpekerja')}}" required><br><br>
                Alamat <br>
                <input type='text' name='txtAlamatpekerja' value = "{{old('txtAlamatpekerja')}}" required><br><br>
                Telepon <br>
                <input type='text' name='txtTeleponpekerja' value = "{{old('txtTeleponpekerja')}}" required><br><br>
                <input type="hidden" name="idedt" value=''>
                <button type='submit' class="btn btn-primary" name='btnOk'>Add Pekerja</button>
            </form>

        </div>

    </div>

    <!-- Dummy div -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <!-- Vendor JS Files -->


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
        });

        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            window.setTimeout(function () {
                swal({
                    title: 'Username / email sudah terdaftar!',
                    icon: 'error',
                    showCloseButton: true
                });
            },200);
        }

        var msg = '{{Session::get('success')}}';
        var exist = '{{Session::has('success')}}';
        if(exist){
            window.setTimeout(function () {
                swal({
                    title: 'Berhasil menambah pekerja!',
                    icon: 'success',
                    showCloseButton: true
                });
            },200);
        }

        function tampilPassword() {
        var temp = document.getElementById("showPass");
            if (temp.type === "password") {
                temp.type = "text";
            } else {
                temp.type = "password";
            }
        }

    </script>
@endsection
