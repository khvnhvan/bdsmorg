<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('public/organizersite') }}/style.css">

    <link rel="icon" href="{{ url('public/organizersite') }}/img/bdsm_logo.ico">
    <title>Register</title>
</head>

<body>
    <div class="login-outside-container">
        <div class="login-inside-container">
            <div class="login-inside-container-content">
                <div style="width: 80%;">
                    <h1 style="line-height: 120%;">ĐĂNG KÝ VÀO <br>TRANG QUẢN LÝ CỦA TỔ CHỨC</h1>
                    <form action="{{ route('checkregister') }}" method="POST" role="form">
                        @csrf
                        <label for="">Mã số tổ chức</label><br>
                        <input type="text" class="id_num" name="id"><br><br>
                        <label for="">Tên tổ chức</label><br>
                        <input type="text" class="id_num" name="name"><br><br>
                        <label for="">Email:</label><br>
                        <input type="text" class="id_num" name="email"><br><br>
                        <label for="password">Mật khẩu</label><br>
                        <input type="password" class="password" name="password"><br><br>
                        <label for="password">Nhập lại mật khẩu</label><br>
                        <input type="password" class="password" name="confirm_password"><br><br>
                        <input type="text" class="password" name="role" hidden value="3">
                        <button type="submit" class="login-button">ĐĂNG KÝ</button>
                    </form>
                    <br>
                    <a href="{{ route('org.login') }}">Đã có tài khoản?</a>
                    <br>
                </div>
                <div style="width: 0%;"></div>
            </div>
        </div>
    </div>
</body>

</html>
