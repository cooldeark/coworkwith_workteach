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
use Illuminate\Support\Facades\Storage;
use Session;
use App\Models\studentTeacherModel;
use App\Models\getMissionBox_user;
use App\Models\missionBox;
use App\Models\recommendArticleModel;


class MemberController extends Controller
{
	public function __construct(){
        date_default_timezone_set("Asia/Taipei");
    }


    public function memberProfile(){
        $studentTeacherModel=new studentTeacherModel();
        $getProfile=$studentTeacherModel->studentOrTeacherProfile(Auth::user()->whoRegister);
        $getRecommendArticleList=recommendArticleModel::where('status','1')->get()->toArray();
        // dd($getRecommendArticleList);
        return view('/member/loginSuccess',compact('getProfile','getRecommendArticleList'));
    }

    public function memberGetMission(Request $req){
        $memberGetLesstionType=$req->lessonType;
        $memberGetMission=Session::get('missionlist')[$memberGetLesstionType];
        
        //確認會員沒有領過這個任務，沒領過就能給他
        $checkMemberAlreadyGetMissionOrNot=getMissionBox_user::where('who_get_mission',Auth::user()->email)->where('lession_type',$memberGetLesstionType)->where('mission_name',$memberGetMission['mission_name'])->where('mission_description',$memberGetMission['mission_description'])->where('bonus_score',$memberGetMission['bonus_score'])->where('achieve_category',$memberGetMission['achieve_category'])->where('achieve_words',$memberGetMission['achieve_words'])->where('level',$memberGetMission['level'])->where('education',$memberGetMission['education'])->where('whichTeacherCreate',$memberGetMission['whichTeacherCreate'])->first();
        if($checkMemberAlreadyGetMissionOrNot==null){
            $memberSaveMissionStatus=getMissionBox_user::create([
                'who_get_mission'=>Auth::user()->email,
                'mission_name'=>$memberGetMission['mission_name'],
                'mission_description'=>$memberGetMission['mission_description'],
                'bonus_score'=>$memberGetMission['bonus_score'],
                'lession_type'=>$memberGetLesstionType,
                'achieve_category'=>$memberGetMission['achieve_category'],
                'achieve_words'=>$memberGetMission['achieve_words'],
                'level'=>$memberGetMission['level'],
                'education'=>$memberGetMission['education'],
                'whichTeacherCreate'=>$memberGetMission['whichTeacherCreate'],
                'complete_status'=>0,
            ]);

            if($memberSaveMissionStatus){
                $statusMessage='任務領取成功，請到「我的任務」執行任務哦!';
            }else{
                $statusMessage='領取任務失敗，請重新整理';        
            }

        }else{
            $statusMessage='您已經領取過此任務了哦~';
        }

        $data=array('status'=>200,'message'=>$statusMessage);
        // dd($data);
        return response(json_encode($data),200);


    }



