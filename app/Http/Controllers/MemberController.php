<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentTeacher;
use App\Models\studentTable;
use App\Models\teacherTable;
use App\Models\articleModel;
use App\Models\User;
use DB;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

class MemberController extends Controller
{
	public function __construct(){
        date_default_timezone_set("Asia/Taipei");
    }
    public function memberData(Request $request){
        if(Auth::check()){
            if(Auth::user()->whoRegister=='0'){
                $getUserData=studentTable::where('email','=',Auth::user()->email)->first();
                $whoRegister='學生';
                return view('/member/memberData',compact('getUserData','whoRegister'));
            }else{
                $getUserData=teacherTable::where('email','=',Auth::user()->email)->first();
                $whoRegister='老師';
                return view('/member/memberData',compact('getUserData','whoRegister'));
            }
        }else{
            return view('Index/main');
        }
    }


    public function updateMember(Request $request){
        if(Auth::check()){
                $habit=$request->habit;
                $write_position=$request->write_position;
                $education=$request->education;
                $profession=$request->profession;
                $age=$request->age;
            if($request->who=='學生'){
                //學生更新
                $read_position=$request->read_position;
                $write_frequency=$request->write_frequency;
                $write_experience=$request->write_experience;
                $write_purpose=$request->write_purpose;
                $updateUser=studentTable::where('email','=',Auth::user()->email)->update([
                    'age'=>$age,
                    'education'=>$education,
                    'profession'=>$profession,
                    'habit'=>$habit,
                    'write_position'=>$write_position,
                    'read_position'=>$read_position,
                    'write_frequency'=>$write_frequency,
                    'write_experience'=>$write_experience,
                    'write_purpose'=>$write_purpose,
                    
                ]);
            }else{
                //教師更新
                $teach_experience=$request->teach_experience;
                $teach_years=$request->teach_years;
                $teach_position=$request->teach_position;
                $updateUser=teacherTable::where('email','=',Auth::user()->email)->update([
                    'age'=>$age,
                    'education'=>$education,
                    'profession'=>$profession,
                    'habit'=>$habit,
                    'write_position'=>$write_position,
                    'teach_position'=>$teach_position,
                    'teach_experience'=>$teach_experience,
                    'teach_years'=>$teach_years,
                    
                ]);
            }
            
            if($updateUser){
                $message=[
                    'message'=>'success',
                    'status'=>200
                ];
                return $message;
            }else{
                $message=[
                    'message'=>'更新失敗，請聯繫管理員',
                    'status'=>500
                ];
                return $message;
            }
                
        }else{
            return view('Index/main');
        }
    }


    public function studentText(){
        if(Auth::check()){
            $userData=Auth::user();
            $teacherList=teacherTable::all()->toArray();
            
            return view('/member/article',compact('userData','teacherList'));
        }else{
            return view('Index/main');
        }
        
    }


    public function articleCreate(Request $request){
        if(Auth::check() && Auth::user()->whoRegister=='0'){
            $articleTitle=$request->articleTitle;
            $chooseCategory=$request->chooseCategory;
            $chooseTeacher=$request->chooseTeacher;
            $articleContent=$request->articleContent;
            $getAllTeacher=teacherTable::all()->toArray();
            if($chooseTeacher==0){//如果無選擇，給隨機老師
                $randTeacher=rand(0,count($getAllTeacher)-1);
                $randTeacher=$getAllTeacher[$randTeacher];
                $chooseTeacher=$randTeacher['id'];
            }
            foreach($getAllTeacher as $allTeacherValue){
                if($allTeacherValue['id']==$chooseTeacher){
                    $teacherName=$allTeacherValue['name'];
                    $teacherEmail=$allTeacherValue['email'];
                    
                }
            }

            $articleCreate=articleModel::create([
                'title'=>$articleTitle,
		'content'=>$articleContent,
                'category'=>$chooseCategory,
                'checkByWho'=>$teacherName,
                'createByWho'=>Auth::user()->name,
                'status'=>'0',
            ]);

            if($articleCreate){

                $to = collect([
                    ['name' => $teacherName, 'email' => $teacherEmail]
                ]);
                $sendMailParams=['type'=>'createArticle','articleTitle'=>$articleTitle];
                Mail::to($to)->send(new sendMail($sendMailParams));

                $message=[
                    'message'=>'success',
                    'status'=>200
                ];
                
            }else{
                $message=[
                    'message'=>'文章建立失敗，請聯繫管理員',
                    'status'=>500
                ];
                
            }
            return $message;
        }else{
            return view('Index/main');
        }
    }

    public function studentArticleList(){
        if(Auth::check() && Auth::user()->whoRegister=='0'){
            $getList=articleModel::where('createByWho',Auth::user()->name)->get()->toArray();
            return view('member/articleList',compact('getList'));
        }else{
            return view('Index/main');
        }
    }


    public function checkArticle(){
        if(Auth::check() && Auth::user()->whoRegister=='1'){
            $getList=articleModel::where('checkByWho',Auth::user()->name)->get()->toArray();
            return view('member/articleCheckList',compact('getList'));
        }else{
            return view('Index/main');
        }
    }


    public function updateComments(Request $request){
        
        if(Auth::check() && Auth::user()->whoRegister=='1'){
            $articleTeacherComment=$request->articleTeacherComment;
            $articleTeacherScores=$request->articleTeacherScores;
            $articleTitleFind=$request->articleTitleFind;
            $articleTimeFind=$request->articleTimeFind;

            $updateArticleList=articleModel::where('created_at','=',$articleTimeFind)->update([
                'teacherComments'=>$articleTeacherComment,
                'scores'=>$articleTeacherScores,
                'status'=>1
            ]);
            if($updateArticleList){

                $getArticleOwner=articleModel::where('created_at',$articleTimeFind)->first()->createByWho;
                $getArticleOwnerName=studentTable::where('name',$getArticleOwner)->first()->email;

                $to = collect([
                    ['name' => $getArticleOwner, 'email' => $getArticleOwnerName]
                ]);
                $sendMailParams=['type'=>'teacherFinish','articleTitle'=>$articleTitleFind];
                Mail::to($to)->send(new sendMail($sendMailParams));

                $message=[
                    'message'=>'success',
                    'status'=>200
                ];
            }else{
                $message=[
                    'message'=>'Fail',
                    'status'=>500
                ];
            }
            
            return $message;
        }else{
            return view('Index/main');
        }
    }


    public function updateRating(Request $request){
        
        if(Auth::check() && Auth::user()->whoRegister=='0'){
            $articleStudentComment=$request->articleStudentComment;
            $articleStudentScores=$request->articleStudentScores;
            $articleTitleFind=$request->articleTitleFind;
            $articleTimeFind=$request->articleTimeFind;

            $updateArticleList=articleModel::where('created_at','=',$articleTimeFind)->update([
                'studentFeedback'=>$articleStudentComment,
                'teacherRating'=>$articleStudentScores
	    ]);

            if($updateArticleList){
                $message=[
                    'message'=>'success',
                    'status'=>200
                ];
            }else{
                $message=[
                    'message'=>'Fail',
                    'status'=>500
                ];
            }
            return $message;
        }else{
            return view('Index/main');
        }
    }


}
