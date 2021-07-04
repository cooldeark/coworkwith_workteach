<!doctype html>
<html lang="en">
  <head>
    
    @include('template.library')
    {{--JS 放置區 --}}
  <script src="{{asset('js/register.js')}}"></script>
    {{--CSS 放置區--}}
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <link rel="stylesheet" href="{{asset('css/material.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <style>

.shadow-textarea textarea.form-control::placeholder {
    font-weight: 300;
}
.shadow-textarea textarea.form-control {
    padding-left: 0.8rem;
}

.container {
    width: 800px;
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

    
    <div class="main">
      <div class="container">
         <form  class="appointment-form"  id="appointment-form" name="userRegister" autocomplete="off" enctype="multipart/form-data" >
            {{csrf_field()}}
         @if(isset($getMissionInfo))
         <h2 class="mb-3"></h2>
         @else
         <h2 class="mb-3">繳交文章</h2>
         <p style="color:grey;">任務包文章請到「我的任務」頁面繳交，才能領取額外經驗值獎勵哦！</p>
         @endif
            <div class="form-group-1">
               @if(isset($getMissionInfo))
               <div class=" mt-5 mb-5"><h3>此次任務目標</h3></div>
               <div class="missionList col">
                  <p class="mb-2"><b>任務描述:</b>   </p>
                  <p class="mb-2">{{$getMissionInfo['mission_description']}}</p>
                  <p class="mb-2"><b>額外獎勵:</b>   {{$getMissionInfo['bonus_score']}}Exp</p>
                  <p class="mb-2"><b>課程分類:</b>   {{config('memberProfile.lession_type')[$getMissionInfo['lession_type']]}}</p>
                  <p class="mb-2"><b>任務文章分類需選擇:</b>   {{config('memberProfile.category')[$getMissionInfo['achieve_category']]}}</p>
                  <p class="mb-2"><b>任務字數需滿:</b>   {{$getMissionInfo['achieve_words']}}字</p>
               </div>
               @endif

               <div class="select-list">
                  <div class=" mt-5 mb-5"><h3>繳交課程選擇</h3></div>
                  @if(isset($getMissionInfo))
                  <select name="chooseLessionType" id="chooseLessionType" disabled>
                     <option value="{{$getMissionInfo['lession_type']}}" selected>{{config('memberProfile.lession_type')[$getMissionInfo['lession_type']]}}</option>
                  </select>
                  @else
                  <select name="chooseLessionType" id="chooseLessionType">
                     <option value="0">請選擇</option>
                     @foreach($getStudentLessionType as $lessionValue)
                     <option value="{{$lessionValue}}">{{config('memberProfile.lession_type')[$lessionValue]}}</option>
                     @endforeach
                  </select>
                  @endif
                 </div>

                 <div class="select-list">
                  <div class=" mt-5 mb-5"><h3>繳交形式選擇</h3></div>
                  <select name="chooseUploadType" id="chooseUploadType">
                     <option value="1" selected>文字</option>
                     <option value="2">照片</option>
                     <option value="3">Google連結</option>
                  </select>
                  <div id="tipsByPhoto" style="display:none;color:grey;"><b>如照片超過1張或是想上傳 Word檔/影音檔，請使用Google連結上傳給老師看。</b></div>
                 </div>

               <div class="mb-5 mt-5"><h3>文章標題</h3></div>
               <input type="text" name="articleTitle" id="articleTitle" placeholder="" required />
               <div class="select-list">
                <div class=" mt-5 mb-5"><h3>文章分類</h3></div>
                @if(isset($getMissionInfo))
                <select name="chooseCategory" id="chooseCategory" disabled>
                <option value="{{$getMissionInfo['achieve_category']}}" selected>{{config('memberProfile.category')[$getMissionInfo['achieve_category']]}}</option>
               </select>
                @else
                <select name="chooseCategory" id="chooseCategory">
                  <option value="100">請選擇</option>
                  <option value='0'>學員修改後文章(二次繳交用)</option>
                  <option value="1">文學小說</option>
                  <option value="2">詩集</option>
                  <option value="3">心理勵志</option>
                  <option value="4">藝術設計</option>
                  <option value="5">觀光旅遊</option>
                  <option value="6">美食饗宴</option>
                  <option value="7">行銷文案</option>
                  <option value="8">商業理財</option>
                  <option value="9">人文史地</option>
                  <option value="10">自然科普</option>
                  <option value="11">漫畫圖文</option>
                  <option value="12">其他</option>
               </select>
                @endif
                
               </div>

               <div class="select-list chineseList" style="display:none;">{{--中文課程老師清單--}}
                <div class=" mt-5 mb-5"><h3>批改老師(<a href="https://cowrite30.com/2019/12/22/2020-writingcoach/" target="_blank">介紹</a>)</h3></div>
                <select name="chooseChineseTeacher" id="chooseChineseTeacher">
                   <option value="0">請選擇</option>
                   @foreach($teacherLessionChinese as  $listIndex=>$listValue)
                    <option value="{{$listIndex}}">{{$listValue}}</option>
                   @endforeach
                </select>
               </div>

               <div class="select-list EnglishList" style="display:none;">{{--英文課程老師清單--}}
                  <div class=" mt-5 mb-5"><h3>批改老師(<a href="https://cowrite30.com/2019/12/22/2020-writingcoach/" target="_blank">介紹</a>)</h3></div>
                  <select name="chooseEnglishTeacher" id="chooseEnglishTeacher">
                     <option value="0">請選擇</option>
                     @foreach($teacherLessionEnglish as $listIndex=>$listValue)
                      <option value="{{$listIndex}}">{{$listValue}}</option>
                     @endforeach
                  </select>
                 </div>
               
               <div id="textContainer">
                  <div class="mb-3"><h3>文章內容</h3></div>
                  <textarea class="form-control z-depth-1" id="articleContent" name="articleContent" rows="50" placeholder="您的文章內容..."></textarea>
               </div>

               <div id="photoContainer" style="display:none;">
                  <div class="mb-3"><h3>文章內容上傳</h3></div>
                  <input type="file" id="photoUpload" name="uploadFile"/>
               </div>

               <div id="googleLinkContainer" style="display:none;">
                  <div class="mb-3"><h3>Google連結</h3></div>
                  <input type="text" id="googleLinkText" name="googleLinkText"/>
               </div>
               

            </div>
         </form>
         <button class="btn btn-warning mb-5" style="display:none;" data-toggle="modal" data-target="#googleTips">Google連結設定提醒</button>

         <div class="form-submit">
            <button type="button" id="btnSubmit" class="btn btn-primary mb-5">發表</button>
            <div id="errormessageDiv" class="mt-3" style="color:red;display:none;font-size:20px;font-weight:bold;"></div>
            @if($errors->first('alreadyExist'))
            <h3 class="mt-3" style="color:red;">{{$errors->first('alreadyExist')}}</h3>
            @endif
         </div>
      </div>
   </div>

   <!-- Modal start-->
   <div class="modal fade" id="googleTips" tabindex="-1" role="dialog" aria-labelledby="googleTipsTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLongTitle">提醒內容</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="font-size: 16px;">
            <h3>1.請點選我的雲端硬碟，並在名稱的地方點下滑鼠右鍵，新增資料夾。</h3>
            <img src="{{asset('storage/google_link_photo/google_link_001.jpg')}}" alt="google001"/>
            <h3 class="mt-5">2.資料夾名稱可以命名為給老師的照片或是給老師的作品。</h3>
            <img src="{{asset('storage/google_link_photo/google_link_002.jpg')}}" alt="google002"/>
            <h3 class="mt-5">3.點選要給老師看作品的資料夾，並點選共用。</h3>
            <img src="{{asset('storage/google_link_photo/google_link_003.jpg')}}" alt="google003"/>
            <h3 class="mt-5">4.點選共用後，請點選變更。</h3>
            <img src="{{asset('storage/google_link_photo/google_link_006.jpg')}}" alt="google006"/>
            <h3 class="mt-5">5.請將知道連結的人，下拉選單請調整為編輯者。</h3>
            <img src="{{asset('storage/google_link_photo/google_link_007.jpg')}}" alt="google007"/>
            <h3 class="mt-5">6.點選複製連結，並將連結填入Google連結裡，老師就能看到你寫的作品囉!</h3>
            <img src="{{asset('storage/google_link_photo/google_link_008.jpg')}}" alt="google008"/>
            <img src="{{asset('storage/google_link_photo/google_link_004.jpg')}}" alt="google004"/>
            <img src="{{asset('storage/google_link_photo/google_link_005.jpg')}}" alt="google005"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal end-->
    @include('template.footer')
   
    
    
    <script>
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
   document.getElementById("photoUpload").addEventListener("change", validateFile);

   @if(isset($getMissionInfo))
   if($('#chooseLessionType').val()==1){//中文課程
      $('.chineseList').css('display','block');
      $('.englishList').css('display','none');
   }else if($('#chooseLessionType').val()==2){//英文課程
      $('.chineseList').css('display','none');
      $('.englishList').css('display','block');
   }
   @endif
      
      $('#btnSubmit').on('click',function(){
         var that=$(this);
        $(this).attr('disabled',true);

        var checkTitle=false,checkContent=false,checkCategory=false,errorMessage='',checkLessionType=false;
	var getTitle=$('#articleTitle').val();
        var changeTitle=getTitle.replaceAll('　','');
	changeTitle=changeTitle.replaceAll(' ','');

	var getContent=$('#articleContent').val();
         var changeContent=getContent.replaceAll('　','');
	changeContent=changeContent.replaceAll(' ','');

        if($('#articleTitle').val()!='' && $('#articleTitle').val()!=undefined && changeTitle.length>0){
            checkTitle=true;
        }else{
            errorMessage+=' 文章標題尚未填寫 ';
        }

        if($('#chooseLessionType').val()==0){
            errorMessage+=' 課程類別尚未選擇 ';
        }else{
         checkLessionType=true;
        }

        //這裡要先判別是文字還圖片還是google連結
        if($('#chooseUploadType').val()==1){//文章
            if($('#articleContent').val()!='' && $('#articleContent').val()!=undefined &&changeContent.length>0){
               checkContent=true;
         }else{
               errorMessage+=' 文章內容尚未填寫 ';
         }
        }else if($('#chooseUploadType').val()==2){//照片
            if($('#photoUpload').val()=='' ){
               errorMessage+=' 文章內容尚未上傳 ';
            }else{
               checkContent=true;
            }
        }else if($('#chooseUploadType').val()==3){//google連結
            if($('#googleLinkText').val()=='' ){
               errorMessage+=' Google連結尚未填寫 ';
            }else{
               checkContent=true;
            }
        }
        

        if($('#chooseCategory').val()==100){
            errorMessage+=' 請選擇文章分類 ';
        }else{
            checkCategory=true;
        }

        if(errorMessage!=""){
               $('#errormessageDiv').css('display','block');
	       $('#errormessageDiv').text(errorMessage);
	       $(this).attr('disabled',false);
            }else{
               $('#errormessageDiv').css('display','none');
            }

        if(errorMessage==''){
            // var takeAllValue=$('#appointment-form').serializeArray();
            var takeAllValue = new FormData($('#appointment-form')[0]);

            //確認有任務時，才會在takeAllValue增加值
            @if(isset($getMissionInfo))
               let missionID="{{$getMissionInfo['id']}}";    
               let missionStatus="{{$getMissionInfo['complete_status']}}"; 
               let whoGetMission="{{$getMissionInfo['who_get_mission']}}"; 
               takeAllValue.append('missionID',missionID);
               takeAllValue.append('missionStatus',missionStatus);
               takeAllValue.append('whoGetMission',whoGetMission);
            @endif

            takeAllValue.append('chooseLessionType',$('#chooseLessionType').val());
            takeAllValue.append('chooseCategory',$('#chooseCategory').val());
            $.ajax({
                  url:'/articleCreate',
                  data:takeAllValue,
                  processData: false,
                  contentType: false,
                  type:'POST',
                  dataType:'json',
                  success:function(suMessage){
                     if(suMessage['status']==200){
                        alert('您的文章已經傳送給老師囉！預計七天內給予指導及回饋。');
                        window.location.href="{{url('/studentArticleList')}}";
                     }else if(suMessage['status']==201){
                        alert(suMessage['message']);
                     }else{
                        $('#errormessageDiv').css('display','block');
                        $('#errormessageDiv').text(suMessage['message']);
                     }
                     that.attr('disabled',false);
                  }
               }).fail(function(eMe){     
                  alert('請聯繫管理員');
                  that.attr('disabled',false);
               });
        }
        
        
      });


      $('#chooseLessionType').on('change',function(){
         if($(this).val()==1){
            $('.chineseList').css('display','block');
            $('.EnglishList').css('display','none');
         }else if($(this).val()==2){
            $('.chineseList').css('display','none');
            $('.EnglishList').css('display','block');
         }else{
            $('.chineseList').css('display','none');
            $('.EnglishList').css('display','none');
         }
      });

      $('#chooseUploadType').on('change',function(){
         if($(this).val()==1){//文章
            $('#textContainer').css('display','block');
            $('#photoContainer').css('display','none');
            $('#googleLinkContainer').css('display','none');
            $('#tipsByPhoto').css('display','none');
            $('.btn-warning').css('display','none');
         }else if($(this).val()==2){//照片
            $('#textContainer').css('display','none');
            $('#photoContainer').css('display','block');
            $('#googleLinkContainer').css('display','none');
            $('#tipsByPhoto').css('display','block');
            $('.btn-warning').css('display','none');
         }else if($(this).val()==3){//google連結
            $('#textContainer').css('display','none');
            $('#photoContainer').css('display','none');
            $('#googleLinkContainer').css('display','block');
            $('#tipsByPhoto').css('display','block');
            $('.btn-warning').css('display','block');
         }
      });

      @if($errors->any())
         alert("{{$errors->first("missionNotAchieve")}}");
      @endif

    </script>
    </body>
</html>
