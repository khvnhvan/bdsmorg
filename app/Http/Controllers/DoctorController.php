<?php

namespace App\Http\Controllers;

use App\Models\Donkham;
use App\Models\Phieudangky;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function login(){
        return view('bacsi.login');
    }

    public function checklogin(){
        request()->validate([
            'id'=>'required|exists:users',
            'password'=>'required',
        ]);
        $data = request()->all('id', 'password');
        if(auth()->attempt($data)){
            return redirect()->route('doc.dashboard');
        }
        return redirect()->back()->with('error', 'Lỗi đăng nhập!');
    }

    public function dashboard()
    {
        $totalblood = DB::table('vwtongmau')->value('Tongmau');
        $Aminus = DB::table('vwtongmauaminus')->value('TongmauAminus');
        $Bminus = DB::table('vwtongmaubminus')->value('TongmauBminus');
        $Ominus = DB::table('vwtongmauominus')->value('TongmauOminus');
        $ABminus = DB::table('vwtongmauabminus')->value('TongmauABminus');
        $Aplus = DB::table('vwtongmauaplus')->value('TongmauAplus');
        $Bplus = DB::table('vwtongmaubplus')->value('TongmauBplus');
        $Oplus = DB::table('vwtongmauoplus')->value('TongmauOplus');
        $ABplus = DB::table('vwtongmauabplus')->value('TongmauABplus');
        $totalppl = DB::table('vwtonguser')->value('TongUser');
        return view('bacsi.dashboard', compact('totalblood', 'Aminus', 'Bminus','Ominus','ABminus',
                                                'Aplus','Bplus','Oplus','ABplus','totalppl'));
    }

    public function emp_info(){
        $id = Auth::user()->id;
        $nhanvien = DB::table('users')
        ->select('users.*', 'roles.roles')
        ->join('roles', 'roles.id', '=', 'users.role')
        ->where('users.id',$id)->get();
        return view('bacsi.emp_info', compact('nhanvien'));
    }

    public function update_emp(string $id){
        $employee = DB::table('users')->find($id);
        return view('bacsi.update_emp', compact('employee'));
    }

    public function update_emp_check(string $id, Request $request){
        $employee = User::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('doc.emp_info')->with('update','Cập nhật nhân viên thành công!');
    }

    public function cusInfo(Request $request) {
        $orderBy = $request->input('order_by','name');
        $client = $this->getSortedInfo($orderBy);
        if($key = request()->key){
            $client = DB::table('users')
            ->select('users.*', 'nhommau.NhomMau')
            -> join('nhommau', 'nhommau.MaMau', '=', 'users.MaMau')
            -> where('name','like','%'.$key.'%')
            -> paginate(10);
        }
        if($live = request()->live){
            $client = DB::table('users')
            ->select('users.*', 'nhommau.NhomMau')
            -> join('nhommau', 'nhommau.MaMau', '=', 'users.MaMau')
            -> where('address',$live)
            -> paginate(10);
        }
        if($work = request()->work){
            $client = DB::table('users')
            ->select('users.*', 'nhommau.NhomMau')
            -> join('nhommau', 'nhommau.MaMau', '=', 'users.MaMau')
            -> where('workplace',$work)
            -> paginate(10);
        }
        return view('bacsi.cus_info', compact('client','orderBy'));
    }

    private function getSortedInfo($orderBy){
        switch($orderBy){
        case 'name':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->orderBy('name', 'desc')->paginate(10);
            break;
        case 'A_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'A+')->paginate(10);
            break;
        case 'B_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'B+')->paginate(10);
            break;
        case 'O_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'O+')->paginate(10);
            break;
        case 'AB_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'AB+')->paginate(10);
            break;
        case 'A_minus_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'A-')->paginate(10);
            break;
        case 'B_minus_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'B-')->paginate(10);
            break;
        case 'O_minus_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'O-')->paginate(10);
            break;
        case 'AB_minus_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'AB-')->paginate(10);
            break;
        case 'birthday':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->orderBy('birthday', 'desc')->paginate(10);
            break;
        case 'donated':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('TrangThaiHien', '=', '1')->paginate(10);
            break;
        case 'notyet':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('TrangThaiHien', '=', NULL)->paginate(10);
            break;
        }
        return $client;
    }

    public function info_inday(Request $request, $ngayHienTai = null) {
        $orderBy = $request->input('order_by','name');
        // Kiểm tra xem $ngayHienTai có giá trị không, nếu không thì lấy ngày hiện tại
        $ngayHienTai = $ngayHienTai ?? now()->toDateString();

        //Lấy dữ liệu hiến máu trong ngày
        $client = $this->getSortedClients($orderBy, $ngayHienTai);
        
        // Kiểm tra nếu có từ khóa tìm kiếm, lọc dữ liệu
        if($key = request()->key){
            $client = DB::table('vwindaynew')->select('vwindaynew.*')
            -> where('name','LIKE', '%'.$key.'%')->get();
        }     
        if($day = request()->day){
            $client = DB::table('vwindaynew')->select('vwindaynew.*')
            -> where('NgayHien', $day)->get();
        }                                            
        
        $don = DB::table('donkham')->select('donkham.*')
        ->join('phieudangky', 'phieudangky.id', '=', 'donkham.id_phieudangky')
        ->join('lichhienmau', 'lichhienmau.id', '=', 'phieudangky.id_lich')
        ->where('lichhienmau.NgayHien', $ngayHienTai)
        ->count();
        return view('bacsi.info_inday', compact('client','orderBy', 'ngayHienTai', 'key', 'don', 'day'));
    }

    public function update_cus(string $id){
        $blood = DB::table('nhommau')->get();
        $customer = DB::table('users')->find($id);
        return view('bacsi.update_cus', compact('blood','customer'));
    }

    public function update_cus_check(Request $request, string $id){
        $customer = User::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('doc.cus_info')->with('update','Cập nhật người hiến thành công!');
    }

    // public function check_clinic_homtruoc(Request $request, $ngayHienTai = null) {
    //     $ngayHienTai = date('20y-m-d');
    //     $ngayHomTruoc = Carbon::parse($ngayHienTai)->subDay()->toDateString();

    //     $id = request()->user_id;
    //     $count = DB::table('donkham')
    //     ->select('donkham.NhietDo')
    //     ->join('phieudangky', 'phieudangky.id',  '=', 'donkham.id_phieudangky')
    //     ->join('lichhienmau', 'phieudangky.id_lich', '=', 'lichhienmau.id')
    //     ->where('NgayHien', '=',$ngayHomTruoc, 'and', 'user_id', $id)
    //     ->orderByDesc('donkham.id')
    //     ->limit(1)
    //     ->count(); 
        
    //     $phieudangky = DB::table('donkham')
    //     ->select('phieudangky.id')
    //     ->join('phieudangky', 'phieudangky.id',  '=', 'donkham.id_phieudangky')
    //     ->join('lichhienmau', 'phieudangky.id_lich', '=', 'lichhienmau.id')
    //     ->where('NgayHien', '=', $ngayHomTruoc, 'and', 'user_id', $id)
    //     ->orderByDesc('donkham.id')
    //     ->limit(1)
    //     ->get();

    //     // dd);
    //     if($count < 1) {
    //         return redirect()->route('doc.clinic', $phieudangky[0]->id);
    //     } else {
    //         return redirect()->route('doc.cus_info');
    //     }

    // }

    public function ngayHomTruoc(Request $request, $ngayHienTai = null)
    {
        $orderBy = $request->input('order_by','name');
        // Kiểm tra xem $ngayHienTai có giá trị không, nếu không thì lấy ngày hiện tại
        $ngayHienTai = $ngayHienTai ?? now()->toDateString();
        if($key = request()->key){
            $lichSuHomTruoc = DB::table('vwindaynew')->select('vwindaynew.*')
            -> where('name','LIKE', '%'.$key.'%')->get();
        }
        if($day = request()->day){
            $client = DB::table('vwindaynew')->select('vwindaynew.*')
            -> where('NgayHien', $day)->get();
        }   

        // Lấy lịch sử hiến máu ngày hôm trước
        $ngayHomTruoc = Carbon::parse($ngayHienTai)->subDay()->toDateString();
        $lichSuHomTruoc = $this->getSortedClients($orderBy, $ngayHomTruoc);
        // $don = DB::table('donkham')->select('donkham.*')
        // ->join('phieudangky', 'phieudangky.id', '=', 'donkham.id_phieudangky')
        // ->join('lichhienmau', 'lichhienmau.id', '=', 'phieudangky.id_lich')
        // ->where('lichhienmau.NgayHien', $ngayHomTruoc)
        // ->count();
    
        return view('bacsi.homtruoc', compact('orderBy', 'lichSuHomTruoc', 'key', 'ngayHomTruoc', 'ngayHienTai', 'day'));
    }
    
    public function check_clinic_homtruoc($user_id) {
        $ngayHomTruoc = date('Y/m/d',strtotime("-1 days"));
        $id = request()->user_id;
        $count = DB::table('donkham')
        ->select('donkham.NhietDo')
        ->join('phieudangky', 'phieudangky.id',  '=', 'donkham.id_phieudangky')
        ->join('lichhienmau', 'phieudangky.id_lich', '=', 'lichhienmau.id')
        ->where([
            ['NgayHien', '=',$ngayHomTruoc],
            ['donkham.user_id', $user_id],
        ])
        ->orderByDesc('donkham.id')
        ->limit(1)
        ->count();

        // $phieudangky = DB::table('donkham')
        // ->select('phieudangky.user_id')
        // ->join('phieudangky', 'phieudangky.id',  '=', 'donkham.id_phieudangky')
        // ->join('lichhienmau', 'phieudangky.id_lich', '=', 'lichhienmau.id')
        // ->where([
        //     ['NgayHien', '=',$ngayHomTruoc],
        //     ['donkham.user_id', $user_id],
        // ])
        // ->orderByDesc('donkham.id')
        // ->limit(1)
        // ->get();

        // dd($phieudangky);

        if($count > 0) {
            return redirect()->route('doc.clinic', $user_id);
        } else {
            return redirect()->route('doc.create_clinic', $user_id);
        }
    } 

    public function ngayHomSau(Request $request, $ngayHienTai = null)
    {
        $orderBy = $request->input('order_by','name');
        // Kiểm tra xem $ngayHienTai có giá trị không, nếu không thì lấy ngày hiện tại
        $ngayHienTai = $ngayHienTai ?? now()->toDateString();
        // Kiểm tra nếu có từ khóa tìm kiếm, lọc dữ liệu
        if($key = request()->key){
            $lichSuHomSau = DB::table('vwindaynew')->select('vwindaynew.*')
            -> where('name','LIKE', '%'.$key.'%')->get();
        }
        if($day = request()->day){
            $client = DB::table('vwindaynew')->select('vwindaynew.*')
            -> where('NgayHien', $day)->get();
        }   
        // Lấy lịch sử hiến máu ngày hôm sau
        $ngayHomSau = Carbon::parse($ngayHienTai)->addDay()->toDateString();
        $lichSuHomSau = $this->getSortedClients($orderBy, $ngayHomSau);
        $don = DB::table('donkham')->select('donkham.*')
        ->join('phieudangky', 'phieudangky.id', '=', 'donkham.id_phieudangky')
        ->join('lichhienmau', 'lichhienmau.id', '=', 'phieudangky.id_lich')
        ->where('lichhienmau.NgayHien', $ngayHomSau)
        ->count();

        return view('bacsi.homsau', compact('orderBy', 'lichSuHomSau', 'key', 'ngayHomSau', 'ngayHienTai', 'don', 'day'));
    }

    // public function check_clinic_homnay($user_id) {
    //     $ngayHienTai = date('20y-m-d');

    //     $id = request()->user_id;
    //     $count = DB::table('donkham')
    //     ->select('donkham.NhietDo')
    //     ->join('phieudangky', 'phieudangky.id',  '=', 'donkham.id_phieudangky')
    //     ->join('lichhienmau', 'phieudangky.id_lich', '=', 'lichhienmau.id')
    //     ->where('NgayHien', '=',$ngayHienTai, 'and', 'user_id', $id)
    //     ->orderByDesc('donkham.id')
    //     ->limit(1)
    //     ->count(); 
        
    //     $phieudangky = DB::table('donkham')
    //     ->select('phieudangky.id')
    //     ->join('phieudangky', 'phieudangky.id',  '=', 'donkham.id_phieudangky')
    //     ->join('lichhienmau', 'phieudangky.id_lich', '=', 'lichhienmau.id')
    //     ->where('NgayHien', '=', $ngayHienTai, 'and', 'user_id', $id)
    //     ->orderByDesc('donkham.id')
    //     ->limit(1)
    //     ->get();

    //     // dd);
    //     if($count < 1) {
    //         return redirect()->route('doc.clinic', $phieudangky[0]->id);
    //     } else {
    //         return redirect()->route('doc.cus_info');
    //     }

    // }

    private function getSortedClients($orderBy, $ngayHienTai){
        switch($orderBy){
            case 'name': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->orderBy('name', 'desc')->get();
                break;
            case 'A_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'A+')->get();
                break;
            case 'B_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'B+')->get();
                break;
            case 'O_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'O+')->get();
                break;
            case 'AB_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'AB+')->get();
                break;
            case 'A_minus_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'A-')->get();
                break;
            case 'B_minus_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'B-')->get();
                break;
            case 'O_minus_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'O-')->get();
                break;
            case 'AB_minus_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'AB-')->get();
                break;
            case 'donated': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('TrangThaiHien', '=', '1')->get();
                break;
            case 'notyet': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('TrangThaiHien', '=', '0')->get();
                break;
            }
        return $client;
    }

    public function update_infoinday($id){
        $phieu = DB::table('phieudangky')->find($id);
        // $don = DB::table('donkham')->select('donkham.TrangThai', 'phieudangky.*')
        // ->join('phieudangky', 'phieudangky.user_id', '=', 'donkham.user_id')
        // ->where('phieudangky.id', $id)
        // ->get();check_clinic_homnay
        return view('bacsi.update_infoinday', compact('phieu'));
    }

    public function update_infoinday_check(Request $request, $id){
        $phieudk = DB::table('phieudangky')
        ->where('phieudangky.id', $id)
        ->update($request->only('id', 'TrangThaiHien', 'Ykienbacsi'));
        $register = DB::table('phieudangky')
        ->select('phieudangky.Ykienbacsi', 'phieudangky.user_id')
        ->where('phieudangky.id', $id)
        ->get();
        
        $count = DB::table('donkham')
        ->select('donkham.id')
        ->join('phieudangky', 'donkham.id_phieudangky', '=', 'phieudangky.id')
        ->where('phieudangky.id', $id)
        ->orderByDesc('donkham.id')
        ->limit(1)
        ->count();

        if($count == 1) {
            $x = DB::table('donkham')
            ->join('phieudangky', 'phieudangky.id', '=', 'donkham.id_phieudangky')
            ->where([
                ['phieudangky.id', $id],
                ['phieudangky.user_id', $register[0]->user_id]
            ])
            ->update(['donkham.TrangThai' => $register[0]->Ykienbacsi]);
    
                // dd($x);
    
            return redirect()->route('doc.info_inday')->with('update','Cập nhật phiếu hiến thành công!');
        } else {
            return redirect()->route('doc.clinic',$register[0]->user_id);
        }
       
    }
    
    public function cus_detail(Request $request, $id){
        $stt = 1;
        $detail = DB::table('vwhistorydonateblood')->select('vwhistorydonateblood.*')->where('id', $id)->first();
        return view('bacsi.cus_detail', compact('detail','stt'));
    }

    public function appt_schedule(){
        $appointment = DB::table('lichhienmau')
        ->select('lichhienmau.*')
        ->get();
        return view('bacsi.appt_schedule', compact('appointment'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('doc.login');
    }

    public function clinic($user_id){
        $donkham = DB::table('donkham')->select('donkham.*', 'users.name')
        ->join('users', 'users.id', '=', 'donkham.user_id')
        ->where('donkham.user_id', $user_id)->get();
        // dd($cl);
        $phieutl = DB::table('phieutraloi')->select('phieutraloi.*')->get();
        return view('bacsi.clinic', compact('donkham', 'phieutl'));
    }
    
    public function create_clinic($user_id){
        $phieudk = DB::table('phieudangky')->select('phieudangky.*', 'users.name')
        ->join('users', 'users.id', '=', 'phieudangky.user_id')
        ->where('phieudangky.user_id', $user_id)->get();
        $phieutl = DB::table('phieutraloi')->select('phieutraloi.*')->get();
        return view('bacsi.create_clinic', compact('phieudk', 'phieutl'));
    }
    public function store_clinic(Request $request){
        $request->validate([
            'user_id' => 'required',
            'MaCauTL' => 'required',
            'CanNang' => 'required',
            'NhietDo' => 'required',
            'HuyetAp1' => 'required',
            'Mach1' => 'required',
            'HuyetAp2' => 'required',
            'Mach2' => 'required',
            'Hemoglobine' => 'required',
            'ViemGanB' => 'required',
            'TrangThai' => 'required',
            'id_phieudangky' => 'required',
            'updated_at' => 'nullable',
            'created_at' => 'nullable'
        ]);
    
        Donkham::create($request->all());
        return redirect()->route('doc.info_inday');
    }
    
}
