<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .button {
            background-color: #469FDF;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    {{-- <h1>TESTING CONTACT US NGAB</h1>
    <h3>Halo, {{ $user->full_name }} dengan email {{ $user->email }}</h3> --}}

    <h1>Home Cleaning</h1>
    <br>
    Dear {{ $user->full_name }}!
    <br><br>
    Thank you for choosing Home Cleaning!
    <br><br>
    Please confirm your email address to help us ensure your account is always protected.
    <br><br>

    {{-- iki button diganti pake input hidden pake form post jg, sg nanti manggil function buat update status skalian return view
    Your Account Has Been Verified --}}

    {{-- <form action="http://127.0.0.1:8000/verif" method="POST">
        @csrf
        <input type="hidden" value={{ $user->username }}>
        <button type="submit" class="button">Verify Your Email</button>
    </form> --}}


    <a href="http://127.0.0.1:8000/verif/{{ $user->username }}" class="button">Verify Your Email</a>
    <br><br>
    For further technical questions and support, please contact us at homecleaningfai@gmail.com
    <br>
    <br>
    We are looking forward to cooperating with you!
    <br>
    <br>
    Best Regards,<br>
    Home Cleaning team

    {{-- Customer Name : {{ $user->full_name }}
    <br><br>
    Customer Email : {{ $user->email }}
    <br><br>
    Message:
    <br> --}}

</body>
</html>
