@extends("Home.template")
@section("title","Sign Up")
@section("style")
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="homecleaning.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection
@section("content")
    <div class="container d-flex justify-content-center" style="background-color: transparent;">
        <div class="design"></div>
        <div class="signup-form">
            <form action="/signup" method="post">
                @csrf
                <h2>Sign Up</h2>
                <p>Please fill in this form to create an account!</p>
                <hr>
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <p style="margin-left: 5%;margin-top:5%;"><b>{{$err}}</b></p>
                    @endforeach
                @endif
                <div class="form-group">
                    <div class="row">
                        <div class="col"><input type="text" class="form-control" name="txtFirstname" placeholder="First Name" required="required" value="{{old('txtFirstname')}}"></div>
                        <div class="col"><input type="text" class="form-control" name="txtLastname" placeholder="Last Name" required="required" value="{{old('txtLastname')}}"></div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="txtUsername" placeholder="Username" required="required" value="{{old('txtUsername')}}">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="txtEmail" placeholder="Email" required="required" value="{{old('txtEmail')}}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="txtAlamat" placeholder="Alamat" required="required" value="{{old('txtAlamat')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="txtNotelp" placeholder="Nomor Telepon" required="required" value="{{old('txtNotelp')}}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="txtPassword" id='showPass' placeholder="Password" required="required">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="txtConfirm" id='showPass2' placeholder="Confirm Password" required="required">
                </div>
                <input class="mb-3" type="checkbox" name='cbShow' onclick='tampilPassword()'value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Show Password
                </label>
                <div class="form-group">
                    <label class="form-check-label"><input type="checkbox" required="required" name="termsandcondition"> I accept the <a href="tnc.php">Terms of Use</a> &amp; <a href="tnc.php">Privacy Policy</a></label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg" name='btnSignup'>Sign Up</button>
                </div>
            </form>
            <div class="hint-text ml-n5">Already have an account? <a href="/" style="color: rgb(49, 145, 255);">Login here</a></div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function tampilPassword() {
            var temp = document.getElementById("showPass");
            var temp2 = document.getElementById("showPass2");
            if (temp.type === "password") {
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }

            if (temp2.type === "password") {
                temp2.type = "text";
            }
            else {
                temp2.type = "password";
            }
        }

        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            window.setTimeout(function () {
                swal({
                    title: 'Username sudah terdaftar!',
                    icon: 'error',
                    showCloseButton: true
                });
            },200);
        }

    </script>
@endsection
