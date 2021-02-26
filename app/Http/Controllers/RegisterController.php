<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentTeacher;
use App\Models\studentTable;
use App\Models\teacherTable;
use App\Models\adminMailModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

class RegisterController extends Controller
{
    public function registerPage(){
        if(Auth::check()){
            return view('Index/main');
        }else{
            return view('register.splitIndex');
        }
        
        
    }

    public function changePassword(Request $request){
        if(Auth::check()){
                $oldPW=$request->oldPassword;
                $newPW=Hash::make($request->newpassword);
            if(Hash::check($oldPW, Auth::user()->password)){
                DB::table('studentTeacher_register')->where('email','=',Auth::user()->email)->update([
                    'password'=>$newPW
                ]);
                return view('Index/main');
	    }else{
		    return redirect()->action('App\Http\Controllers\LoginController@show')->withErrors(['oldPWError'=>'舊密碼錯誤']);
        }
        }else{
            return view('Index/main');
        }
        
        
    }

    public function forgotPassword(Request $request){
        if(Auth::check()){
            return view('Index/main');
        }else{
            $findUserData=DB::table('studentTeacher_register')->where('email','=',$request->useremail)->first();
            if($findUserData==null || $findUserData=='null' || empty($findUserData)){
                return Redirect::back()->withErrors(['forgotPWMessage'=>'無此使用者註冊資料']);
            }else{
                $findUser=$findUserData->email;
                if($findUser!=null){
                    $systemPW=rand(100000, 999999);
                    $newPW=Hash::make($systemPW);
                    DB::table('studentTeacher_register')->where('email','=',$request->useremail)->update([
                        'password'=>$newPW
                    ]);

                    $to = collect([
                        ['name' => $findUserData->name, 'email' => $findUserData->email]
                    ]);
                    $sendMailParams=['type'=>'forgotPWD','newPW'=>$systemPW];
                    Mail::to($to)->send(new sendMail($sendMailParams));
                    return Redirect::back()->withErrors(['forgotPWMessage'=>"新密碼已寄至您的信箱，再請查閱。"]);
                }else{
                    return Redirect::back()->withErrors(['forgotPWMessage'=>'無此使用者註冊資料']);
                }
            }
            
        }
        
        
    }

    public function registerStep(Request $request){
        if(Auth::check()){
            return view('Index/main');
        }else{
            $whoRegister=$request->whoRegister;
        if($whoRegister=='student'){
            $whoRegister='學生';
        }else{
            $whoRegister='教師';
        }
        return view('register.index',compact('whoRegister'));
        }
        
    }

