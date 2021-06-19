<!doctype html>
<html lang="en">
  <head>
    
    @include('template.library')
    {{--JS 放置區 --}}
  
    {{--CSS 放置區--}}
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
  <link href="{{asset('css/loginPage.css')}}" rel="stylesheet">
<style>
#password {
    -webkit-text-security: disc;
}

</style>
  </head>
  @include('template.topper')
  <body style="background: #b9c8e0;">
    <div class="wrapper fadeInDown">
        <div id="formContent">
        <form class="mt-5" method="POST" action="{{url('/login')}}">
            {{csrf_field()}}
            <h4 class="fadeIn second" style="">信箱</h4>
            <input type="text" id="login" class="fadeIn second" name="userEmail" placeholder="Email">
            <h4 class="fadeIn third">密碼</h4>
            <input type="text" id="password" class="fadeIn third" name="userPwd" placeholder="password" autocomplete="off">
            <input type="submit" class="fadeIn fourth" value="Log In">
          </form>
          @if($errors->first('error'))
            <div class="mt-3 fadeIn fourth" style="color:red;">{{$errors->first('error')}}</div>
            @endif
          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" style="cursor: pointer;" data-toggle="modal" data-target="#forgotPW">忘記密碼?</a>
          </div>
      
        </div>
      </div>
      @include('template.footer')
    
      <!-- Modal -->
  <div class="modal fade" id="forgotPW" tabindex="-1" role="dialog" aria-labelledby="forgotPWTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title" id="exampleModalLongTitle"><b>忘記密碼</b></h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form name="forgotPWForm" action="{{url('/forgotPassword')}}" method="POST">
          {{csrf_field()}}
          <h4><b>您註冊的信箱</b></h4>
          <input class="input_change" type="text" id="useremail" name="useremail" placeholder=""/>
          </form>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-primary" id="forgotPWBtn">確認</button>
        </div>
      </div>
    </div>
  </div>
    <script>
    $('#forgotPWBtn').click(function(){
      $(this).attr('disabled',true);
      if($('#useremail').val()=="" || $('#userName').val()=="" || $('#userSex').val()=="" || $('#userBirth').val()=="" || $('#userPhone').val()==""){
        alert('尚有資料未填寫');
        $(this).attr('disabled',false);
      }else{
        document.forgotPWForm.submit();
      }
    });
    @if($errors->first('forgotPWMessage'))
    alert('{{$errors->first('forgotPWMessage')}}');
    $(this).attr('disabled',false);
    @endif

    var dateControl = document.querySelector('input[type="date"]');
    dateControl.value = '1990-01-01';
    </script>
    </body>
</html>
