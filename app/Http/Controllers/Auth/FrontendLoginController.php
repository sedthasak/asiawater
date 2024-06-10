<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.login'); // แสดงหน้า login ของร้านค้า
    }

    public function login(Request $request)
    {
        // ตรวจสอบการล็อกอินของผู้ใช้ และดึงข้อมูลร้านค้าที่เกี่ยวข้อง
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $store = Store::where('user_id', $user->id)->first(); // ดึงข้อมูลร้านค้าที่เกี่ยวข้องกับผู้ใช้
            
            // ทำต่อไปตามที่คุณต้องการ เช่น ส่งข้อมูลร้านค้าไปยังหน้าต่อไป
        } else {
            // กรณีล็อกอินไม่สำเร็จ ส่งผู้ใช้กลับไปยังหน้า login พร้อมแสดงข้อความแจ้งเตือน
            return redirect()->route('frontend.login')->with('error', 'Invalid email or password');
        }
    }
}
