@extends("Pekerja.master")
@section("title","Edit Profile")
@section("content")
    <style>
        body{
            background-color: whitesmoke;
        }

        input[type=text],input[type=password],input[type=email],textarea, select {
            width: 85%;
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

        .colt{
            background-color: white;
            padding: 2%;
            box-shadow: 1px 1px 4px;
        }

        .design{
            background-color: #2847B2;
            width: 12%;
            box-shadow: 1px 1px 4px;
        }

        </style>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <!-- Content -->
    <div class="container-fluid mt-5 d-flex justify-content-center">
        <div class="design mt-2 ml-n4"></div>
        <div class="col-7 colt mt-2">
            <form action="/pekerja/updateprofile" method="post" enctype="multipart/form-data">
                @csrf
                <h1 class="mb-3">Data Pekerja</h1>
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <p style="margin-top:3%;"><b>{{$err}}</b></p>
                    @endforeach
                @endif
                <br>
                Nama Pekerja <br>
                <input type='text' name='name' value = "{{$datapekerja->nama_pekerja}}"><br><br>
                Username <br>
                <input type='text' name='username' value = "{{$datapekerja->username_pekerja}}" readonly><br><br>
                Password <br>
                <input type='password' name='password'><br><br>
                Confirm Password <br>
                <input type='password' name='confirm_password'><br><br>
                Email <br>
                <input type='email' name='email' value = "{{$datapekerja->email_pekerja}}" readonly><br><br>
                Alamat <br>
                <input type='text' name='address' value = "{{$datapekerja->alamat_pekerja}}"><br><br>
                Telepon <br>
                <input type='text' name='telephone_number' value = "{{$datapekerja->telepon_pekerja}}"><br><br>
                <button type='submit' class="btn btn-warning" name='btnOk'>Update Profile</button>
            </form>

        </div>

    </div>

    <!-- Dummy div -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Template Main JS File -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/assets/js/main.js"></script>

    <script>
        var msg = '{{Session::get('success')}}';
        var exist = '{{Session::has('success')}}';
        if(exist){
            window.setTimeout(function () {
                swal({
                    title: 'Profile berhasil di-update!',
                    icon: 'success',
                    showCloseButton: true
                });
            },200);
        }

        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            window.setTimeout(function () {
                swal({
                    title: 'Gagal melakukan update profile!',
                    icon: 'error',
                    showCloseButton: true
                });
            },200);
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
