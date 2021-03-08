<!doctype html>
<html lang="en">
  <head>
    
    @include('template.library')
    {{--JS 放置區 --}}
  
    {{--CSS 放置區--}}
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <link rel="stylesheet" href="{{asset('css/material.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/registerSplit.css')}}" />
  </head>
  @include('template.topper')
  <body>
     <!--start -->
<script src="//cdn.holmesmind.com/js/rtid.js"></script>
<script src="//dmp.eland-tech.com/dmpreceiver/eland_tracker.js"></script>
<script>
clickforce_rtid("9465002");
ElandTracker.Track({'source':'CAP9465',
'trackType':'click',
'trackSubfolderDepth':3,
'targetType':'register'
});
</script>
<!-- Website track (tracker.js) - B.I.DMP By ClickForce -->
<script async src="https://cdn.holmesmind.com/dmp/cft/tracker.js"></script>
<script>
  
  var that=this;
  window.cft=window.cft||function(){(cft.q=cft.q||[]).push([].slice.call(arguments))};

  function delayLoading(){
    window.setTimeout(that.loadJs,1000);
  }

  function myCFT(){
    cft('setSiteId', 'CF-210300085348');
  }

  function setSite(){
    window.setTimeout(that.myCFT,1000);
  }

  function loadJs(){
  cft('setEnableCookie');
  cft('setTPCookie');
  setSite();
  }

  delayLoading();
</script>
<script>

  function triggerEvent(){
   cft('send', 'event', {
    action: 'register',
    category: '',
    label: '',
  });
  }

  function triggerCFT(){
    window.setTimeout(that.triggerEvent,4000);
  }

  triggerCFT();
</script>
<!--end -->

   <div>
      <div id="" class="">
         <div class="">
            <div class="side side-left">
               
               <div id="studentRegister" class="intro-content">
               <div class="profile"><img src="{{asset('images/profile1.jpg')}}" alt="profile1"></div>
                  <h1><span>學員</span><span>註冊</span></h1>
               </div>
               <div class="overlay"></div>
            </div>
            <div class="side side-right">
               <div id="teacherRegister" class="intro-content">
                  <div class="profile"><img src="{{asset('images/profile2.jpg')}}" alt="profile2"></div>
                  <h1><span>教練</span><span>註冊</span></h1>
               </div>
            </div>
         </div><!-- /intro -->
      </div><!-- /splitlayout -->
      
   </div><!-- /container -->
   {{-- @include('template.footer') --}}
   
    
    
    <script>
     $('#studentRegister').on('click',function(){
        window.location.href="{{url('/register/student')}}"
     });

     $('#teacherRegister').on('click',function(){
      window.location.href="{{url('/register/teacher')}}"
     });
    </script>
    </body>
</html>
