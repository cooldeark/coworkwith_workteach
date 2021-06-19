<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\studentTable;
use App\Models\teacherTable;
use App\Models\missionBox;
use App\Models\getMissionBox_user;
use App\Models\articleModel;


class studentTeacherModel extends Model
{
    use HasFactory;


    protected function countLevel($who_name,$who_email,$who){
        //category=0的為二次繳交，不算分
        $nowAllScores=0;
        $getCompleteMissionScores=0;
        if($who=='0'){//學生
            $getMemberAllArticle=articleModel::where('createByWho',$who_name)->where('status','1')->whereNotNull('scores')->where('category','<>','0')->get()->toArray();
            $getMemberCompleteMission=getMissionBox_user::where('who_get_mission',$who_email)->where('complete_status','1')->get()->toArray();
            
            
            foreach($getMemberCompleteMission as $missionIndex=>$missionValue){
                $getCompleteMissionScores+=$missionValue['bonus_score'];
            }

            foreach($getMemberAllArticle as $index=>$value){
                $nowAllScores+=$value['scores'];
            }
        }else{//老師
            $getTeacherCheckAllArticle=articleModel::where('checkByWho',$who_name)->where('status','1')->whereNotNull('teacherRating')->where('category','<>','0')->get()->toArray();
            foreach($getTeacherCheckAllArticle as $index=>$value){
                $nowAllScores+=$value['teacherRating'];
            }
        }
        

        $nowAllScores=($nowAllScores*50)+$getCompleteMissionScores;
        //使用者的等級判別，超過一萬後，每五千升一個級別
        if($nowAllScores<100){
            $memberLevel=0;
            $howLongCanUpGrade=100-$nowAllScores;
        }else if($nowAllScores>=100 && $nowAllScores<1500){
            $memberLevel=1;
            $howLongCanUpGrade=1500-$nowAllScores;
        }else if($nowAllScores>=1500 && $nowAllScores<3000){
            $memberLevel=2;
            $howLongCanUpGrade=3000-$nowAllScores;
        }else if($nowAllScores>=3000 && $nowAllScores<5000){
            $memberLevel=3;
            $howLongCanUpGrade=5000-$nowAllScores;
        }else if($nowAllScores>=5000 && $nowAllScores<8000){
            $memberLevel=4;
            $howLongCanUpGrade=8000-$nowAllScores;
        }else if($nowAllScores>=8000 && $nowAllScores<10000){
            $memberLevel=5;
            $howLongCanUpGrade=10000-$nowAllScores;
        }else if($nowAllScores>=10000){
            $memberLevel=4+((int)($nowAllScores/5000));
            $howLongCanUpGrade=5000-(int)(substr($nowAllScores,-4));
            if($howLongCanUpGrade<0){
                $howLongCanUpGrade=5000-abs($howLongCanUpGrade);
            }
        }
        $levelInfo=array(
            'memberLevel'=>$memberLevel,
            'howLongCanUpGrade'=>$howLongCanUpGrade
        );
        
        return $levelInfo;

    }

    protected function getMissionList($userLession,$userEducation,$userLevel){
        $getUserLession=explode(',',$userLession);
        $getMission=missionBox::select('mission_name','mission_description','bonus_score','lession_type','achieve_category','achieve_words','level','education','whichTeacherCreate')->whereIn('lession_type',$getUserLession)->where('education',$userEducation)->where('level',$userLevel)->where('status','1')->get()->toArray();
        $memberAlreadyGetMission=getMissionBox_user::select('mission_name','mission_description','bonus_score','lession_type','achieve_category','achieve_words','level','education','whichTeacherCreate')->where('who_get_mission',Auth::user()->email)->get()->toArray();
        
        //要先比對任務清單裡面，member是否已經領取了任務，如領取了不要再給他一次任務
        foreach($getMission as $missionIndex=>$missionValue){
            foreach($memberAlreadyGetMission as $alreadyIndex=>$alreadyValue){
                $nowCompare=array_diff($missionValue,$alreadyValue);
                if(count($nowCompare)==0){//代表有完全符合的陣列，代表已經有領取過，我們把它從任務清單移除
                    unset($getMission[$missionIndex]);
                }
            }
            
        }
        
        
        $missionlistInfo=array();
        if(count($getMission)<1){//no mission can take
            $missionlistInfo='no_mission';
        }else{
            foreach($getMission as $index=>$value){
                $getTeacherName=teacherTable::where('email',$value['whichTeacherCreate'])->first()['name'];
                $missionlistInfo[$value['lession_type']]=array(
                    'mission_name'=>$value['mission_name'],
                    'mission_description'=>$value['mission_description'],
                    'bonus_score'=>$value['bonus_score'],
                    'achieve_category'=>$value['achieve_category'],
                    'achieve_words'=>$value['achieve_words'],
                    'level'=>$value['level'],
                    'education'=>$value['education'],
                    'whichTeacherCreate'=>$value['whichTeacherCreate'],
                    'teacherShowName'=>$getTeacherName
                );
            }
        }
        return $missionlistInfo;
    }


    protected function getMemberAlreadyTakeMissionList($memberEmail){
        $getMemberCompleteMission=getMissionBox_user::select('get_mission_box_user.id as id','mission_name','mission_description','bonus_score','get_mission_box_user.lession_type as lession_type','get_mission_box_user.achieve_category as achieve_category','achieve_words','name','complete_status')->where('who_get_mission',$memberEmail)->leftjoin('teacher_user','get_mission_box_user.whichTeacherCreate','=','teacher_user.email')->get()->toArray();
        return $getMemberCompleteMission;
    }

    public function studentOrTeacherProfile($who){
        if($who=='0'){//學生
            $getMemberProfile=studentTable::where('email','=',Auth::user()->email)->first()->toArray();
            Session::put('memberValidDate',$getMemberProfile['memberValidTime']);
            $memberRate=config('memberProfile.memberRate')[$getMemberProfile['member_rate']];
            Session::put('memberRate',$memberRate);

            $memberLession=$getMemberProfile['lession_select'];
            $memberEducation=$getMemberProfile['education'];
            $memberLevel=$this->countLevel($getMemberProfile['name'],$getMemberProfile['email'],$who);
            Session::put('memberLevel',$memberLevel);

            $getMemberMissionList=$this->getMissionList($memberLession,$memberEducation,$memberLevel['memberLevel']);
            Session::put('missionlist',$getMemberMissionList);

            $memberAlreadyTakeMissionList=$this->getMemberAlreadyTakeMissionList(Auth::user()->email);
            Session::put('alreadyGetMission',$memberAlreadyTakeMissionList);

        }else{//教師
            $getMemberProfile=teacherTable::where('email','=',Auth::user()->email)->first()->toArray();
            $memberRate='指導老師';
            Session::put('memberRate',$memberRate);
            $memberLevel=$this->countLevel($getMemberProfile['name'],$getMemberProfile['email'],$who);
            Session::put('memberLevel',$memberLevel);
        }

        return $getMemberProfile;
    }



    

}
