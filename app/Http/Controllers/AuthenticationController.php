<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Session;
class AuthenticationController extends Controller
{
    //

    public function index()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $dataUserLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $remember = $request->has('remember');
        // đầu là false neeuss tích là true
        if (Auth::attempt($dataUserLogin, $remember)) {
            //logout hết các tài khoản khác
            Session::where('user_id', Auth::id())->delete();
            // tạo phiên đăng nhập mới
            // nếu có phiên từ trang khác thì trang kia tự logout
            session()->put('user_id', Auth::id()); // sửa env thành session database vs config session driver
            // đăng nhập thành công
            // sẽ trả về token
            if (Auth::user()->role == '1') {
                // trả lại thông tin user dn thành công
                return redirect()->route('dashboard.index')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            } else {
                // đăng nhập vào user
                echo "đăng nhập user";
            }

        } else {
            // thất bại

            return redirect()->back()->with([
                'message' => 'Email or Password invalid'
            ]);
        }
    }


    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        // dd($request->all());
        $check = User::where('email', $request->email)->exists();
        // ktra có email trùng thì tìm thấy nó trả về true 
        if ($check) {
            dd("Email đã tồn tại!");
            return redirect()->back()->with('message', 'Tài khoản email đã tồn tại');
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $newUser = User::create($data);
            Auth::login($newUser);
            // dd($newUser); // Kiểm tra xem user có được tạo hay không
            return redirect()->route('login')->with([
                'message' => 'Đăng ký thành công. Vui lòng đăng nhập'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'Đăng xuất thành công'
        ]);
    }
}