    public function memberAlreadyGetMissionList(){
        $studentTeacherModel=new studentTeacherModel();
        $studentTeacherModel->studentOrTeacherProfile(Auth::user()->whoRegister);
        // dd(Session::get('alreadyGetMission'));
        return view('member/memberAlreadyGetMission');
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
            return Redirect::to('/');
        }
    }


    public function updateMember(Request $request){
        
        
        
        if(Auth::check()){
                $habit=$request->habit;
                $write_position=$request->write_position;
                $education=$request->education;
                $profession=$request->profession;
                $age=$request->age;
                $photo_path=null;

                //大頭貼處理start
                if($request->hasFile('photo_file')){
                    $request->validate([
                        'photo_file' => 'mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:10000'
                    ]);
                    $saveStatus=$request->photo_file->store('self_photo', 'public');//儲存在專案的storage/app/public/self_photo裡面
                    if(gettype(strpos($saveStatus,'self_photo'))=='integer'){//為integer代表有上傳成功
                        $photo_path=$request->photo_file->hashName();//取得被hash過後的檔案名稱
                    }
                }
                //大頭貼處理end

            if($request->who=='學生'){
                //學生更新
                $read_position=$request->read_position;
                $write_frequency=$request->write_frequency;
                $write_experience=$request->write_experience;
                $write_purpose=$request->write_purpose;

                $getLoginUserPhoto=studentTable::where('email','=',Auth::user()->email)->first()->toArray()['photo_path'];

                if($photo_path!=null){//確認照片有儲存成功，我們才執行下一步
                    if($getLoginUserPhoto!=null){//代表有上傳過大頭照，然後又再上傳一次，代表他要更換大頭照，所以我們要把先前的照片刪掉
                        $returnMessage=Storage::disk('public')->delete('self_photo/'.$getLoginUserPhoto);
                    }
                }
                

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
                    'photo_path'=>$photo_path
                    
                ]);
            }else{
                //教師更新
                $teach_experience=$request->teach_experience;
                $teach_years=$request->teach_years;
                $teach_position=$request->teach_position;

                $getLoginUserPhoto=teacherTable::where('email','=',Auth::user()->email)->first()->toArray()['photo_path'];

                if($photo_path!=null){//確認照片有儲存成功，我們才執行下一步
                    if($getLoginUserPhoto!=null){//代表有上傳過大頭照，然後又再上傳一次，代表他要更換大頭照，所以我們要把先前的照片刪掉
                        $returnMessage=Storage::disk('public')->delete('self_photo/'.$getLoginUserPhoto);
                    }
                }

                $updateUser=teacherTable::where('email','=',Auth::user()->email)->update([
                    'age'=>$age,
                    'education'=>$education,
                    'profession'=>$profession,
                    'habit'=>$habit,
                    'write_position'=>$write_position,
                    'teach_position'=>$teach_position,
                    'teach_experience'=>$teach_experience,
                    'teach_years'=>$teach_years,
                    'photo_path'=>$photo_path
                    
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
            return Redirect::to('/');
        }
    }


    public function studentText(Request $request){
        if(Auth::check()){
            if((strtotime(Session::get('memberValidDate'))>time())  || Session::get('memberValidDate')==null){//只有當你的會員期限大於今日或是null才可以發文
                $userData=Auth::user();
                $teacherList=teacherTable::all()->toArray();
                $teacherLessionChinese=array();
                $teacherLessionEnglish=array();
                foreach($teacherList as $index=>$value){//這裡可以分流，讓學生選擇到符合中文課程強悍的老師或是英文課程強悍的老師
                    // dd($value);
                    $nowLession=explode(',',$value['lession_select']);
                    foreach($nowLession as $nowIndex=>$nowValue){
                        if($nowValue==1){//中文課程
                            $teacherLessionChinese[$value['id']]=$value['name'];
                        }else if($nowValue==2){//英文課程
                            $teacherLessionEnglish[$value['id']]=$value['name'];
                        }
                    }
                }

            // dd($teacherLessionChinese);
            Session::put('teacherLessionChinese',$teacherLessionChinese);
            Session::put('teacherLessionEnglish',$teacherLessionEnglish);

            $getStudentInfo=studentTable::where('email',Auth::user()->email)->first();
            $getStudentLessionType=explode(',',$getStudentInfo['lession_select']);

                if($request->mission!=null){
                    $getMissionInfo=getMissionBox_user::where('id',$request->mission)->where('who_get_mission',Auth::user()->email)->where('complete_status','!=','1')->first();
                    if($getMissionInfo==null){//如果任務id找不到，或是status已完成，直接導回到首頁
                        return Redirect::to('/');
                    }else{
                        $getMissionInfo=$getMissionInfo->toArray();
                    }
                    // dd($getMissionInfo);
                    return view('/member/article',compact('userData','getStudentLessionType','teacherLessionChinese','teacherLessionEnglish','getMissionInfo'));
                }else{
                    return view('/member/article',compact('userData','getStudentLessionType','teacherLessionChinese','teacherLessionEnglish'));
                }
            }else{
                return Redirect::to('/');
            }
        }else{
            return Redirect::to('/');
        }
        
    }


    public function articleCreate(Request $request){
        if(Auth::check() && Auth::user()->whoRegister=='0'){//確定有登入，並且登入者為學生
            
            $articleLessionType=$request->chooseLessionType;
            $articleUploadType=$request->chooseUploadType;
            $articleTitle=$request->articleTitle;
            $articleTitle=$request->articleTitle;
            $chooseCategory=$request->chooseCategory;
            $articleContent=$request->articleContent;
            $googleLinkText=$request->googleLinkText;
            $googleLinkText = preg_replace('/\s+/', '', $googleLinkText);//網址去空白
            
            if($articleLessionType==1){//如果1為中文課程
                $chooseTeacher=$request->chooseChineseTeacher;
            }else if($articleLessionType==2){//2為英文課程
                $chooseTeacher=$request->chooseEnglishTeacher;
            }

            /*
            以下為判斷任務是否完成，如完成則會更新任務包
            */

            //這裡先確認，是否是任務端口進來
            if($request->has('missionID')){//確實有missionID
                if($request->missionStatus==0 && $request->whoGetMission==Auth::user()->email){//status 為0跟誰取得此任務的user都為同一位人
                    if($articleUploadType==1){//1是文字，2是照片，這裡判別學生選擇的繳交類別是什麼，如果是照片，就讓老師去看有多少字，文字就用程式計算
                        $checkInputEnglishOrChinese=preg_match("/\p{Han}+/u", $articleContent);//判斷是否有中文

                        if($checkInputEnglishOrChinese){//return 1就是有中文，進入true
                            $nowCountContentNumber=mb_strlen($articleContent);
                        }else{//這裡代表無中文，是英文文章
                            $nowCountContentNumber=str_word_count($articleContent);
                        }
                        $getMissionIDInfo=getMissionBox_user::where('id',$request->missionID)->where('achieve_category',$chooseCategory)->where('lession_type',$articleLessionType)->where('achieve_words','<=',$nowCountContentNumber)->first();
                    }else{
                        $getMissionIDInfo=getMissionBox_user::where('id',$request->missionID)->where('achieve_category',$chooseCategory)->where('lession_type',$articleLessionType)->first();//照片就請老師看字數是否有滿足
                    }
                    if($getMissionIDInfo!=null){
                        $checkMission=true;
                        $getMissionIDInfo=$getMissionIDInfo->toArray();
                    }else{
                        $data=[
                            'status'=>201,
                            'message'=>'尚未滿足文章字數條件!'
                        ];
                        return response(json_encode($data),201);
                    }
                    
                }else{
                    $data=[
                        'status'=>201,
                        'message'=>'任務有誤，請聯繫管理員!'
                    ];
                    return response(json_encode($data),201);
                }
            }
            /*
            以上為判斷任務是否完成，如完成則會更新任務包
            */

            // 中/英老師清單
            $teacherChineseList=Session::get('teacherLessionChinese');
            $teacherEnglishList=Session::get('teacherLessionEnglish');
            $getAllTeacher=teacherTable::all()->toArray();

            if($chooseTeacher==0){//如果無選擇，給隨機老師
                if($articleLessionType==1){//中文課程，要選擇中文老師
                    $chooseTeacher=array_rand($teacherChineseList,1);//這裡會random出array的index
                }else if($articleLessionType==2){//英文課程，要選擇英文老師
                    $chooseTeacher=array_rand($teacherEnglishList,1);
                }
            }

            foreach($getAllTeacher as $allTeacherValue){//將random出來的老師做為要批改的老師
                if($allTeacherValue['id']==$chooseTeacher){
                    $teacherName=$allTeacherValue['name'];
                    $teacherEmail=$allTeacherValue['email'];
                    
                }
            }
            

            //判斷是否有圖片，儲存欄位會不一樣
            $articleCreateArray=[
                'title'=>$articleTitle,
                'content'=>$articleContent,
                'category'=>$chooseCategory,
                'checkByWho'=>$teacherName,
                'createByWho'=>Auth::user()->name,
                'lessionType'=>$articleLessionType,
                'uploadType'=>$articleUploadType,
                'google_link'=>$googleLinkText,
                'status'=>'0',
            ];

            if($articleUploadType==2){//1是文字，2是照片，3是googleLink
                //學生作業圖片處理start
                if($request->hasFile('uploadFile')){
                    $request->validate([
                        'uploadFile' => 'mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:10000'
                    ]);
                    $saveStatus=$request->uploadFile->store('student_upload_article', 'public');//儲存在專案的storage/app/public/student_upload_article裡面
                    if(gettype(strpos($saveStatus,'student_upload_article'))=='integer'){//為integer代表有上傳成功
                        $photo_path=$request->uploadFile->hashName();//取得被hash過後的檔案名稱
                        $articleCreateArray['photo_path']=$photo_path;
                    }
                }
                //學生作業圖片處理end
            }

            $articleCreate=articleModel::create($articleCreateArray);

            if($articleCreate){

                //文章確實建立完成，並且確認mission是可以過關的要更新
                if(isset($checkMission)){
                    getMissionBox_user::where('id',$request->missionID)->update([
                        'complete_status'=>1
                    ]);
                }

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
            return Redirect::to('/');
        }
    }

    public function studentArticleList(){
        if(Auth::check() && Auth::user()->whoRegister=='0'){
            $getList=articleModel::where('createByWho',Auth::user()->name)->get()->toArray();
            return view('member/articleList',compact('getList'));
        }else{
            return Redirect::to('/');
        }
    }


    public function checkArticle(){
        if(Auth::check() && Auth::user()->whoRegister=='1'){
            $getList=articleModel::where('checkByWho',Auth::user()->name)->get()->toArray();
            // dd($getList);
            return view('member/articleCheckList',compact('getList'));
        }else{
            return Redirect::to('/');
        }
    }


    public function updateComments(Request $request){
        // dd($request->all());
        if(Auth::check() && Auth::user()->whoRegister=='1'){
            $articleTeacherComment=$request->articleTeacherComment;
            $articleTeacherScores=$request->articleTeacherScores;
            $articleTitleFind=$request->articleTitleFind;
            $articleTimeFind=$request->articleTimeFind;
            $teacherFeedBackType=$request->teacherFeedBackType;
            $photo_path=null;

            if($teacherFeedBackType==1){//如果是照片上傳
                //圖片處理start
                if($request->hasFile('photo_file')){
                    $request->validate([
                        'photo_file' => 'mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:10000'
                    ]);
                    $saveStatus=$request->photo_file->store('teacher_response_photo', 'public');//儲存在專案的storage/app/public/teacher_response_photo裡面
                    if(gettype(strpos($saveStatus,'teacher_response_photo'))=='integer'){//為integer代表有上傳成功
                        $photo_path=$request->photo_file->hashName();//取得被hash過後的檔案名稱
                    }
                }
                //圖片處理end
            }


            $updateArticleList=articleModel::where('created_at','=',$articleTimeFind)->update([
                'teacherComments'=>$articleTeacherComment,
                'scores'=>$articleTeacherScores,
                'teacher_response_photo_path'=>$photo_path,
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
            return Redirect::to('/');
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
            return Redirect::to('/');
        }
    }


}
