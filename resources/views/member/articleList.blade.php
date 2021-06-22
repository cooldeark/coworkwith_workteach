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
         <h1 class="mt-3">文章列表</h1>
          <table id="tableList" class="ui celled table">
            <thead>
              <tr>
                <th>文章標題</th>
                <th>課程類別</th>
                <th>文章內容</th>
                <th>批改狀態</th>
                <th>上傳時間</th>
                <th>批改老師</th>
                <th>文章分數</th>
                <th>文章評語</th>
              </tr>
              @foreach($getList as $index=>$value)
              <tr>
              <td class="articleTitle" style="width:20%;">{{$value['title'].' (字數:'.$value['stringCountNumber'].')'}}</td>
              <td style="width:10%;">{{config('memberProfile.lession_type')[$value['lessionType']]}}</td>
              <td style="width:13%;">
                @if($value['uploadType']==2){{--uploadType 2 為照片，1為文字--}}
                  <div class="textShow">{{$value['content']}}</div>
                  <button class="showContent  btn-success" data-photo="{{$value['photo_path']}}">顯示照片</button>
                @elseif($value['uploadType']==1)
                  <div style="display:none;" class="textShow">{{$value['content']}}</div>
                  <button class="showContent  btn-success">詳細內容..</button>
                @elseif($value['uploadType']==3)
                <div class="textShow" style="display:none;">{{$value['google_link']}}</div>
                <button class="showContent  btn-success">顯示連結</button>
                @endif
                
              </td>
              <td style="width:10%;">
                @if($value['status']==0)
                未批改
                @elseif($value['status']==1)
                已批改
                @endif
              </td>
              <td class="articleTime" style="width:15%;">{{date('Y-m-d H:i:s',strtotime($value['created_at']))}}</td>
              <td style="width:10%;">{{$value['checkByWho']}}</td>
              <td style="width:10%;">
                @if($value['scores']==NULL || $value['scores']=='null' || $value['scores']=='NULL')
                 無分數
                @else
                {{$value['scores']}}
                @endif
              </td>
              <td style="width:14%;">
                @if(($value['teacherComments']==NULL && $value['teacher_response_photo_path']==NULL) || ($value['teacherComments']=='null' && $value['teacher_response_photo_path']=='null')  || ($value['teacherComments']=='NULL' && $value['teacher_response_photo_path']=='NULL'))
                 無評語
                @else
                <div class="textShow" style="display:none;">{{$value['teacherComments']}}</div>
                @if($value['studentFeedback']==NULL || $value['studentFeedback']=='null' || $value['studentFeedback']=='NULL')
                <button class="giveComments  btn-primary">給予回饋</button>
                @endif
                <button class="showContent2  btn-success" data-teacherphoto="{{$value['teacher_response_photo_path']}}">評語內容</button>
                @endif
              </td>
              </tr>
              @endforeach
            </thead>
            <tfoot></tfoot>
          </table>
         </div>
         
      </div>

      <button style="display:none;" id="articleContent" type="button" data-toggle="modal" data-target="#optionContent">
        ModalOption
      </button>




      <button style="display:none;" id="giveTeacherComments" type="button" data-toggle="modal" data-target="#giveComments">
        giveComments
      </button>




      <!-- Modal -->
      <div class="modal fade" id="optionContent" tabindex="-1" role="dialog" aria-labelledby="optionContentTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLongTitle">內容</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body modalArticleContent" style="font-size: 16px;">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="giveComments" tabindex="-1" role="dialog" aria-labelledby="giveCommentsTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title">回饋內容</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="font-size: 16px;">
              <h2 class="articleTitleModal"></h2>
              <textarea class="form-control giveArticleContent" rows="10"></textarea>
              <h2 class="modal-title">教練滿意度</h2>
              <select class="giveArticleScores">
                     <option slected value="0">0</option>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
              </select>
              <div class="mt-1" style="font-size:9px;font-weight:bold;">
                (本回饋內容僅針對教師評語給予回饋，如需要繳交修改後文章，請回到前頁選擇「發表文章」即可)
              </div>
            </div>
	    <div class="modal-footer">
              <span class ="articleTimeModal" style="display:none"></span>
              <button type="button" class="btn btn-success teacherCommentsBtnSave" data-dismiss="modal">儲存</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
            </div>
          </div>
        </div>
      </div>



   </div>
    @include('template.footer')
    <script>


      $('.showContent').click(function(){
        var nowContent=$(this).parent().find('.textShow').text();

        if($(this).text()=='顯示照片'){
          let photo_html='<img src="{{ asset('storage/student_upload_article') }}'+'/'+$(this).data('photo')+'"'+' alt="studentPhoto" width="100%;">';
          $('.modalArticleContent').html(photo_html);
        }else if($(this).text()=='顯示連結'){
          $('.modalArticleContent').html("<a target='_blank' href='"+nowContent+"'>"+nowContent+"</a>");
        }else{
          $('.modalArticleContent').html(nowContent.replace(/\n/g,"<br/>"));
        }
          $('#articleContent').trigger('click');
      });

      $('.showContent2').click(function(){
        var nowContent=$(this).parent().find('.textShow').text();
        if($(this).data('teacherphoto')!=null && $(this).data('teacherphoto')!="" && $(this).data('teacherphoto')!=undefined){
          let photo_html='<img src="{{ asset('storage/teacher_response_photo') }}'+'/'+$(this).data('teacherphoto')+'"'+' alt="teacherPhoto" width="100%;">';
          $('.modalArticleContent').html(photo_html);
        }else{
          $('.modalArticleContent').html(nowContent.replace(/\n/g,"<br/>"));
        }
          $('#articleContent').trigger('click');
      });


    </script>
    


    <script>
      var getTitle='';

      $('.giveComments').click(function(){
        getTitle=$(this).parent().parent().find('.articleTitle').text();
        getTime=$(this).parent().parent().find('.articleTime').text();
        $('.articleTitleModal').text('文章標題-'+getTitle);
        $('.articleTimeModal').text(getTime);
        $('#giveTeacherComments').trigger('click');
      });

      $('.teacherCommentsBtnSave').click(function(){
        $(this).attr('disabled',true);
        var scorecheck=new RegExp('^\\d+$');
        scorecheck=scorecheck.test($(this).parent().parent().find('.giveArticleScores').val());
        var getNowTitle=$(this).parent().parent().find('.articleTitleModal').text();
	var getNowTime=$(this).parent().parent().find('.articleTimeModal').text();
        getNowTitle=getNowTitle.replace('文章標題-','');
        getNowTitle=getNowTitle.replace(' (字數:','(');
        getNowTitle=getNowTitle.substring(0,getNowTitle.indexOf('('));

        if($(this).parent().parent().find('.giveArticleContent').val()!="" && $(this).parent().parent().find('.giveArticleContent').val()!=null && scorecheck){
          $.ajax({
	  url:'/updateRating',
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
			  data:{articleStudentComment:$(this).parent().parent().find('.giveArticleContent').val(),articleStudentScores:$(this).parent().parent().find('.giveArticleScores').val(),articleTitleFind:getNowTitle, articleTimeFind:getNowTime},
                  type:'POST',
                  success:function(suMessage){
                     if(suMessage['status']==200){
                        window.location.href="{{url('/studentArticleList')}}";
                     }else{
                        $('#errormessageDiv').css('display','block');
                        $('#errormessageDiv').text(suMessage['message']);
                     }
                  }
               }).fail(function(eMe){
                  alert(eMe['status']);     
                  alert('請聯繫管理員');
                  $(this).attr('disabled',false);
               });
               $(this).parent().parent().find('.giveArticleContent').val('');
               $(this).parent().parent().find('.giveArticleScores').val(0);
        }else if(($(this).parent().parent().find('.giveArticleContent').val()=="" || $(this).parent().parent().find('.giveArticleContent').val()==null) && !scorecheck){
          alert('回饋未輸入，分數格式不正確，只能輸入數字!');
          $(this).attr('disabled',false);
        }else if($(this).parent().parent().find('.giveArticleContent').val()=="" || $(this).parent().parent().find('.giveArticleContent').val()==null){
          alert('回饋未輸入!');
          $(this).attr('disabled',false);
        }else if(!scorecheck){
          alert('分數格式不正確，只能輸入數字!');
          $(this).attr('disabled',false);
        }
        
        
      });

    </script>  

    </body>
</html>
