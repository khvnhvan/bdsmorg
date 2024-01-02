<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>THÔNG TIN TỔ CHỨC</title>
    <link rel="icon" href="{{ url('public/organizersite') }}/img/bdsm_logo.ico">
    <link rel="stylesheet" href="{{ asset('public/organizersite/style.css') }}">

</head>

<body>
    <ul class="vertical-navbar">
        <li><img src="{{ url('public/organizersite') }}/img/bdsm_logo.png" alt="" class="bdsm_logo"></li>
        <li><a href="{{ route('emp.dashboard') }}">DASHBOARD</a></li>
        <li><a href="{{ route('emp.emp_info') }}">THÔNG TIN NHÂN VIÊN</a></li>
        <li><a href="{{ route('emp.cus_info') }}">THÔNG TIN NGƯỜI HIẾN MÁU</a></li>
        <li><a href="{{ route('emp.info_inday') }}">THÔNG TIN NGƯỜI HIẾN MÁU TRONG NGÀY</a></li>
        <li><a href="{{ route('emp.appt_schedule') }}">THÔNG TIN LỊCH HIẾN</a></li>
        <li><a href="{{ route('emp.logout') }}">ĐĂNG XUẤT</a></li>
    </ul>

    <div class="dashboard">
        @yield('empmain')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
