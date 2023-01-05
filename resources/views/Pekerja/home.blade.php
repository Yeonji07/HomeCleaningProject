@extends("Pekerja.master");
@section("title","Home Pekerja")
@section("css")
    <link rel="stylesheet" href="/homecleaning.css">
    <!-- FONT GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">
@section("content")
    <div class='home-pekerja container-fluid h-100'>
        <div class='row h-100 align-items-center'>
            <div class='col-12 text-center'>
                <p class='lead-2 fw-bold text-white text-uppercase mt-3'>Welcome To</p>
                <h1 class='display-2 fw-light text-white'>Worker Page</h1>
                <p class='lead text-white mt-4'>Start Discovering The Page</p>
            </div>
        </div>
    </div>


    {{-- Buat drop down  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
