@extends('masterview.employee')
@section('empmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">THÔNG TIN <br>NGƯỜI HIẾN MÁU</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>
        <form action="" style="font-size: x-large;" method="GET">
            <label for="">Tìm kiếm theo tên: </label>
            <input name="key" style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
            <input type="submit" style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
        </form> <br>
        <form action="" style="font-size: x-large;">
            <label for="">Tìm kiếm theo nơi cư trú: </label>
            <input name="live" placeholder="cho sang bên phải"
                style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
            <input type="submit" style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
        </form><br>
        <form action="" style="font-size: x-large;">
            <label for="">Tìm kiếm theo nơi công tác: </label>
            <input name="work" placeholder="cho sang bên phải"
                style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
            <input type="submit" style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
        </form>
        <br><br>
        <a href="{{ route('emp.create_cus') }}"><button class="turn-back-button">THÊM MỚI<I></I></button></a>
        <br><br>
        <form action="{{ route('emp.cus_info') }}" method="GET">
            <label for="order_by">Sắp xếp theo:</label>
            <select name="order_by" id="order_by" onchange="this.form.submit()"
                style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
                <option value="name" {{ $orderBy == 'name' ? 'selected' : '' }}>Tên</option>
                <option value="birthday" {{ $orderBy == 'birthday' ? 'selected' : '' }}>Tuổi</option>
                <option value="A_type" {{ $orderBy == 'A_type' ? 'selected' : '' }}>Nhóm máu A+</option>
                <option value="B_type" {{ $orderBy == 'B_type' ? 'selected' : '' }}>Nhóm máu B+</option>
                <option value="O_type" {{ $orderBy == 'O_type' ? 'selected' : '' }}>Nhóm máu O+</option>
                <option value="AB_type" {{ $orderBy == 'AB_type' ? 'selected' : '' }}>Nhóm máu AB+</option>
                <option value="A_minus_type" {{ $orderBy == 'A_minus_type' ? 'selected' : '' }}>Nhóm máu A-</option>
                <option value="B_minus_type" {{ $orderBy == 'B_minus_type' ? 'selected' : '' }}>Nhóm máu B-</option>
                <option value="O_minus_type" {{ $orderBy == 'O_minus_type' ? 'selected' : '' }}>Nhóm máu O-</option>
                <option value="AB_minus_type" {{ $orderBy == 'AB_minus_type' ? 'selected' : '' }}>Nhóm máu AB-</option>
                <option value="donated" {{ $orderBy == 'donated' ? 'selected' : '' }}>Đã hiến</option>
                <option value="notyet" {{ $orderBy == 'notyet' ? 'selected' : '' }}>Chưa đăng ký hiến</option>
            </select>
        </form>
        @if (Session::has('success'))
            <p style="color: red">{{ Session::get('success') }}</p>
        @endif
        @if (Session::has('update'))
            <p style="color: red">{{ Session::get('update') }}</p>
        @endif
        <br><br>
        <table border="2" style="background-color: #F7E9E8;">
            <tr>
                <th>CCCD - CMT</th>
                <th>Tên</th>
                <th>Nhóm máu</th>
                <th>Số lần đã hiến</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>SĐT</th>
                <th>Nơi cư trú</th>
                <th>Nơi công tác</th>
                <th>Hành động</th>
            </tr>
            @foreach ($client as $cus)
                <tr>
                    <td>{{ $cus->id }}</td>
                    <td>{{ $cus->name }}</td>
                    <td>{{ $cus->NhomMau }}</td>
                    <td>1</td>
                    <td>{{ $cus->birthday }}</td>
                    <td>{{ $cus->gender == 1 ? 'Nam' : 'Nữ' }}
                    <td>{{ $cus->phone }}</td>
                    <td>{{ $cus->address }}</td>
                    <td>{{ $cus->workspace }}</td>
                    <td style=" display: flexbox; justify-content: space-around ;">
                        <a href="{{ route('emp.cus_detail', $cus->id) }}"><button class="view-btn">Chi tiết</button></a>
                        <a href="{{ route('emp.update_cus', $cus->id) }}"><button class="update-btn">Sửa</button></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $client->links() }}
    </div>

@stop()
