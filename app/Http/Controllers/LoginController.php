<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        if(Auth::check()){
            return view('Index/main');
        }else{
            return view('admin/login');
        }
        

    }

    public function login(Request $request)
    {
        if(Auth::check()){
            Session::put('userName',Auth::user()->name);
            Session::put('whoRegister',Auth::user()->whoRegister);
            return view('Index/main');
        }else{
        $userEmail=$request->userEmail;
        $userPwd=$request->userPwd;
        $userNameCheck=DB::table('studentTeacher_register')->where('email',$userEmail)->first();
            if($userNameCheck==null || empty($userNameCheck) || !isset($userNameCheck)){
                return Redirect::back()->withErrors(['error'=>"密碼或信箱錯誤"]);
            }else{
                if($userNameCheck->status=='1'){
                    if(Auth::attempt(['email' => $userEmail, 'password' => $userPwd])){//檢查的時候，密碼自動會幫你hash不用自己來
                        Session::put('userName',Auth::user()->name);
                        Session::put('whoRegister',Auth::user()->whoRegister);
                        return view('Index/main');
                    }else{
                        return Redirect::back()->withErrors(['error'=>"密碼或信箱錯誤"]);
                    }
                }else{
                    return Redirect::back()->withErrors(['error'=>"網站主尚未驗證您的帳號，請再等等哦"]);
                }
            }
            
            
        }
    }


    public function checkLogin()
    {
        if (Auth::check()) {
           dd('ur good');
        }else{
            dd('u domb');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return view('Index/main');
    }




    
}
