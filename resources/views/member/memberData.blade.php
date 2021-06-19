<!doctype html>
<html lang="en">
  <head>
    
    @include('template.library')
    {{--JS 放置區 --}}
  <script src="{{asset('js/register.js')}}"></script>
  <script src="{{asset('js/selectPicker.js')}}"></script>
    {{--CSS 放置區--}}
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <link rel="stylesheet" href="{{asset('css/material.css')}}">
    <link rel="stylesheet" href="{{asset('css/selectPicker.css')}}">
  

  </head>
  @include('template.topper')
  <body>

    
    <div class="main">
      <div class="container">
         <form  class="appointment-form"  id="appointment-form" name="userRegister" autocomplete="off">
            {{csrf_field()}}
            
         <h2 class="mb-3">{{$whoRegister}}會員資料</h2>
            <div class="form-group-1">
               <div class="mb-3"><h3>姓名</h3></div>
               <h5 class="mb-5 mt-5">{{$getUserData->name}}</h5>
               <div class="mb-3"><h3>信箱</h3></div>
               <h5 class="mb-5 mt-5">{{$getUserData->email}}</h5>
               <div class="mb-3"><h3>生日</h3></div>
               <h5 class="mb-5 mt-5">{{$getUserData->birth}}</h5>
               <div class="mb-3"><h3>手機號碼</h3></div>
               <h5 class="mb-5 mt-5">{{$getUserData->phone}}</h5>
               <div class="mb-3"><h3>居住地</h3></div>
               <h5 class="mb-5 mt-5">{{$getUserData->address_main_name}} {{$getUserData->address_sub_name}}</h5>
               <div class="mb-3"><h3>性別</h3></div>
               <h5 class="mb-5 mt-5">
                  @if($getUserData->sex=='male')
                  男生
                  @else
                  女生
                  @endif
               </h5>

               @if($whoRegister=='學生')
               <div class="mb-3"><h2>會員身分</h2></div>
               <div class="select-list">
                  <select name="member_rate" id="member_rate" disabled>
                     <option slected value="1">基礎會員</option>
                     <option value="2">進階會員</option>
                     <option value="3">白金會員</option>
                  </select>
               </div>
               @endif
               

               <div class="mb-3"><h2>{{$whoRegister}}教程</h2></div>
               <div class="select-list">
                  <select class="selectpicker form-control" name="lession_select" title="可複選" id="lession_select" disabled multiple>
                     <option slected value="1">中文課程</option>
                     <option value="2">英文課程</option>

                  </select>
               </div>
               
               <div class="select-list">
                  <div class="mb-3"><h3>年齡</h3></div>
                  <select name="age" id="age">
                     <option value="1">12 以下</option>
                     <option value="2">12-15</option>
                     <option value="3">15-18</option>
                     <option value="4">18-24</option>
                     <option value="5">24-50</option>
                     <option value="6">50-70</option>
                  </select>
               </div>

               <div class="select-list">
                  <div class="mb-3"><h3>興趣</h3></div>
                  <select class="selectpicker form-control"  name="habit" id="habit" title="可複選" multiple>
                     <option slected value="1">體育運動</option>
                     <option value="2">戶外活動</option>
                     <option value="3">旅遊</option>
                     <option value="4">閱讀</option>
                     <option value="5">寫作</option>
                     <option value="6">影像創作/賞析</option>
                     <option value="7">繪畫</option>
                     <option value="8">音樂創作/賞析</option>
                     <option value="9">棋藝</option>
                     <option value="10">廚藝烘培</option>
                     <option value="11">手作物</option>
                     <option value="12">收藏</option>
                     <option value="13">電競遊戲</option>
                     <option value="14">其他</option>
                  </select>
               </div>
               <div class="mb-3"><h2>職業</h2></div>
               <div class="select-list">
                  <select name="profession" id="profession">
                     <option slected value="1">金融保險／財會／稽核</option>
                     <option value="2">管理幕僚／人資／行政</option>
                     <option value="3">行銷／企劃／專案管理</option>
                     <option value="4">法務專利 / 顧問諮詢</option>
                     <option value="5">生活服務 / 農林漁牧</option>
                     <option value="6">採購物流 / 品質檢測</option>
                     <option value="7">操作／維修／技術服務</option>
                     <option value="8">營建／製圖／施作</option>
                     <option value="9">業務/貿易/客服/門市</option>
                     <option value="10">軍警消防 / 保全相關</option>
                     <option value="11">醫療／護理／保健</option>
                     <option value="12">美容美髮 / 餐飲旅遊</option>
                     <option value="13">幼教才藝 / 補習進修</option>
                     <option value="14">美編設計 / 裝潢設計</option>
                     <option value="15">影視傳媒 / 出版翻譯</option>
                     <option value="16">機械模具 / 生產製程</option>
                     <option value="17">電腦系統/資訊/軟硬體</option>
                     <option value="18">生物科技 / 化學製藥</option>
                     <option value="19">學術研究 / 教育師資</option>
		     <option value="20">光電IC / 電子通訊</option>
                     <option value="21">學生</option>
                     {{-- <option value="21">其他</option> --}}
                  </select>
                  <div style="display:none;" id="professionOtherDIV">
                     <h3>其他:</h3>
                     <input type="text" name='professionOther' id="professionOther"  />
                  </div>
               </div>
               
               <div class="mb-3"><h2>身分</h2></div>
               <div class="select-list">
                  <select name="education" id="education">
                     <option slected value="1">小學生</option>
                     <option value="2">國中生</option>
                     <option value="3">高中生</option>
                     <option value="4">大學生</option>
                     <option value="5">碩博士</option>
                     <option value="6">上班族</option>
                     <option value="7">退休</option>
                  </select>
               </div>

               @if($whoRegister=='學生')
               <div class="mb-3"><h2>閱讀領域</h2></div>
               <div class="select-list">
                  <select class="selectpicker form-control" name="read_position" title="可複選" id="read_position" multiple>
                     <option slected value="1">文學小說</option>
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
                  </select>
               </div>
               @endif

               <div class="mb-3"><h2>寫作領域</h2></div>
               <div class="select-list">
                  <select class="selectpicker form-control" name="write_position" title="可複選" id="write_position" multiple>
                     <option slected value="1">文學小說</option>
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
                  </select>
               </div>

               @if($whoRegister=='學生')
               <div class="mb-3"><h2>寫作頻率(週)</h2></div>
               <div class="select-list">
                  <select name="write_frequency" id="write_frequency">
                     <option slected value="1">0-1</option>
                     <option value="2">2-4</option>
                     <option value="3">5-7</option>
                     <option value="4">7以上</option>
                  </select>
               </div>

               <div class="mb-3"><h2>寫作經歷</h2></div>
               <div class="select-list">
                  <select name="write_experience" id="write_experience">
                     <option slected value="1">作業</option>
                     <option value="2">日記/部落格</option>
                     <option value="3">成功投稿</option>
                     
                  </select>
               </div>

               <div class="mb-3"><h2>寫作目的</h2></div>
               <div class="select-list">
                  <select name="write_purpose" id="write_purpose">
                     <option slected value="1">考試升學</option>
                     <option value="2">作文教師</option>
                     <option value="3">部落格經營</option>
                     <option value="4">專欄作家</option>
                     <option value="5">出版書籍</option>
                     <option value="6">文案能力</option>
                     <option value="7">興趣或其他</option>
                  </select>
               </div>
               @endif

               @if($whoRegister!='學生')
               <div class="mb-3"><h2>教學領域</h2></div>
               <div class="select-list">
                  <select class="selectpicker form-control" name="teach_position" title="可複選" id="teach_position" multiple>
                     <option slected value="1">文學小說</option>
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
                  </select>
               </div>

               <div class="mb-3"><h2>教學經歷</h2></div>
               <div class="select-list">
                  <select class="" name="teach_experience" id="teach_experience">
                     <option slected value="1">無</option>
                     <option value="2">國小老師</option>
                     <option value="3">國中老師</option>
                     <option value="4">高中老師</option>
                     <option value="5">文學教授</option>
                     <option value="6">接案指導</option>
                     <option value="7">商業寫作</option>
                  </select>
               </div>

               <div class="mb-3"><h2>教學年資</h2></div>
               <div class="select-list">
                  <select class="" name="teach_years"  id="teach_years">
                     <option slected value="1">0</option>
                     <option value="2">1-2</option>
                     <option value="3">3-4</option>
                     <option value="4">5以上</option>
                  </select>
               </div>
               @endif


               <div class="mb-3"><h2>大頭貼上傳</h2></div>
               <div class="select-list">
                  <input class="" multiple accept=".jpg,.jpeg,.png" type="file" name="photo_file" id="photo_file" />
               </div>

            </div>
            
            {{--take value--}}
            <input style="display:none;" type="text" name="who" value="{{$whoRegister}}"/>

         </form>
         <div class="form-submit">
            <button id="btnSubmit" class="btn btn-primary mb-5">儲存</button>
            <div id="errormessageDiv" class="mt-3" style="color:red;display:none;font-size:20px;font-weight:bold;"></div>
            @if($errors->first('alreadyExist'))
            <h3 class="mt-3" style="color:red;">{{$errors->first('alreadyExist')}}</h3>
            @endif
         </div>
      </div>
   </div>
    @include('template.footer')
   
    
    
    <script>
       $('#age').val({{$getUserData->age}});
       var habitValue='{{$getUserData->habit}}';
       habitValue=habitValue.split(',');
       $('#habit').val(habitValue);

       $('#lession_select').val({{$getUserData->lession_select}});
       var lession_select='{{$getUserData->lession_select}}';
       lession_select=lession_select.split(',');
       $('#lession_select').val(lession_select);
      
       @if($whoRegister=='學生')
       var member_rate='{{$getUserData->member_rate}}';
       member_rate=member_rate.split(',');
       $('#member_rate').val(member_rate);
       @endif

       var write_positionValue='{{$getUserData->write_position}}';
       write_positionValue=write_positionValue.split(',');
       $('#write_position').val(write_positionValue);
       $('#profession').val({{$getUserData->profession}});
       $('#education').val({{$getUserData->education}});

       @if($whoRegister=='學生')
       var read_positionValue='{{$getUserData->read_position}}';
       read_positionValue=read_positionValue.split(',');
       $('#read_position').val(read_positionValue);
       $('#write_frequency').val({{$getUserData->write_frequency}});
       $('#write_experience').val({{$getUserData->write_experience}});
       $('#write_purpose').val({{$getUserData->write_purpose}});
       @else
       var teach_positionValue='{{$getUserData->teach_position}}';
       teach_positionValue=teach_positionValue.split(',');
       $('#teach_position').val(teach_positionValue);
       $('#teach_experience').val({{$getUserData->teach_experience}});
       $('#teach_years').val({{$getUserData->teach_years}});
       @endif


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



         $('#btnSubmit').on('click',function(){
            $(this).attr('disabled',true);
            var errorMessage='';

            if($('#write_position').val()==0){
                  errorMessage+=' 寫作領域尚未選擇 ';
               }

            if($('#habit').val()==0){
               errorMessage+=' 興趣尚未選擇 ';
            }

            @if($whoRegister=='學生')
               if($('#read_position').val()==0){
                  errorMessage+=' 閱讀領域尚未選擇 ';
               }
            @else
               if($('#teach_position').val()==0){
                     errorMessage+=' 教學領域尚未選擇 ';
                  }
            @endif


            if(errorMessage!=""){
               $('#errormessageDiv').css('display','block');
               $('#errormessageDiv').text(errorMessage);
               $(this).attr('disabled',false);
            }else{
               $('#errormessageDiv').css('display','none');
               
               var takeAllValue=$('#appointment-form').serializeArray();
               var takeAllFormValue = new FormData($('#appointment-form')[0]);

               @if($whoRegister=='學生'){
                  takeAllValue=takeAllValue.filter(function(element){
                     return element.name!="habit" && element.name!="write_position" && element.name!="read_position";
                  });
                  // takeAllValue.push({name:'habit',value:$('#habit').val()});
                  // takeAllValue.push({name:'write_position',value:$('#write_position').val()});
                  // takeAllValue.push({name:'read_position',value:$('#read_position').val()});

                  takeAllFormValue.append('habit',$('#habit').val());
                  takeAllFormValue.append('write_position',$('#write_position').val());
                  takeAllFormValue.append('read_position',$('#read_position').val());

               }@else{
                  takeAllValue=takeAllValue.filter(function(element){
                     return element.name!="habit" && element.name!="write_position" && element.name!="teach_position";
                  });
                  // takeAllValue.push({name:'habit',value:$('#habit').val()});
                  // takeAllValue.push({name:'write_position',value:$('#write_position').val()});
                  // takeAllValue.push({name:'teach_position',value:$('#teach_position').val()});

                  takeAllFormValue.append('habit',$('#habit').val());
                  takeAllFormValue.append('write_position',$('#write_position').val());
                  takeAllFormValue.append('teach_position',$('#teach_position').val());
               }
               @endif

               
               $.ajax({
                  url:'/updateMember',
                  data:takeAllFormValue,
                  processData: false,
                  contentType: false,
                  type:'POST',
                  success:function(suMessage){
                     if(suMessage['status']==200){
                        window.location.href="{{url('/')}}";
                     }else{
                        $('#errormessageDiv').css('display','block');
                        $('#errormessageDiv').text(suMessage['message']);
                        $(this).attr('disabled',false);
                     }
                  }
               }).fail(function(eMe){
                  alert('請聯繫管理員');
               });

            }
            
         });

         


    </script>
    </body>
</html>
