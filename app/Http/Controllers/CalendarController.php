<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function create_appt()
    {
        return view('tochuc.create_appt');
    }

    public function create_appt_check(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date' . now()->addDays(6)->format('Y-m-d'),
        ]);

        $startDate = \Carbon\Carbon::parse($request->input('start_date'));
        $endDate = \Carbon\Carbon::parse($request->input('end_date'));

        if ($endDate->diffInDays($startDate) > 6) {
            return redirect()->route('org.create_appt')->with('error', 'Không thể tạo lịch quá 1 tuần.');
        }

        $currentDate = $startDate;
        while ($currentDate <= $endDate) {
            // Kiểm tra xem ngày đó đã tồn tại trong lịch cũ hay chưa
            $isDateExists = Calendar::where('NgayHien', $currentDate)->exists();
    
            // Nếu ngày không tồn tại trong lịch cũ, tạo lịch mới
            if (!$isDateExists) {
                Calendar::create(['NgayHien' => $currentDate]);
            }
    
            $currentDate->addDay();
        }

        return redirect()->route('org.apt_schedule')->with('success', 'Lịch đã được tạo thành công!');
    }

    public function update_appt($id){
        $lich = DB::table('lichhienmau')->find($id);
        return view('tochuc.update_appt', compact('lich'));
    }

    public function update_appt_check(Request $request, $id){
        $calendar = Calendar::findOrFail($id);
        $calendar->update($request->all());
        return redirect()->route('org.apt_schedule')->with('update','Cập nhật lịch hiến thành công!');
    }

    public function delete_appt($id){
        DB::table('lichhienmau')->where('id',$id)->delete();
        return redirect()->route('org.apt_schedule');
    }
}

