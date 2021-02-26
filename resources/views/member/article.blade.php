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
         <form  class="appointment-form"  id="appointment-form" name="userRegister" autocomplete="off">
            {{csrf_field()}}
            
         <h2 class="mb-3">繳交文章</h2>
            <div class="form-group-1">
               <div class="mb-5 mt-5"><h3>文章標題</h3></div>
               <input type="text" name="articleTitle" id="articleTitle" placeholder="" required />
               <div class="select-list">
                <div class=" mt-5 mb-5"><h3>文章分類</h3></div>
                <select name="chooseCategory" id="chooseCategory">
		   <option value="12">請選擇</option>
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
                </select>
               </div>
               <div class="select-list">
                <div class=" mt-5 mb-5"><h3>批改老師(<a href="https://cowrite30.com/2019/12/22/2020-writingcoach/" target="_blank">介紹</a>)</h3></div>
                <select name="chooseTeacher" id="chooseTeacher">
                   <option value="0">請選擇</option>
                   @foreach($teacherList as $listValue)
                    <option value="{{$listValue['id']}}">{{$listValue['name']}}</option>
                   @endforeach
                </select>
               </div>
               <div class="mb-3"><h3>文章內容</h3></div>
               <textarea class="form-control z-depth-1" id="articleContent" name="articleContent" rows="50" placeholder="您的文章內容..."></textarea>
               
            </div>
         </form>
         <div class="form-submit">
            <button type="button" id="btnSubmit" class="btn btn-primary mb-5">發表</button>
            <div id="errormessageDiv" class="mt-3" style="color:red;display:none;font-size:20px;font-weight:bold;"></div>
            @if($errors->first('alreadyExist'))
            <h3 class="mt-3" style="color:red;">{{$errors->first('alreadyExist')}}</h3>
            @endif
         </div>
      </div>
   </div>
    @include('template.footer')
   
    
    
    <script>
      
      
      $('#btnSubmit').on('click',function(){
        $(this).attr('disabled',true);
        
        var checkTitle=false,checkContent=false,errorMessage='';
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

        if($('#articleContent').val()!='' && $('#articleContent').val()!=undefined &&changeContent.length>0){
            checkContent=true;
        }else{
            errorMessage+=' 文章內容尚未填寫 ';
        }

        if(errorMessage!=""){
               $('#errormessageDiv').css('display','block');
	       $('#errormessageDiv').text(errorMessage);
	       $(this).attr('disabled',false);
            }else{
               $('#errormessageDiv').css('display','none');
            }

        if(errorMessage==''){
            var takeAllValue=$('#appointment-form').serializeArray();
            $.ajax({
                  url:'/articleCreate',
                  data:takeAllValue,
                  type:'POST',
                  success:function(suMessage){
                     if(suMessage['status']==200){
                        window.location.href="{{url('/studentArticleList')}}";
                     }else{
                        $('#errormessageDiv').css('display','block');
                        $('#errormessageDiv').text(suMessage['message']);
                     }
                     $(this).attr('disabled',false);
                  }
               }).fail(function(eMe){     
                  alert('請聯繫管理員');
                  $(this).attr('disabled',false);
               });
        }
        
        
      });
      

    </script>
    </body>
</html>
