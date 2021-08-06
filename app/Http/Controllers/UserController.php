<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbl_users;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 회원가입
    public function register(Request $request)
    {
        //validate
        $request->validate([
            'user_id'=>'required',
            'user_pass'=>'required|min:4|max:16',
            'user_pass_chk'=>'required|min:4|max:16',
            'email'=>'required|email',
        ]);

        $now = now();

        //insert data
        $user = new Tbl_users;
        $user->id = $request->user_id;
        $user->password = Hash::make($request->user_pass);        
        $user->email = $request->email;        
        $user->join_dt = $now;
        $register = $user->save();

        if($register){
            return back()->with('success', 'insert success');
        }else{
            return back()->with('fail', 'insert failed');
        }
    }

    // 로그인
    public function login(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'user_pass'=>'required',            
        ]);

        $userInfo = Tbl_users::where('id','=',$request->user_id)->first();

        if(!$userInfo){
            return back()->with('fail', '회원 정보가 존재하지 않습니다.');
        }else{
            if(Hash::check($request->user_pass, $userInfo->password)){
                $request->session()->put('user_id', $userInfo->id);
                $request->session()->put('email', $userInfo->email);

                return redirect('/');
            }else{
                return back()->with('fail', '비밀번호가 일치하지 않습니다.');
            }
        }
    }

    // 로그아웃
    public function logout()
    {
        if(session()->has('email')){
            session()->pull('user_id');
            session()->pull('email');
            
            return redirect('/');
        }
    }
}
