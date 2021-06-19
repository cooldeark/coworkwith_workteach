<!doctype html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('template.library')
    {{--JS 放置區 --}}
  <script src="{{asset('js/register.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('js/semantic/semantic.min.css')}}"/>
    {{--CSS 放置區--}}
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <link rel="stylesheet" href="{{asset('css/material.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script type="text/javascript" src="{{URL::asset('js/dataTable/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/semantic/semantic.min.js')}}"></script>


    <style>
.textShow {
  display: block;
  width: 100px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
.textShow2 {
  display: block;
  width: 100px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
.container {
    width: 90em;
    background: #fff;
    /* margin-left: 165px; */
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    -o-border-radius: 10px;
    -ms-border-radius: 10px; }
    </style>

  </head>
  @include('template.topper')
  <body>

    
    <div class="mt-5">
      <div class="container">
         <div  class="appointment-form" id="articleList"> 
         <h1 class="mt-3">我的任務</h1>
          <table id="tableList" class="ui celled table">
            <thead>
              <tr>
              <th>任務名稱</th>
              <th>任務描述</th>
              <th>額外獎勵</th>
              <th>課程分類</th>
              <th>文章達成分類</th>
              <th>文章最少字數</th>
              <th>出題者</th>
              <th>進行任務</th>
              {{-- <th>是否完成</th> --}}
              </tr>
              @foreach(Session::get('alreadyGetMission') as $missionIndex=>$missionValue)
              <tr>
                <td>{{$missionValue['mission_name']}}</td>
                <td>
                  <div class="textShow" style="display:none;">{{$missionValue['mission_description']}}</div>
                  <button class="showContent ml-5 btn-success">任務內容</button>
                </td>
                <td>{{$missionValue['bonus_score']}} Exp</td>
                <td>{{config('memberProfile.lession_type')[$missionValue['lession_type']]}}</td>
                <td>{{config('memberProfile.category')[$missionValue['achieve_category']]}}</td>
                <td>{{$missionValue['achieve_words']}}字</td>
                <td>{{$missionValue['name']}}</td>
                @if($missionValue['complete_status']==0)
                <td><button class="btn btn-primary missionBtn" data-missionid="{{$missionValue['id']}}">出發</button></td>
                @else
                <td>已完成</td>
                @endif
                {{-- <td>{{config('memberProfile.status')[$missionValue['complete_status']]}}</td> --}}
              </tr>
              @endforeach
            </thead>
            <tfoot></tfoot>
          </table>
         </div>
         
      </div>

      <button style="display:none;" id="MissionDescription" type="button" data-toggle="modal" data-target="#missionContent">
        ModalOption
      </button>

      <button style="display:none;" id="giveTeacherComments" type="button" data-toggle="modal" data-target="#giveComments">
        giveComments
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="missionContent" tabindex="-1" role="dialog" aria-labelledby="missionContentTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLongTitle">任務描述</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body modalMissionDescription" style="font-size: 16px;">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
            </div>
          </div>
        </div>
      </div>

      
   </div>
   <button style="display:none;" id="MissionDescription" type="button" data-toggle="modal" data-target="#missionContent">
    ModalOption
  </button>

    @include('template.footer')
    <script>
        $('.showContent').click(function(){
        var nowContent=$(this).parent().find('.textShow').text();
          $('.modalMissionDescription').html(nowContent.replace(/\n/g,"<br/>"));
          $('#MissionDescription').trigger('click');
      });


      $('.missionBtn').on('click',function(){
        window.location.href="/studentText/"+$(this).data('missionid');
      });

      @if ($errors->any())
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
      @endif


    </script>
    </body>
</html>
