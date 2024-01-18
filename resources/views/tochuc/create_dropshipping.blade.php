@extends('masterview.organizer')
@section('orgmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">CUNG ỨNG MÁU</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>

        <a href="{{ route('org.dropshipping') }}"><button class="turn-back-button">QUAY LẠI<I></I></button></a>

        <br><br><br>
        <form action="{{ route('org.store_dropshipping') }}" method="POST"
            style="width: 85%; background-color: #F7E9E8; padding: 5%; ">
            @csrf
            <div>
                <div class="update-donator-info">
                    <h1>PHIẾU CUNG ỨNG</h1>
                    <div class="update-donator-info-form">
                        <div style="width: 35%;">
                            <label for="">Bệnh viện:</label><br> <br>
                            <select name="id_vien" style="max-width: 90%;">
                                @foreach ($vien as $vi)
                                    <option value="{{ $vi->id }}">{{ $vi->TenVien }}</option>
                                @endforeach
                            </select> <br> <br>
                            <input type="text" name="id_emp" value="03082004888" hidden>
                            <input type="date" name="NgayCungUng" value="{{ date('Y-m-d') }}" hidden>
                            <input type="text" name="TrangThai" value="1" hidden>
                        </div>
                        <div style="width: 60%;">
                            <table>
                                <tr>
                                    <th>Nhóm máu</th>
                                    <th>Nhập lượng cung ứng</th>
                                    <th>Lượng máu dự trữ</th>
                                </tr>
                                @for ($i = 0; $i < 8; $i++)
                                    <tr>
                                        <td><?php echo $blood[$i]->NhomMau; ?></td>
                                        <td>
                                            <input type="number" name="<?php echo 'LuongMau' . $blood[$i]->MaMau; ?>" value="0">
                                        </td>
                                        <td>
                                            <?php
                                            switch ($i) {
                                                case '0':
                                                    $Aminus == 0 ? print 0 : print $Aminus;
                                                    break;
                                            
                                                case '1':
                                                    $Bminus == 0 ? print 0 : print $Bminus;
                                                    break;
                                            
                                                case '2':
                                                    $Ominus == 0 ? print 0 : print $Ominus;
                                                    break;
                                            
                                                case '3':
                                                    $ABminus == 0 ? print 0 : print $ABminus;
                                                    break;
                                            
                                                case '4':
                                                    $Aplus == 0 ? print 0 : print $Aplus;
                                                    break;
                                            
                                                case '5':
                                                    $Bplus == 0 ? print 0 : print $Bplus;
                                                    break;
                                            
                                                case '6':
                                                    $Oplus == 0 ? print 0 : print $Oplus;
                                                    break;
                                            
                                                case '7':
                                                    $ABplus == 0 ? print 0 : print $ABplus;
                                                    break;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                @endfor
                            </table>
                        </div>
                    </div>
                    <input type="submit" value="TẠO MỚI" name="submit" class="submit">
                </div>
            </div>
        </form>
        <br><br><br>
    </div>
@stop()
