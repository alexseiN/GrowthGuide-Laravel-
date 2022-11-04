<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSC</title>
    <link rel="stylesheet" href="css/formdashboard.css">
    <link rel="stylesheet" href="css/header1.css">
    <script src="https://kit.fontawesome.com/283605f283.js" crossorigin="anonymous"></script>
</head>

<body>
 @include('assets.header1');
 <br>
 <br>

@if(!isset($status) || $status === 0)
    <p>Please submit your order!</p>

@else
    @include ('responseform', ['orders' => $orders, 'status' => $status, 'user_id' => Auth::user()->id])
@endif

</body>

</html>
