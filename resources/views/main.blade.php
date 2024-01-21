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

<style>
    html,
    body {
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
</style>

<body>
    <div class="landing">
        <div class="landing-left">
            <div>
                <p>TRANG THÔNG TIN TỔ CHỨC</p>
                <h1>VUI LÒNG CHỌN VỊ TRÍ</h1>
            </div>
        </div>
        <div class="landing-right">
            <a href="{{ route('org.login') }}" class="l1">
                <div></div>
                <p>Quản trị viên</p>
            </a>
            <a href="{{ route('emp.login') }}" class="l2">
                <div></div>
                <p>Nhân viên</p>
            </a>

            <a href="{{ route('doc.login') }}" class="l3">
                <div></div>
                <p>Bác sĩ</p>
            </a>
            <a href="{{ route('ship.login') }}" class="l4">
                <div></div>
                <p>Quản lý cung ứng máu</p>
            </a>
            {{-- </div> --}}
        </div>
    </div>
</body>

</html>
