<!doctype html>
<html lang="en">
  <head>
    
    @include('template.library')
    {{--JS 放置區 --}}
    <script src="{{asset('js/popper.min.js')}}"></script>
    {{--CSS 放置區--}}
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    

  </head>
  @include('template.topper')
  <body>
<!--start -->
<script src="//cdn.holmesmind.com/js/rtid.js"></script>
<script src="//dmp.eland-tech.com/dmpreceiver/eland_tracker.js"></script>
<script src="https://cdn.holmesmind.com/dmp/cft/triggerTracker.js"></script>
<script>
clickforce_rtid("9465001");
ElandTracker.Track({'source':'CAP9465',
'trackType':'view',
'trackSubfolderDepth':3,
'targetType':'pageview'
});
</script>
<!-- Website track (tracker.js) - B.I.DMP By ClickForce -->
<script async src="https://cdn.holmesmind.com/dmp/cft/tracker.js"></script>
<script>
  var clickforceThat=this;
  window.cft=window.cft||function(){(cft.q=cft.q||[]).push([].slice.call(arguments))};
  function clickForceMyyCFT(){
      cft('setSiteId', 'CF-210300085348');
      cft('setViewPercentage');
    }
    clickForceDelayLoading();
</script>
<script>
    function clickForceTriggerEvent(){
      cft('send', 'event', {
        action: 'pageview',
        category: '',
        label: '',
      });
    }
      clickForceTriggerCFT();
</script>
<!--end -->
    

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active" style="background-image: url('../images/banner001.jpg');">
            
            <div class="container">
              <div  class="carousel-caption text-center mb-5">
                <h1><b>專業指導</b></h1>
		<h1><b>讓作文能力大增</b></h1><br></br>
                @if(session::get('userName')==null)
	      <p><a class="btn btn-lg btn-primary" href="{{url('/registerPage')}}" role="button">立即註冊</a></p>
                @endif
              </div>
            </div>
          </div>
          <div class="carousel-item " style="background-image: url('../images/banner008.jpg');">
            
            <div class="container">
              <div class="carousel-caption text-center mb-5">
                <h1 style="color:white;"><b>學員交流</b></h1>
		<h1 style="color:white;background-color:rgba(0,0,0,0.2);"><b>讓寫作不再孤單，讓文字更有溫度</b></h1><br></br>
                @if(Session::get('userName')==null)
                <p><a class="btn btn-lg btn-primary" href="{{url('/registerPage')}}" role="button">立即註冊</a></p>
                @endif
              </div>
            </div>
          </div>
          <div style="background-color:#e6e6dd2b;" class="carousel-item">
            
            <div class="container">
              <div class="carousel-caption text-center" >
                <div class="row">
                  <div class="row col-md-4 mt-5">
                    <h1 style="color:black;"><b>出書是什麼感覺啊⋯⋯</b><br>
                      來，加入我們就會知道了！
                    </h1>
                    
                  </div>
                <img class="col-md-8 featurette-image img-fluid mx-auto" src="{{asset('images/test.jpg')}}" alt="talk02 image"/>
		@if(Session::get('userName')==null)
		<p><a class="btn btn-lg btn-primary" href="{{url('/registerPage')}}" role="button">立即註冊</a></p>
                @endif
              </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      

      <div class="container marketing">

        <div class="h1 text-center mb-5 mt-5"><b>平台特色</b></div>
        
        <div class="row">
          <div class="col-lg-4">
          <img class="rounded-circle" src="{{asset('images/part01.png')}}" alt="Generic placeholder image" width="140" height="140">
            
            <p><div class="text-center"><h2>目標導向</h2></div><br>
              制定個人寫作目標，透過教練指導、自動化配對及線上學習，一步步完成階段性目標。</p>
            
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('images/part02.png')}}" alt="Generic placeholder image" width="140" height="140">
            
            <p><div class="text-center"><h2>職涯發展</h2></div><br>
              讓寫作變成一種工作能力，透過各種文字訓練及業師指導，提升職場競爭力。</p>
            
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('images/part03.png')}}" alt="Generic placeholder image" width="140" height="140">
            
            <p><div class="text-center"><h2>永續學習</h2></div><br>
              學無止盡，持續精進，在探索及成長的過程中，擴大個人影響力，成就個人終身志業。</p>
            
          </div>
        </div>



        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">
        <h1 class="text-center mb-5"><b>課程介紹</b></h1>
        <div class="row featurette">
          <div class="col-md-7">
            
            <h1 class="featurette-heading"><b><a href="https://cowrite30.com/portfolio/cowrite-student-lessons/" target="_blank">素養式寫作訓練</a></b> <span class="text-muted"> 學生組</span></h1>
            <p class="lead">培養學生思辨並恰當運用文字表達之能力，讓孩子學會各科學習統整，加強學習成果表現，以及增進人際互動溝通力。本課程採主題性課程計畫，透過小班制教學，達到因材施教的效果！</p>
          </div>
          <div class="col-md-5">
            
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h1 class="featurette-heading"><b><a href="https://cowrite30.com/portfolio/cowrite-dream-lessons/" target="_blank">滾動式寫作培訓</a></b> <span class="text-muted"> 成人組</span></h1>
            <p class="lead">高中畢業後，有多久沒再練習寫作文，有了文字基礎能力，更要繼續精進學習，從每個月的文章進步，從流水帳到隨心所欲建構文章，從素人晉升為新銳作家，結業後還可以成為特約撰稿或專業書評，並且參加自己的發表會，寫作之路原來可以很有趣！</p>
          </div>
          <div class="col-md-5 order-md-1">
            
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h1 class="featurette-heading"><b><a href="https://cowrite30.com/portfolio/cowrite30-coach-training-lessons/" target="_blank">進階式寫作教學</a></b> <span class="text-muted"> 成人組</span></h1>
            <p class="lead">啟發寫作創意，引導文章架構，協助潤飾文句，修正常見錯誤，這些都是身為寫作教練必備的能力。如果您喜歡教學實務，歡迎參加教練課程，除了可以跟一流講師切磋，還能探索文字浩瀚奧秘！</p>
          </div>
          <div class="col-md-5">
            
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->
        <div class="h1 text-center mb-5 mt-5"><b>會員方案</b></div>
        
        <div class="row">
          <div class="col-lg-4">            
            <p><div class="text-center"><h2>基礎會員</h2></div><br>
              <br>年費600元</br>寫作講評指導<br></br><br>提供成人組及學生組寫作技巧指南，累積實力，完成的文章有機會收錄在樂寫專欄內。</br></p>
            
          </div>
          <div class="col-lg-4">
            <p><div class="text-center"><h2>進階會員</h2></div><br>
              <br>年費2000元</br>寫作講評指導 + 四堂錄影課程培訓<br></br><br>成人組每完成五篇課程指定文章可獲得2000元進階課程獎勵，結業後可提供接案機會、參與商業寫作並發表作品於媒體平台，學生組亦可獲得教師親筆明信片獎勵。</br></p>
            
          </div>
          <div class="col-lg-4">
            <p><div class="text-center"><h2>白金會員</h2></div><br>
              <br>年費6000元</br>寫作講評指導 + 四堂錄影課程訓練<br>10次真人教師線上指導</br><br>成人組每完成五篇課程指定文章可獲得2000元進階課程獎勵，結業後可提供接案機會、參與商業寫作並發表作品於媒體平台，學生組亦可獲得教師親筆明信片獎勵。</br></p>
            
          </div>
        </div>


        <hr class="featurette-divider">


        <div class="h1 text-center mb-5"><b>教練團隊</b></div>
        
        <div class="row">
          <div class="col-lg-4">
          <img class="rounded-circle" src="{{asset('images/man01.jpg')}}" alt="Generic placeholder image" width="140" height="140">
            <h2>吳孟霖</h2>
            <p><div class="text-center">簡介:</div><br>
              旅⾏足跡遍布歐美、中東、亞洲，先後出版《 土耳其進行曲》、《原來，我們都忘了馬祖》、
              《那⼀所名為旅⾏的大學》，2012年入選為墨刻台灣百⼤旅行家，2015年受邀到
