@extends("Admin.master");
@section("title","Home Admin")
@section("css")
    <link rel="stylesheet" href="/homecleaning.css">
    <!-- FONT GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">
@section("content")
    {{-- <div class="">
        <img src="/assets/img/admin-home.jpg" style="width: 99vw;height:fit-content;opacity:0.8;">
    </div> --}}
    <div class='home-admin container-fluid h-100'>
        <div class='row h-100 align-items-center'>
            <div class='col-12 text-center'>
                <p class='lead-2 fw-bold text-white text-uppercase mt-3'>Welcome To</p>
                <h1 class='display-2 fw-light text-white'>Admin Page</h1>
                <p class='lead text-white mt-4'>Start Discovering The Page</p>
            </div>
        </div>
    </div>
@endsection
