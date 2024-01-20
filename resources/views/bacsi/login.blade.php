<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('public/organizersite') }}/style.css">

    <link rel="icon" href="{{ url('public/organizersite') }}/img/bdsm_logo.ico">
    <title>Login</title>
</head>

<body>
    <div class="login-outside-container">
        <div class="login-inside-container">
            <div class="login-inside-container-content">
                <div style="width: 80%;">
                    <h1 style="line-height: 120%;">ĐĂNG NHẬP VÀO <br>TRANG QUẢN LÝ CỦA BÁC SĨ   </h1>
                    <form action="" method="POST" role="form">
                        @csrf
                        <label for="">Mã số nhân viên:</label><br>
                        <input type="text" class="id_num" name="id"><br><br>
                        <label for="password">Mật khẩu</label><br>
                        <input type="password" class="password" name="password"><br><br>
                        <button type="submit" class="login-button">ĐĂNG NHẬP</button>
                    </form>
                    <br>
                    @if (Session::has('error'))
                        <p style="color: red">{{ Session::get('error') }}</p>
                    @endif
                </div>
                <div style="width: 0%;"></div>
            </div>
        </div>
    </div>
</body>

</html>