    public function whoRegister(Request $request){
        
        
        if(Auth::check()){
            return view('Index/main');
        }else{
            $whoRegister=$request->who;
        if($whoRegister=='學生'){
            $whoRegister='0';
        }else{
            $whoRegister='1';
        }
        $password=Hash::make($request->password);
        $email=$request->email;
        $name=$request->name;
        $sex=$request->sex;
        $birth=$request->birth;
        $age=$request->age;
        $phone_number=$request->phone_number;
        $education=$request->education;
        $profession=$request->profession;
        $address_main=$request->address_main;
        $address_sub=$request->address_sub;
        $address_main_name=$request->address_main_name;
        $address_sub_name=$request->address_sub_name;
        $habit=$request->habit;
        $write_position=$request->write_position;
        $isMember=$request->isMember;

        $userEmailCheck=DB::table('studentTeacher_register')->where('email',$email)->first();
        $userNameCheck=DB::table('studentTeacher_register')->where('name',$name)->first();
        
        if($userEmailCheck==null&& $userNameCheck==null ){

            if(strtolower($isMember)=='gaofeng' || strtolower($isMember)=='shuiwei' || strtolower($isMember)=='baoshan' || strtolower($isMember)=='pinghe' || strtolower($isMember)=='poai' || strtolower($isMember)=='happynewyear' ){
                $createUser=studentTeacher::create([
                    'email'=>$email,
                    'password'=>$password, 
                    'name'=>$name,
                    'whoRegister'=>$whoRegister,
                    'status'=>1
                ]);
            }else{
                $createUser=studentTeacher::create([
                    'email'=>$email,
                    'password'=>$password, 
                    'name'=>$name,
                    'whoRegister'=>$whoRegister,
                    'status'=>0
                ]);
            }

            


            if($createUser){
                if($whoRegister=='0'){//學生註冊
                    $read_position=$request->read_position;
                    $write_frequency=$request->write_frequency;
                    $write_experience=$request->write_experience;
                    $write_purpose=$request->write_purpose;

                    $createStudent=studentTable::create([
                        'email'=>$email,
                        'name'=>$name,
                        'sex'=>$sex,
                        'birth'=>$birth,
                        'age'=>$age,
                        'phone'=>$phone_number,
                        'education'=>$education,
                        'profession'=>$profession,
                        'address_main'=>$address_main,
                        'address_sub'=>$address_sub,
                        'address_main_name'=>$address_main_name,
                        'address_sub_name'=>$address_sub_name,
                        'habit'=>$habit,
                        'write_position'=>$write_position,
                        'read_position'=>$read_position,
                        'write_frequency'=>$write_frequency,
                        'write_experience'=>$write_experience,
                        'write_purpose'=>$write_purpose,
                        'cooperation_school'=>$isMember,
                        
                    ]);
                }else{//教師註冊
                    $teach_experience=$request->teach_experience;
                    $teach_years=$request->teach_years;
                    $teach_position=$request->teach_position;

                    $createTeacher=teacherTable::create([
                        'email'=>$email,
                        'name'=>$name,
                        'sex'=>$sex,
                        'birth'=>$birth,
                        'age'=>$age,
                        'phone'=>$phone_number,
                        'education'=>$education,
                        'profession'=>$profession,
                        'address_main'=>$address_main,
                        'address_sub'=>$address_sub,
                        'address_main_name'=>$address_main_name,
                        'address_sub_name'=>$address_sub_name,
                        'habit'=>$habit,
                        'write_position'=>$write_position,
                        'teach_position'=>$teach_position,
                        'teach_experience'=>$teach_experience,
                        'teach_years'=>$teach_years,
                        'cooperation_school'=>$isMember,
                        
                    ]);

                }
                
                $adminMail=(adminMailModel::get()->toArray())[0]['email'];

                if(strtolower($isMember)=='gaofeng' || strtolower($isMember)=='shuiwei' || strtolower($isMember)=='baoshan' || strtolower($isMember)=='pinghe' || strtolower($isMember)=='poai' || strtolower($isMember)=='happynewyear' ){
                    $to = collect([
                        ['name' => 'admin', 'email' => $email]
                    ]);
                    $sendMailParams=['type'=>'getNoticeRegisterSuccess'];
                    Mail::to($to)->send(new sendMail($sendMailParams));
                }else{
                    $to = collect([
                        ['name' => 'admin', 'email' => $adminMail]
                    ]);
    
                    $userMaillAddress='https://www.wordteach.ml/registetVerify/'.$email;
                    $sendMailParams=['type'=>'registerMail','name'=>$name,'userMailAddress'=>$userMaillAddress];
                    Mail::to($to)->send(new sendMail($sendMailParams));
                }
                

                $message=[
                    'message'=>'success',
                    'status'=>200
                ];
                return $message;
            }else{
                $message=[
                    'message'=>'註冊失敗，請聯繫管理員',
                    'status'=>500
                ];
                return $message;
            }
            
            
            }else if($userEmailCheck!=null && $userNameCheck!=null){
                $message=[
                    'message'=>'信箱&姓名已註冊過，請更換',
                    'status'=>500
                ];
                return $message;
                    
            }else if($userEmailCheck==null && $userNameCheck!=null){
                $message=[
                    'message'=>'姓名已註冊過，請更換',
                    'status'=>500
                ];
                return $message;
                    
            }else if($userEmailCheck!=null && $userNameCheck==null){
                $message=[
                    'message'=>'信箱已註冊過，請更換',
                    'status'=>500
                ];
                return $message;
                    
            }
        }
    }


    public function registetVerify(Request $request){
        $check=studentTeacher::where('email',$request->userMail)->update([
            'status'=>'1'
        ]);
        if($check){
            $to = collect([
                ['name' => 'admin', 'email' => $request->userMail]
            ]);
            $sendMailParams=['type'=>'getNoticeRegisterSuccess'];
            Mail::to($to)->send(new sendMail($sendMailParams));
            return view('Index/main');
        }else{
            dd('error please contace administrator.');
        }        

    }

}
