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
                <h2 style="color:white;background-color:rgba(0,0,0,0.2);"><b>我們不僅是教練，更是陪伴你一路向前的朋友</b></h2><br></br>
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
		            <h2 style="color:white;background-color:rgba(0,0,0,0.2);"><b>讓學習不再孤單，讓文字更有溫度</b></h2><br></br>
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
              透過遊戲化學習，領取任務包並累積經驗值，配對專業教練指導，逐步完成階段性目標。</p>
            
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('images/part02.png')}}" alt="Generic placeholder image" width="140" height="140">
            
            <p><div class="text-center"><h2>職涯發展</h2></div><br>
              培養軟實力，結合線上課程、文字訓練及業師指導，提升職場競爭力。</p>
            
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('images/part03.png')}}" alt="Generic placeholder image" width="140" height="140">
            
            <p><div class="text-center"><h2>永續學習</h2></div><br>
              學無止盡，持續精進，觀摩精選文章，從探索及成長的過程中，擴大個人影響力。</p>
            
          </div>
        </div>


        <hr class="featurette-divider">
        <div class="h1 text-center mb-5 mt-5"><b>樂寫服務</b></div>
        
        <div class="row">
          <div class="col-lg-4">
          <img src="{{asset('images/achievement.png')}}" alt="Generic placeholder image" width="140" height="140">
            
            <p><div class="text-center"><h2>任務包挑戰</h2></div><br>
            提供成人組及學生組(國小、國中、高中)寫作任務包，<b>主題包含人文、自然、旅遊等12類型</b>，繳交文章後，多位線上教練可供選擇給予回饋。挑戰解鎖1~10級，每滿5級額外提供2000元線上課程當作獎勵。<br><br>任務包費用請見下方會員說明</p>
            
          </div>
          <div class="col-lg-4">
            <img src="{{asset('images/contract.png')}}" alt="Generic placeholder image" width="140" height="140">
            
            <p><div class="text-center"><h2>中/英文專業潤稿</h2></div><br>
            提供中/英文字作品潤稿，<b>包含自傳、履歷、書評、講稿、出版品等等</b>。協助組織文章架構並優化文句，修正常見錯誤，讓寫作更有靈感，讓文章更加出色。<br><br><b>專業潤稿按件計價 300~1500元不等</b>，細節歡迎至<b>「<a href="https://cowrite30.com/contactus/" target="_blank">聯繫我們</a>」</b>討論</p>
            
          </div>
          <div class="col-lg-4">
            <img src="{{asset('images/lecture.png')}}" alt="Generic placeholder image" width="140" height="140">
            
            <p><div class="text-center"><h2>互動課程</h2></div><br>
            提供學員交流平台，參與教練課程，<b>包含採訪技巧、書評撰寫、科普寫作、商業文案等專業課程</b>，結業後可提供接案機會，並發表作品於Pubu電子書、今周刊等媒體平台。<br><br>按課程計價 2000~6000元不等，課程資訊請詳見<b>「<a href="https://cowrite30.com/https-cowrite30-lessons/" target="_blank">寫作課程</a>」</b>連結</p>
            
          </div>
        </div>



        <!-- START THE FEATURETTES -->


        <hr class="featurette-divider">
        <!-- /END THE FEATURETTES -->
        <div class="h1 text-center mb-5 mt-5"><b>中/英文 任務包會員方案</b></div>
        
        <div class="row">
          <div class="col-lg-4">            
            <p><div class="text-center"><h2>基礎會員</h2></div><br>
              <br>中文：單月300元 / 年繳2000元</br>英文：單月500元 / 年繳3200元<br></br>每月4次任務包挑戰及1對1文字回饋指導<br>每滿5級送價值2000元線上課程</br></p>
            
          </div>
          <div class="col-lg-4">
            <p><div class="text-center"><h2>進階會員</h2></div><br>
            <br>中文：單月500元 / 年繳3200元</br>英文：單月800元 / 年繳5000元<br></br>每月<b>8次</b>任務包挑戰及1對1文字回饋指導<br>每滿5級送價值2000元線上課程<br>免費參與樂寫講堂(寫作技巧分享及線上說書會)<br><b>1次小班制課程/月</b></br></p>
            
          </div>
          <div class="col-lg-4">
            <p><div class="text-center"><h2>白金會員</h2></div><br>
            <br>中文：單月800元 / 年繳5000元</br>英文：單月1000元 / 年繳7000元<br></br>每月<b>10次</b>任務包挑戰及1對1文字回饋指導<br>每滿5級送價值2000元線上課程<br>免費參與樂寫講堂(寫作技巧分享及線上說書會)<br><b>1次小班制課程/月<br>1次一對一線上視訊指導/月<br>參與樂寫年度出書計畫</b></br></p>
            
          </div>
        </div>
        <div class="text-center">三人團報享9折優惠，五人團報享85折優惠，十人團報享8折優惠，請至<b>「<a href="https://cowrite30.com/contactus/" target="_blank">聯繫我們</a>」</b>告知名單</div>
        <hr class="featurette-divider">


        <div class="h1 text-center mb-5"><b>教練團隊</b></div>
        
        <div class="row">
          <div class="col-lg-4">
          <img class="rounded-circle" src="{{asset('images/man01.jpg')}}" alt="Generic placeholder image" width="140" height="140">
            <h2>吳孟霖</h2>
            <p><div class="text-center">簡介:</div><br>
              旅⾏足跡遍布歐美、中東、亞洲，先後出版《 土耳其進行曲 》、《 原來，我們都忘了馬祖 》、
              《 那⼀所名為旅⾏的大學 》，2012年入選為墨刻台灣百⼤旅行家，2015年受邀到
TED x TKU分享《 累積的⼒量 》。現為樂寫創辦人、聯發科技志工社寫作教育計劃主持人。</p>
            
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
