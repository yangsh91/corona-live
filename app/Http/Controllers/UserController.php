<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbl_users;
use App\Mail\SendMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

        $userInfo = DB::table('tbl_users')
            ->where('id','=',$request->user_id)
            ->get();        

        if(!$userInfo){
            return back()->with('fail', '회원 정보가 존재하지 않습니다.');
        }else{

            if(Hash::check($request->user_pass, $userInfo[0]->password)){
                $request->session()->put('user_id', $userInfo[0]->id);
                $request->session()->put('email', $userInfo[0]->email);

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

    // 회원정보 수정
    public function saveUserInfo(Request $request)
    {

        $result = array();

        try{
            
            $userInfo = DB::table('tbl_users')
                ->where('id','=',$request->info_user_id)
                ->get();

            if($userInfo[0]->email != $request->info_user_mail){
                $chkEmail =  DB::table('tbl_users')
                ->where('email', '=', $request->info_user_mail)
                ->count();
    
                if($chkEmail > 0){
                    throw new exception("이미 사용중인 이메일 입니다.");
                }
            }
            
            if(!Hash::check($request->user_pass, $userInfo[0]->password)){
                $re = DB::table('tbl_users')
                ->where('id', '=', $request->info_user_id)
                ->update(['password' => Hash::make($request->info_user_pass)], ['email' => $request->info_user_mail]);

                if($re){
                    $result['success'] = true;
                    $result['msg'] = "정보가 수정되었습니다.";
                }else{
                    $result['success'] = false;
                    $reuslt['msg'] = "오류가 발생했습니다.";
                }
            }    

        } catch(exception $e) {
            $result['success'] = false;
            $reuslt['msg'] = $e->getMessage();
        }

        return response()->json($result);

    }


    //아이디 찾기 
    public function findUserId(Request $request)
    {

        $userInfo = DB::table('tbl_users')
            ->select('email')
            ->where('id', '=', $request->find_user_id)
            ->get();   
              

        $result = array();
        if($userInfo != ""){
            $result["success"] = true;
            $result["msg"] = "등록된 이메일은 " . $userInfo[0]->email . " 입니다.";
        }else{
            $result["success"] = false;
            $result["msg"] = "회원 정보를 찾을 수 없습니다.";
        }

        return response()->json($result);

    }

    // 비밀번호 찾기
    public function findUserPass(Request $request)
    {

        $userInfo = DB::table('tbl_users')
            ->select('id', 'email')
            ->where('email', '=', $request->find_user_mail)
            ->get();

        $tmpPass = Str::random(12);

        $result = array();
        if(!empty($userInfo)){

            $re = DB::table('tbl_users')
                ->where('id', '=', $userInfo[0]->id)
                ->update(['password' => Hash::make($tmpPass)]);

            if($re){

                $details = [
                    'title' => '[CLFE]비밀번호 안내',
                    'body' => '회원님의 비밀번호는 ' . $tmpPass . '입니다.'
                ];   

                Mail::to($userInfo[0]->email)->send(new SendMail($details));
                
                $result['success'] = true;
                $result['msg'] = "회원님의 메일로 임시 비밀번호가 전송되었습니다.";                

            }else{
                $result['success'] = false;
                $result['msg'] = "오류가 발생했습니다.";    
            }

        }else{
            $result['success'] = false;
            $result['msg'] = "회원 정보가 존재하지 않습니다.";
        } 

        
        return response()->json($result);


    }    

}
