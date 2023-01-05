<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
</head>
<body>
    Customer Name : {{ $nameuser }}
    <br><br>
    Customer Email : {{ $emailuser }}
    <br><br>
    Subject : {{ $subjectuser }}
    <br><br>
    Message:
    <br>
    {{ $messageuser }}

</body>
</html>