TED x TKU分享《累積的⼒量》。現為樂寫創辦人、聯發科技志工社寫作教育計劃主持人。</p>
            
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('images/man04.jpg')}}" alt="Generic placeholder image" width="140" height="140">
            <h2>顏正裕</h2>
            <p><div class="text-center">簡介:</div><br>
              大學兼任英文講師，得過高雄青年文學獎，紀實劇本工作坊第三名。
              目前擔任樂寫出書計畫總編，持續用文字紀錄與整理自己，
              朝長篇創作計畫邁進。</p>
            
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('images/man03.jpg')}}" alt="Generic placeholder image" width="140" height="140">
            <h2>林億昕</h2>
            <p><div class="text-center">簡介:</div><br>
              斜槓教學工作者，有時候是高中公民老師、補習班作文老師，有時候是職探中心服裝老師，
              在專業領域轉換之間，說話、書寫作為表達的橋樑，閱讀作為思考的工具，
              而教學和課程設計本身是一連串不斷修正的過程，期待遇見更多教育路上的夥伴。</p>
            
          </div>
	</div>

        <hr class="featurette-divider">

        <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="h1 text-center mb-5 mt-5"><b>熱血故事</b></div>
            <div class="text-center mb-5 mt-5" style="margin-left:auto; margin-right:auto; font-size:22px;">
	      <p>圓一個想出書的夢，也圓一個別人可以被看見的夢！<br></br>
這是圓夢寫手計畫成立的初衷，這五年來我們培育出上百位寫手，在台灣各地推動寫作教育，紀錄在地故事。一個人很渺小，但一群人就有無限可能，如果每個人都能從寫作中受益，它將能鼓勵更多人持續精進，甚至改變人生。讓文字更有溫度，樂在寫作、樂於分享，現在就是最好的開始！</p></div>
        </div>
        <hr class="featurette-divider">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="h1 text-center mb-5 mt-5"><b>合作夥伴</b></div>
              <div class="mobileHide text-center mb-5 mt-5" style="margin-left:auto; margin-right:auto; ">
                <img class="" src="{{asset('images/logo006.jpg')}}" alt="Generic placeholder image">
                </div>

                <div class="mobileShow text-center mb-5 mt-5" style="margin-left:auto; margin-right:auto; ">
                  <p style="font-size: 25px;"><b>聯發科技志工社 瘋城部落</b><br><b> 人才邦 今周刊</b> <br><b>飽讀電子書 四塊玉</b></p>
                  </div>
          </div>
          
        
      </div><!-- /.container -->
      <hr class="featurette-divider">

      
      @include('template.footer')
    </main>

    <script>
    $('.carousel').carousel({
      interval:4000
    });
    </script>
  
    
    
  </body>
</html>
