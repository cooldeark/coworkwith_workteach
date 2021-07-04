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
         <h1 class="mt-3">文章列表</h1>
          <table id="tableList" class="ui celled table">
            <thead>
              <tr>
                <th>文章標題</th>
                <th>課程類別</th>
                <th>文章內容</th>
                <th>批改狀態</th>
                <th>上傳時間</th>
                <th>作者名稱</th>
                <th>文章分數</th>
                <th>文章評語</th>
              </tr>
              @foreach(array_reverse($getList) as $index=>$value)
              <tr>
              <td class="articleTitle" style="width:20%;">{{$value['title'].' (字數:'.$value['stringCountNumber'].')'}}</td>
              <td style="width:10%;">{{config('memberProfile.lession_type')[$value['lessionType']]}}</td>
              <td style="width:12%;">
              @if($value['uploadType']==1){{--1為文字--}}
              <div class="textShow" style="display:none;">{{$value['content']}}</div>
              <button class="showContent  btn-success">詳細內容..</button>
              @elseif($value['uploadType']==2){{--2為照片--}}
              <button class="showContent  btn-success" data-photo="{{$value['photo_path']}}">顯示照片</button>
              @elseif($value['uploadType']==3){{--3為google連結--}}
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
              <td style="width:10%;">{{$value['createByWho']}}</td>
              <td style="width:10%;">
                @if($value['scores']==NULL || $value['scores']=='null' || $value['scores']=='NULL')
                 無分數
                @else
                {{$value['scores']}}
                @endif
              </td>
              <td style="width:14%;">
                @if( ($value['teacherComments']==NULL && $value['teacher_response_photo_path']==NULL) || ($value['teacherComments']=='null' && $value['teacher_response_photo_path']=='null')  || ($value['teacherComments']=='NULL' && $value['teacher_response_photo_path']=='NULL'))
                 <button class="btn btn-primary giveComments">給予評語</button>
                @else
                <div class="textShow" style="display:none;">{{$value['teacherComments']}}</div>
                <button class="showContent3  btn-success" data-teacherphoto="{{$value['teacher_response_photo_path']}}">評語內容</button>
                <div class="textShow2" style="display:none;">{{$value['studentFeedback']}}</div>
                <button class="showContent2  btn-primary">學生回饋</button>
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
            <form id="teacherInfoList" enctype="multipart/form-data">
            <div class="modal-header">
              <h2 class="modal-title">評語內容</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="font-size: 16px;">
              <h2 class="modal-title">回復類別</h2>
              <select id="teacherFeedBackType" name="teacherFeedBackType">
                     <option selected value="0">文字</option>
                     <option value="1">照片</option>
              </select>

              <div id="ArticleContentContainer">
              <h2 class="articleTitleModal"></h2>
              <textarea class="form-control giveArticleContent" rows="10"></textarea>
              </div>

              <div style="display:none;" id="photoUploadContainer">
              <div class="mb-3"><h2>照片上傳</h2></div>
               <div class="select-list">
                  <input class="" multiple accept=".jpg,.jpeg ,.png" type="file" name="photo_file" id="photo_file" />
               </div>
              </div>

              <h2 class="modal-title">文章分數</h2>
              <select class="giveArticleScores">
                     <option selected value="0">0</option>
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
            </div>
	    <div class="modal-footer">
              <span class ="articleTimeModal" style="display:none"></span>
              <button type="button" class="btn btn-success teacherCommentsBtnSave" data-dismiss="modal">儲存</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
            </div>
          </form>
          </div>
        </div>
      </div>
   </div>
    @include('template.footer')
    <script>
      var getTitle='';

      function validateFile(){
         const allowedExtensions =  ['jpg','png','jpeg','JPG','PNG','JPEG'],
               sizeLimit = 1000000; // 1 megabyte，1MB的意思

         // destructuring file name and size from file object
         const { name:fileName, size:fileSize } = this.files[0];

         /*
         * if filename is apple.png, we split the string to get ["apple","png"]
         * then apply the pop() method to return the file extension
         *
         */
         const fileExtension = fileName.split(".").pop();

         /* 
            check if the extension of the uploaded file is included 
            in our array of allowed file extensions
         */
         if(!allowedExtensions.includes(fileExtension)){
            alert("照片只能上傳jpg/jpeg/png 哦!");
            this.value = null;
         }else if(fileSize > sizeLimit){
            alert("檔案大小需小於1MB，可至此網址壓縮 https://squoosh.app/")
            this.value = null;
         }
   }

   document.getElementById("photo_file").addEventListener("change", validateFile);





      $('#teacherFeedBackType').on('change',function(){
        if($(this).val()==0){
          $('#ArticleContentContainer').css('display','block');
          $('#photoUploadContainer').css('display','none');
        }else{
          $('#ArticleContentContainer').css('display','none');
          $('#photoUploadContainer').css('display','block');
        }
      });

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

      $('.showContent3').click(function(){
        var nowContent=$(this).parent().find('.textShow').text();
        if($(this).data('teacherphoto')!=null && $(this).data('teacherphoto')!="" && $(this).data('teacherphoto')!=undefined){
          let photo_html='<img src="{{ asset('storage/teacher_response_photo') }}'+'/'+$(this).data('teacherphoto')+'"'+' alt="teacherphoto" width="100%;">';
          $('.modalArticleContent').html(photo_html);
        }else{
          $('.modalArticleContent').html(nowContent.replace(/\n/g,"<br/>"));
        }
          $('#articleContent').trigger('click');
      });



      $('.showContent2').click(function(){
        var nowContent=$(this).parent().find('.textShow2').text();
          $('.modalArticleContent').html(nowContent.replace(/\n/g, "<br/>"));
          $('#articleContent').trigger('click');
      });


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
        
        //判斷回復種類
        var teacherResponseType=$(this).parent().parent().find('#teacherFeedBackType').val();
        var canSubmit=false,photo_path=$(this).parent().parent().find('#photo_file').val(),articleContent=$(this).parent().parent().find('.giveArticleContent').val();
        if(teacherResponseType==0){//選擇文字回復
          if(articleContent!="" && articleContent!=null){
            canSubmit=true;
          }else{
            canSubmit=false;
          }

        }else{//選擇照片回復
          if(photo_path!="" && photo_path!=null){
            canSubmit=true;
          }else{
            canSubmit=false;
          }
        }
        
        if(canSubmit  && scorecheck){
          var takeAllValue = new FormData($('#teacherInfoList')[0]);
          takeAllValue.append('articleTeacherComment',articleContent);
          takeAllValue.append('articleTeacherScores',$(this).parent().parent().find('.giveArticleScores').val());
          takeAllValue.append('articleTitleFind',getNowTitle);
          takeAllValue.append('articleTimeFind',getNowTime);
          $.ajax({
	                url:'/updateComments',
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
			            // data:{articleTeacherComment:articleContent,articleTeacherScores:$(this).parent().parent().find('.giveArticleScores').val(),articleTitleFind:getNowTitle, articleTimeFind:getNowTime},
                  data:takeAllValue,
                  type:'POST',
                  processData: false,
                  contentType: false,
                  success:function(suMessage){
                     if(suMessage['status']==200){
                        window.location.href="{{url('/checkArticle')}}";
                     }else{
                        $('#errormessageDiv').css('display','block');
                        $('#errormessageDiv').text(suMessage['message']);
                     }
                  }
               }).fail(function(eMe){
                  alert('請聯繫管理員');
                  $(this).attr('disabled',false);
               });

               $(this).parent().parent().find('.giveArticleContent').val('');
               $(this).parent().parent().find('.giveArticleScores').val(0);

                }else if(teacherResponseType==0){
                  if((articleContent=="" || articleContent==null) && !scorecheck){
                      alert('評語未輸入，分數格式不正確，只能輸入數字!');
                      $(this).attr('disabled',false);
                    }else if(articleContent=="" || articleContent==null){
                      alert('評語未輸入!');
                      $(this).attr('disabled',false);
                    }else if(!scorecheck){
                      alert('分數格式不正確，只能輸入數字!');
                      $(this).attr('disabled',false);
                  }
                }else{
                  if((photo_path=="" || photo_path==null) && !scorecheck){
                      alert('照片未上傳，分數格式不正確，只能輸入數字!');
                      $(this).attr('disabled',false);
                    }else if(photo_path=="" || photo_path==null){
                      alert('照片未上傳!');
                      $(this).attr('disabled',false);
                    }else if(!scorecheck){
                      alert('分數格式不正確，只能輸入數字!');
                      $(this).attr('disabled',false);
                  }
                  
                }
        
        
      });

      


    </script>
    </body>
</html>
