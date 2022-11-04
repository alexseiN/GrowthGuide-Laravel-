<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>

<div class="wrapper">
    @include('layouts.sidebar')
    <div class="main_content">
        <div class="header">Welcome!! Have a nice day.</div>
        @include ('responseform', ['orders' => $orders, 'status' => $status, 'user_id' => $user_id])
    </div>
</div>

</body>
</html>
