<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redirecting</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="homecleaning.css">
</head>
<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session()->has('success'))
        <script>
            var msg = '{{Session::get('success')}}';
            var exist = '{{Session::has('success')}}';
            if(exist){
                window.setTimeout(function () {
                    swal({
                        title: 'Berhasil melakukan order!',
                        icon: 'success',
                        showCloseButton: true
                    });
                },300);
                setTimeout(function() {
                    window.location.href = "/user/home"
                }, 2000); // 2 second
            }

        </script>
    @endif
</body>
</html>
