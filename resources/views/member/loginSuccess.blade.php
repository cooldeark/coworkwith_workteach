<!doctype html>
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('template.library')
    <link rel="stylesheet" href="{{asset('css/loginSuccess.css')}}">
</head>
@include('template.topper')
<body>
<div class="container">
    <div class="main-body">
    
          <!-- 不用理 -->
          <nav aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a >ya</a></li>
            </ol>
          </nav>
          <!-- 不用理 -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if($getProfile['photo_path']==null)
                    <img src="{{ asset('storage/self_photo/default_photo.jpg') }}" alt="Admin" class="rounded-circle" width="150">
                    @else
                    <img src="{{ asset('storage/self_photo/'.$getProfile['photo_path']) }}" alt="Admin" class="rounded-circle" width="150">
                    @endif
                    
                    <div class="mt-3">
                      <h4>{{Session::get('userName')}}</h4>
                      <p class="text-secondary mb-1">{{Session::get('memberRate')}}</p>
                      <p class="text-secondary mb-1">
                        @if(Session::get('whoRegister')==0){{--學生--}}
                        學習等級 :
                        @else
                        指導等級 :
                        @endif
                         {{Session::get('memberLevel')['memberLevel']}}
                      </p>
                      <p class="text-secondary mb-1">離升級還有 {{Session::get('memberLevel')['howLongCanUpGrade']}} Exp</p>
                      <p class="text-secondary mb-1">
                        @if(Session::get('whoRegister')==0){{--學生才有所謂的會籍時限--}}
                        @if($getProfile['memberValidTime']==null)
                        @else
                        會籍到期日:{{date('Y-m-d',strtotime($getProfile['memberValidTime']))}}
                        @endif
                        @endif
                      </p>
                      {{-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> --}}
                    </div>
                  </div>
                </div>
              </div>

              @if(Session::get('whoRegister')==0){{--學生才顯示任務包--}}
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h3 class="mb-0"><b>任務清單</b></h3>
                    <span class="text-secondary"></span>
                  </li>
                  @if(Session::get('missionlist')=='no_mission')
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <span class="text-secondary" id="chineseDescription">現在沒有新的任務可以領取，您可以到右上角「我的任務」查看您已經選取的任務，或者自由繳交文章喔！</span>
                  </li>
                  @else
                  @foreach(Session::get('missionlist') as $missionLessionType=>$missionValue)
                  @if($missionLessionType==1){{--中文課程=1--}}
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="mb-0"><b>中文課程任務:</b></h5>
                    <span class="text-secondary"><button class="btn btn-primary missionBtn"  data-id="1">領取</button></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><b>任務名稱</b></h6>
                    <span class="text-secondary" id="chineseMissionName">{{$missionValue['mission_name']}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><b>任務敘述</b></h6>
                    <span class="text-secondary" id="chineseDescription">{{$missionValue['mission_description']}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><b>額外獎勵</b></h6>
                    <span class="text-secondary" id="chineseMissionBonus">{{$missionValue['bonus_score']}} Exp</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><b>出題者</b></h6>
                    <span class="text-secondary" id="chineseTeacherCreate">{{$missionValue['teacherShowName']}}</span>
                  </li>
                  
                  @elseif($missionLessionType==2){{--英文課程=2--}}
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="mb-0"><b>英文課程任務:</b></h5>
                    <span class="text-secondary"><button class="btn btn-primary missionBtn"  data-id="2" >領取</button></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">任務名稱</h6>
                    <span class="text-secondary" id="englishMissionName">{{$missionValue['mission_name']}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">任務敘述</h6>
                    <span class="text-secondary" id="englishDescription">{{$missionValue['mission_description']}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">額外獎勵</h6>
                    <span class="text-secondary" id="englishMissionBonus">{{$missionValue['bonus_score']}} Exp</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">出題者</h6>
                    <span class="text-secondary" id="englishTeacherCreate">{{$missionValue['teacherShowName']}}</span>
                  </li>
                  @endif
                  
                  @endforeach

                  @endif
                </ul>
              </div>
              @endif

            </div>


            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h2 class="mb-0"><b>精選好文</b></h2>
                    </div>
                  </div>
                  <hr>
                  @foreach($getRecommendArticleList as $listIndex=>$listValue)
                  <div class="row">
                    <div class="col-sm-12">
                      <h6 class="mb-3"><b>文章標題 : </b>{{$listValue['article_title']}}</h6>
                      <h6 class="mb-3"><b>文章分類 : </b>{{config('memberProfile.category')[$listValue['article_category']]}}</h6>
                      <h6 class="mb-3"><b>課程分類 : </b>{{config('memberProfile.lession_type')[$listValue['lession_type']]}}</h6>
                      <h5 class="mb-3"><b>內容摘要 : </b></h5>
                      <h6 class="mb-3">{{$listValue['article_summary']}}</h6>
                      <h6 class="mb-3"><b>文章連結 : </b><a href="{{$listValue['link']}}" target="_blank">{{$listValue['link']}}</a></h6>
                    </div>
                  </div>
                  <hr>
                  @endforeach
                </div>
              </div>

              {{-- 未來可添加功能 --}}
              {{-- <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}



            </div>
          </div>

        </div>
    </div>
    <script>
      $('.missionBtn').on('click',function(){
        $(this).attr('disabled',true);
        $.ajax({
          headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            url:"/getMission/"+$(this).data('id'),
            type:'POST',
            dataType:'json',
            success:function(response){
                alert(response.message);
            }
        }).fail(function(errMessage){
            alert('領取任務失敗，請聯繫管理員!');
        }).always(function(){
          window.location.href="{{url('/memberProfile')}}";
        });
      });


      $(document).ready(function()
      {
          $(".rounded-circle").on("error", function(){
              $(this).attr('src', '{{ asset('storage/self_photo/default_photo.jpg') }}');
          });
      });
    </script>
</body>
</html>