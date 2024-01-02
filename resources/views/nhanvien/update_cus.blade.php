@extends('masterview.employee')
@section('empmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">THÔNG TIN <br>NGƯỜI HIẾN MÁU</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>

        <a href="{{ route('emp.cus_info') }}"><button class="turn-back-button">QUAY LẠI<I></I></button></a>

        <br><br><br>
        <form action="{{ route('emp.update_cus_check', $customer->id) }}" method="POST"
            style="width: 85%; background-color: #F7E9E8; padding: 5%; ">
            @csrf @method('PUT')
            <div>
                <div class="update-donator-info">
                    <h1>CHỈNH SỬA THÔNG TIN NGƯỜI HIẾN MÁU</h1>
                    <div class="update-donator-info-form">
                        <div style="width: 45%;">
                            <label for="">Họ tên</label><br>
                            <input type="text" name="name" value="{{ $customer->name }}"><br><br>
                            <select name="MaMau">
                                @foreach ($blood as $bl)
                                    <option value="{{ $bl->MaMau }}"
                                        {{ $customer->MaMau == $bl->MaMau ? 'selected' : '' }}>
                                        {{ $bl->NhomMau }}</option>
                                @endforeach
                            </select> <br> <br>
                            <label for="">SĐT</label><br>
                            <input type="text" name="phone" value="{{ $customer->phone }}"><br><br>
                            <label for="">Ngày sinh</label><br>
                            <input type="date" name="birthday" value="{{ $customer->birthday }}"><br><br>
                        </div>
                        <div style="width: 45%;">
                            <label for="gender">Giới tính</label><br>
                            <input type="radio" class="gender" name="gender" value="1"
                                {{ $customer->gender == 1 ? 'checked' : '' }}>Nam
                            <input type="radio" class="gender" name="gender" value="0"
                                {{ $customer->gender == 0 ? 'checked' : '' }}>Nữ
                            <br><br>
                            <label for="">Nơi cư trú</label><br>
                            <input type="text" name="address" value="{{ $customer->address }}"><br><br>
                            <label for="">Nơi công tác</label><br>
                            <input type="text" name="workspace" value="{{ $customer->workspace }}"><br><br>
                            <label for="">Email</label><br>
                            <input type="email" name="email" value="{{ $customer->email }}"><br><br>
                        </div>
                    </div>
                    <button type="submit" value="UPDATE" name="submit" class="submit"> UPDATE
                </div>
            </div>
        </form>

        <br><br><br>
    </div>

@stop()
