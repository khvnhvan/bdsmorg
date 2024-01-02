@extends('masterview.employee')
@section('empmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">THÔNG TIN <br>NHÂN VIÊN</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>

        <a href="{{ route('emp.emp_info') }}"><button class="turn-back-button">QUAY LẠI<I></I></button></a>

        <br><br><br>
        <form action="{{ route('emp.update_emp_check', $employee->id) }}" method="POST"
            style="width: 85%; background-color: #F7E9E8; padding: 5%; ">
            @csrf @method('PUT')
            <div>
                <div class="update-donator-info">
                    <h1>CHỈNH SỬA THÔNG TIN NHÂN VIÊN</h1>
                    <div class="update-donator-info-form">
                        <div style="width: 45%;">
                            <label for="">Họ tên</label><br>
                            <input type="text" name="name" value="{{ $employee->name }}"><br><br>
                            <label for="">SĐT</label><br>
                            <input type="text" name="phone" value="{{ $employee->phone }}"><br><br>

                        </div>
                        <div style="width: 45%;">
                            <label for="">Địa chỉ</label><br>
                            <input type="text" name="address" value="{{ $employee->address }}"><br><br>
                            <label for="">Ngày sinh</label><br>
                            <input type="date" name="birthday" value="{{ $employee->birthday }}"><br><br>
                        </div>
                    </div>
                    <button type="submit" value="UPDATE" name="submit" class="submit">UPDATE
                </div>
            </div>
        </form>

        <br><br><br>
    </div>

@stop()
