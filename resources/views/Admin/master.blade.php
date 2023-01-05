<!DOCTYPE html>
<html lang="en">
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>@yield("title")</title>

            <!-- Favicons -->
            <link href="/assets/img/favicon.png" rel="icon">
            <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

            <!-- Vendor CSS Files -->
            <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
            <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
            <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
            <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
            <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
            <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

            <!-- Template Main CSS File -->
            <link href="/assets/css/style.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

            @section("css")
            @endsection
        </head>
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
<body>
@include("Admin.includes.header")
@section("content")
@show

</body>
</html>
