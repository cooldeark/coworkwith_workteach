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
         <form  class="appointment-form"  id="appointment-form" name="userRegister" enctype="multipart/form-data" autocomplete="off">
            {{csrf_field()}}
            
         <h2 class="mb-3">{{$whoRegister}}註冊</h2>
            <div class="form-group-1">
               <div class="mb-3"><h5>姓名</h5></div>
               <input type="text" name="name" id="name" placeholder="" required />
               <div class="mb-3"><h5>信箱</h5></div>
               <input type="email" name="email" id="email" placeholder="" required />
               <div class="mb-3"><h5>密碼</h5></div>
               <input type="password" name="password" id="password" placeholder="至少6字元，最多32字元" autocomplete="new-password" required />
               <div class="mb-3"><h5>再次輸入密碼</h5></div>
               <input type="password" name="checkpassword" id="checkpassword" placeholder="至少6字元，最多32字元" autocomplete="new-password" required />
               <div class="mb-3"><h5>生日</h5></div>
               <input type="date" name="birth" id="birth"  required />
               <div class="mb-3"><h5>手機號碼</h5></div>
               <input type="number" name="phone_number" id="phone_number" placeholder="" required />
               <div class="mb-3"><h5>居住地</h5></div>
                  <select id="city" name="address_main"><option value="null" selected>請選擇縣市</option><option value="0">基隆市</option><option value="1">臺北市</option><option value="2" >新北市</option><option value="3">桃園市</option><option value="4">新竹市</option><option value="5">新竹縣</option><option value="6">苗栗縣</option><option value="7">臺中市</option><option value="8">彰化縣</option><option value="9">南投縣</option><option value="10">雲林縣</option><option value="11">嘉義市</option><option value="12">嘉義縣</option><option value="13">臺南市</option><option value="14">高雄市</option><option value="15">屏東縣</option><option value="16">臺東縣</option><option value="17">花蓮縣</option><option value="18">宜蘭縣</option><option value="19">澎湖縣</option><option value="20">金門縣</option><option value="21">連江縣</option></select>                                             
                  <select id="region_0" name="address_sub" class="region-make region_0" style="display:none;"><option value="null" >請選擇鄉鎮市區</option><option value="200">仁愛區</option><option value="201">信義區</option><option value="202">中正區</option><option value="203">中山區</option><option value="204">安樂區</option><option value="205">暖暖區</option><option value="206">七堵區</option></select>
                  <select id="region_1" name="address_sub" class="region-make region_1" style="display:none;"><option value="null" >請選擇鄉鎮市區</option><option value="100">中正區</option><option value="103">大同區</option><option value="104">中山區</option><option value="105">松山區</option><option value="106">大安區</option><option value="108">萬華區</option><option value="110">信義區</option><option value="111">士林區</option><option value="112">北投區</option><option value="114">內湖區</option><option value="115">南港區</option><option value="116">文山區</option></select>
                  <select id="region_2" name="address_sub" class="region-make region_2" style="display:none;"><option value="null" >請選擇鄉鎮市區</option><option value="207">萬里區</option><option value="208">金山區</option><option value="220">板橋區</option><option value="221">汐止區</option><option value="222">深坑區</option><option value="223">石碇區</option><option value="224">瑞芳區</option><option value="226">平溪區</option><option value="227">雙溪區</option><option value="228">貢寮區</option><option value="231">新店區</option><option value="232">坪林區</option><option value="233">烏來區</option><option value="234" >永和區</option><option value="235">中和區</option><option value="236">土城區</option><option value="237">三峽區</option><option value="238">樹林區</option><option value="239">鶯歌區</option><option value="241">三重區</option><option value="242">新莊區</option><option value="243">泰山區</option><option value="244">林口區</option><option value="247">蘆洲區</option><option value="248">五股區</option><option value="249">八里區</option><option value="251">淡水區</option><option value="252">三芝區</option><option value="253">石門區</option></select>
                  <select id="region_3" name="address_sub" class="region-make region_3" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="320">中壢區</option><option value="324">平鎮區</option><option value="325">龍潭區</option><option value="326">楊梅區</option><option value="327">新屋區</option><option value="328">觀音區</option><option value="330">桃園區</option><option value="333">龜山區</option><option value="334">八德區</option><option value="335">大溪區</option><option value="336">復興區</option><option value="337">大園區</option><option value="338">蘆竹區</option></select>
                  <select id="region_4" name="address_sub" class="region-make region_4" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="300">東區</option><option value="300">北區</option><option value="300">香山區</option></select>
                  <select id="region_5" name="address_sub" class="region-make region_5" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="302">竹北市</option><option value="303">湖口鄉</option><option value="304">新豐鄉</option><option value="305">新埔鎮</option><option value="306">關西鎮</option><option value="307">芎林鄉</option><option value="308">寶山鄉</option><option value="310">竹東鎮</option><option value="311">五峰鄉</option><option value="312">橫山鄉</option><option value="313">尖石鄉</option><option value="314">北埔鄉</option><option value="315">峨眉鄉</option></select>
                  <select id="region_6" name="address_sub" class="region-make region_6" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="350">竹南鎮</option><option value="351">頭份市</option><option value="352">三灣鄉</option><option value="353">南庄鄉</option><option value="354">獅潭鄉</option><option value="356">後龍鎮</option><option value="357">通霄鎮</option><option value="358">苑裡鎮</option><option value="360">苗栗市</option><option value="361">造橋鄉</option><option value="362">頭屋鄉</option><option value="363">公館鄉</option><option value="364">大湖鄉</option><option value="365">泰安鄉</option><option value="366">銅鑼鄉</option><option value="367">三義鄉</option><option value="368">西湖鄉</option><option value="369">卓蘭鎮</option></select>
                  <select id="region_7" name="address_sub" class="region-make region_7" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="400">中區</option><option value="401">東區</option><option value="402">南區</option><option value="403">西區</option><option value="404">北區</option><option value="406">北屯區</option><option value="407">西屯區</option><option value="408">南屯區</option><option value="411">太平區</option><option value="412">大里區</option><option value="413">霧峰區</option><option value="414">烏日區</option><option value="420">豐原區</option><option value="421">后里區</option><option value="422">石岡區</option><option value="423">東勢區</option><option value="424">和平區</option><option value="426">新社區</option><option value="427">潭子區</option><option value="428">大雅區</option><option value="429">神岡區</option><option value="432">大肚區</option><option value="433">沙鹿區</option><option value="434">龍井區</option><option value="435">梧棲區</option><option value="436">清水區</option><option value="437">大甲區</option><option value="438">外埔區</option><option value="439">大安區</option></select>
                  <select id="region_8" name="address_sub" class="region-make region_8" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="500">彰化市</option><option value="502">芬園鄉</option><option value="503">花壇鄉</option><option value="504">秀水鄉</option><option value="505">鹿港鎮</option><option value="506">福興鄉</option><option value="507">線西鄉</option><option value="508">和美鎮</option><option value="509">伸港鄉</option><option value="510">員林市</option><option value="511">社頭鄉</option><option value="512">永靖鄉</option><option value="513">埔心鄉</option><option value="514">溪湖鎮</option><option value="515">大村鄉</option><option value="516">埔鹽鄉</option><option value="520">田中鎮</option><option value="521">北斗鎮</option><option value="522">田尾鄉</option><option value="523">埤頭鄉</option><option value="524">溪州鄉</option><option value="525">竹塘鄉</option><option value="526">二林鎮</option><option value="527">大城鄉</option><option value="528">芳苑鄉</option><option value="530">二水鄉</option></select>
                  <select id="region_9" name="address_sub" class="region-make region_9" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="540">南投市</option><option value="541">中寮鄉</option><option value="542">草屯鎮</option><option value="544">國姓鄉</option><option value="545">埔里鎮</option><option value="546">仁愛鄉</option><option value="551">名間鄉</option><option value="552">集集鎮</option><option value="553">水里鄉</option><option value="555">魚池鄉</option><option value="556">信義鄉</option><option value="557">竹山鎮</option><option value="558">鹿谷鄉</option></select>
                  <select id="region_10" name="address_sub" class="region-make region_10" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="630">斗南鎮</option><option value="631">大埤鄉</option><option value="632">虎尾鎮</option><option value="633">土庫鎮</option><option value="634">褒忠鄉</option><option value="635">東勢鄉</option><option value="636">臺西鄉</option><option value="637">崙背鄉</option><option value="638">麥寮鄉</option><option value="640">斗六市</option><option value="643">林內鄉</option><option value="646">古坑鄉</option><option value="647">莿桐鄉</option><option value="648">西螺鎮</option><option value="649">二崙鄉</option><option value="651">北港鎮</option><option value="652">水林鄉</option><option value="653">口湖鄉</option><option value="654">四湖鄉</option><option value="655">元長鄉</option></select>
                  <select id="region_11" name="address_sub" class="region-make region_11" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="600">東區</option><option value="600">西區</option></select>
                  <select id="region_12" name="address_sub" class="region-make region_12" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="602">番路鄉</option><option value="603">梅山鄉</option><option value="604">竹崎鄉</option><option value="605">阿里山鄉</option><option value="606">中埔鄉</option><option value="607">大埔鄉</option><option value="608">水上鄉</option><option value="611">鹿草鄉</option><option value="612">太保市</option><option value="613">朴子市</option><option value="614">東石鄉</option><option value="615">六腳鄉</option><option value="616">新港鄉</option><option value="621">民雄鄉</option><option value="622">大林鎮</option><option value="623">溪口鄉</option><option value="624">義竹鄉</option><option value="625">布袋鎮</option></select>
                  <select id="region_13" name="address_sub" class="region-make region_13" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="700">中西區</option><option value="701">東區</option><option value="702">南區</option><option value="704">北區</option><option value="708">安平區</option><option value="709">安南區</option><option value="710">永康區</option><option value="711">歸仁區</option><option value="712">新化區</option><option value="713">左鎮區</option><option value="714">玉井區</option><option value="715">楠西區</option><option value="716">南化區</option><option value="717">仁德區</option><option value="718">關廟區</option><option value="719">龍崎區</option><option value="720">官田區</option><option value="721">麻豆區</option><option value="722">佳里區</option><option value="723">西港區</option><option value="724">七股區</option><option value="725">將軍區</option><option value="726">學甲區</option><option value="727">北門區</option><option value="730">新營區</option><option value="731">後壁區</option><option value="732">白河區</option><option value="733">東山區</option><option value="734">六甲區</option><option value="735">下營區</option><option value="736">柳營區</option><option value="737">鹽水區</option><option value="741">善化區</option><option value="742">大內區</option><option value="743">山上區</option><option value="744">新市區</option><option value="745">安定區</option></select>
                  <select id="region_14" name="address_sub" class="region-make region_14" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="800">新興區</option><option value="801">前金區</option><option value="802">苓雅區</option><option value="803">鹽埕區</option><option value="804">鼓山區</option><option value="805">旗津區</option><option value="806">前鎮區</option><option value="807">三民區</option><option value="811">楠梓區</option><option value="812">小港區</option><option value="813">左營區</option><option value="814">仁武區</option><option value="815">大社區</option><option value="817">東沙群島</option><option value="819">南沙群島</option><option value="820">岡山區</option><option value="821">路竹區</option><option value="822">阿蓮區</option><option value="823">田寮區</option><option value="824">燕巢區</option><option value="825">橋頭區</option><option value="826">梓官區</option><option value="827">彌陀區</option><option value="828">永安區</option><option value="829">湖內區</option><option value="830">鳳山區</option><option value="831">大寮區</option><option value="832">林園區</option><option value="833">鳥松區</option><option value="840">大樹區</option><option value="842">旗山區</option><option value="843">美濃區</option><option value="844">六龜區</option><option value="845">內門區</option><option value="846">杉林區</option><option value="847">甲仙區</option><option value="848">桃源區</option><option value="849">那瑪夏區</option><option value="851">茂林區</option><option value="852">茄萣區</option></select>
                  <select id="region_15" name="address_sub" class="region-make region_15" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="900">屏東市</option><option value="901">三地門鄉</option><option value="902">霧臺鄉</option><option value="903">瑪家鄉</option><option value="904">九如鄉</option><option value="905">里港鄉</option><option value="906">高樹鄉</option><option value="907">鹽埔鄉</option><option value="908">長治鄉</option><option value="909">麟洛鄉</option><option value="911">竹田鄉</option><option value="912">內埔鄉</option><option value="913">萬丹鄉</option><option value="920">潮州鎮</option><option value="921">泰武鄉</option><option value="922">來義鄉</option><option value="923">萬巒鄉</option><option value="924">崁頂鄉</option><option value="925">新埤鄉</option><option value="926">南州鄉</option><option value="927">林邊鄉</option><option value="928">東港鎮</option><option value="929">琉球鄉</option><option value="931">佳冬鄉</option><option value="932">新園鄉</option><option value="940">枋寮鄉</option><option value="941">枋山鄉</option><option value="942">春日鄉</option><option value="943">獅子鄉</option><option value="944">車城鄉</option><option value="945">牡丹鄉</option><option value="946">恆春鎮</option><option value="947">滿州鄉</option></select>
                  <select id="region_16" name="address_sub" class="region-make region_16" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="950">臺東市</option><option value="951">綠島鄉</option><option value="952">蘭嶼鄉</option><option value="953">延平鄉</option><option value="954">卑南鄉</option><option value="955">鹿野鄉</option><option value="956">關山鎮</option><option value="957">海端鄉</option><option value="958">池上鄉</option><option value="959">東河鄉</option><option value="961">成功鎮</option><option value="962">長濱鄉</option><option value="963">太麻里鄉</option><option value="964">金峰鄉</option><option value="965">大武鄉</option><option value="966">達仁鄉</option></select>
                  <select id="region_17" name="address_sub" class="region-make region_17" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="970">花蓮市</option><option value="971">新城鄉</option><option value="972">秀林鄉</option><option value="973">吉安鄉</option><option value="974">壽豐鄉</option><option value="975">鳳林鎮</option><option value="976">光復鄉</option><option value="977">豐濱鄉</option><option value="978">瑞穗鄉</option><option value="979">萬榮鄉</option><option value="981">玉里鎮</option><option value="982">卓溪鄉</option><option value="983">富里鄉</option></select>
                  <select id="region_18" name="address_sub" class="region-make region_18" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="260">宜蘭市</option><option value="261">頭城鎮</option><option value="262">礁溪鄉</option><option value="263">壯圍鄉</option><option value="264">員山鄉</option><option value="265">羅東鎮</option><option value="266">三星鄉</option><option value="267">大同鄉</option><option value="268">五結鄉</option><option value="269">冬山鄉</option><option value="270">蘇澳鎮</option><option value="272">南澳鄉</option></select>
                  <select id="region_19" name="address_sub" class="region-make region_19" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="880">馬公市</option><option value="881">西嶼鄉</option><option value="882">望安鄉</option><option value="883">七美鄉</option><option value="884">白沙鄉</option><option value="885">湖西鄉</option></select>
                  <select id="region_20" name="address_sub" class="region-make region_20" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="890">金沙鎮</option><option value="891">金湖鎮</option><option value="892">金寧鄉</option><option value="893">金城鎮</option><option value="894">烈嶼鄉</option><option value="896">烏坵鄉</option></select>
                  <select id="region_21" name="address_sub" class="region-make region_21" style="display:none;"><option value="null">請選擇鄉鎮市區</option><option value="209">南竿鄉</option><option value="210">北竿鄉</option><option value="211">莒光鄉</option><option value="212">東引鄉</option></select>
               <div class="select-list">
                  <div class="mb-3"><h5>性別</h5></div>
                  <select name="sex" id="sex">
                     <option slected value="male">男生</option>
                     <option value="female">女生</option>
                  </select>
               </div>
               
               <div class="select-list">
                  <div class="mb-3"><h5>年齡</h5></div>
                  <select name="age" id="age">
                     <option slected value="1">12 以下</option>
                     <option value="2">12-15</option>
                     <option value="3">15-18</option>
                     <option value="4">18-24</option>
                     <option value="5">24-50</option>
                     <option value="6">50-70</option>
                  </select>
               </div>

               <div class="select-list">
                  <div class="mb-3"><h5>興趣</h5></div>
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
                     <h5>其他:</h5>
                     <input type="text" name='professionOther' id="professionOther"  />
                  </div>
               </div>
               

               <div class="mb-3"><h2>學歷</h2></div>
               <div class="select-list">
                  <select name="education" id="education">
                     <option slected value="1">國小</option>
                     <option value="2">國中</option>
                     <option value="3">高中</option>
                     <option value="4">大專院校</option>
                     <option value="5">大學</option>
                     <option value="6">研究所</option>
                     <option value="7">博士班</option>
                  </select>
               </div>

               @if($whoRegister=='學生')

               <div class="mb-3"><h2>會員身分</h2></div>
               <div class="select-list">
                  <select name="member_rate" id="member_rate">
                     <option slected value="1">基礎會員</option>
                     <option value="2">進階會員</option>
                     <option value="3">白金會員</option>
                  </select>
               </div>
               
               <div class="mb-3"><h2>報名課程</h2></div>
               <div class="select-list">
                  <select class="selectpicker form-control" name="lession_select" title="可複選" id="lession_select" multiple>
                     <option slected value="1">中文課程</option>
                     <option value="2">英文課程</option>

                  </select>
               </div>

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
               <div class="mb-3"><h2>批改課程</h2></div>
               <div class="select-list">
                  <select class="selectpicker form-control" name="lession_select" title="可複選" id="lession_select" multiple>
                     <option slected value="1">中文課程</option>
                     <option value="2">英文課程</option>

                  </select>
               </div>


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
                     <option value="6">接案教授</option>
                     <option value="7">商業教授</option>
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

            </div>

            <div class="mb-3"><h2>學校合作或優惠代碼(若無，請待管理員聯繫繳費方式)</h2></div>
            <div>
               <input type="text" name="isMember"/>
            </div>
            {{--take value--}}
            <input style="display:none;" type="text" name="who" value="{{$whoRegister}}"/>

            <div class="mb-3"><h2>大頭貼上傳</h2></div>
               <div class="select-list">
                  <input class="" multiple accept=".jpg,.jpeg,.png" type="file" name="photo_file" id="photo_file" />
               </div>

         </form>
         <div class="form-submit">
            <button id="btnSubmit" class="btn btn-primary mb-5">註冊</button>
            <div id="errormessageDiv" class="mt-3" style="color:red;display:none;font-size:20px;font-weight:bold;"></div>
            @if($errors->first('alreadyExist'))
            <h3 class="mt-3" style="color:red;">{{$errors->first('alreadyExist')}}</h3>
            @endif
         </div>
      </div>
   </div>
    @include('template.footer')
   
    
    
    <script>
     var dateControl = document.querySelector('input[type="date"]');

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


      @if($whoRegister=='學生')
         dateControl.value = '1990-01-01';
         @else
         dateControl.value = '1980-01-01';
         @endif

         $('#profession').change(function(){
            if($(this).val()=='21'){
               $('#professionOtherDIV').css('display','block');
            }else{
               $('#professionOtherDIV').css('display','none');
            }
         });


         $('#city').change(function(){
            if($(this).val()=='null'){
               $('.region-make').css('display','none');
            }else{
               $('.region-make').css('display','none');
               $('.region-make').attr('disabled',true);
               $('.region_'+$(this).val()).attr('disabled',false);
               $('.region_'+$(this).val()).css('display','block');
            }
         });

         $('#btnSubmit').on('click',function(){
            $(this).attr('disabled',true);
            
            var checkName=false,checkEmail=false,checkPhone=false,checkPassword=false,checkCity=false;
            var errorMessage='';
            if($('#name').val()!="" && $('#name').val()!=undefined){
               checkName=true;
            }
            if($('#email').val()!="" && $('#email').val()!=undefined){
               checkEmail=true;
            }

            if($('#city').val()!='null' && $('#region_'+$('#city').val()).val()!='null'){
               checkCity=true;
            }

            if($('#phone_number').val()!="" && $('#phone_number').val()!=undefined){
               var myRegexp=new RegExp("^\\d{10,10}$");
               if(myRegexp.test($('#phone_number').val())){
                  checkPhone=true;
               }else{
                  checkPhone=false;
               }   
            }

            if(checkName!=true && checkEmail!=true && checkPhone!=true){
               errorMessage+='姓名&信箱&電話有誤 ';
            }else if(checkName!=true && checkEmail!=true){
               errorMessage+='姓名&信箱有誤 ';
            }else if(checkName!=true && checkPhone!=true){
               errorMessage+='姓名&電話有誤 ';
            }else if(checkEmail!=true && checkPhone!=true){
               errorMessage+='信箱&電話有誤 ';
            }else if(checkPhone!=true){
               errorMessage+='電話格式有誤 ';
            }else if(checkName!=true){
               errorMessage+='性別不得為空 ';
            }else if(checkEmail!=true){
               errorMessage+='信箱不得為空 ';
            }

            

            if($('#password').val()==$('#checkpassword').val() && $('#password').val()!="" ){
               var myRegexp=new RegExp("^\\w{6,32}$");
               if(myRegexp.test($('#password').val())){
                  checkPassword=true;
               }else{
                  checkPassword=false;
               }
               
            }

            if(checkPassword!=true){
               errorMessage+=' 密碼不符合規則 ';
            }
            
            if(checkCity!=true){
               errorMessage+=' 請選取地址 ';
            }

            if($('#write_position').val()==0){
                  errorMessage+=' 寫作領域尚未選擇 ';
               }

            if($('#lession_select').val()==0){
               errorMessage+=' 無選擇課程 ';
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
               
               var takeAllValue=$('#appointment-form').serializeArray();//not use now
               var takeAllFormValue = new FormData($('#appointment-form')[0]);

               // takeAllValue.push({name:'address_main_name',value:$('#city option:selected').html()});
               // takeAllValue.push({name:'address_sub_name',value:$("#region_"+$('#city').val()+ " option:selected").html()});
               
               takeAllFormValue.append('address_main_name',$('#city option:selected').html());
               takeAllFormValue.append('address_sub_name',$("#region_"+$('#city').val()+ " option:selected").html());
               takeAllFormValue.append('lession_select',$('#lession_select').val());

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
                  url:'/whoRegister',
                  data:takeAllFormValue,
                  processData: false,
                  contentType: false,
                  type:'POST',
                  success:function(suMessage){
                     if(suMessage['status']==200){
                        window.location.href="{{url('/login')}}";
                     }else{
                        $('#errormessageDiv').css('display','block');
                        $('#errormessageDiv').text(suMessage['message']);
                        $(this).attr('disabled',false);
                     }
                  }
               }).fail(function(eMe){
                  alert('請聯繫管理員');
                  $(this).attr('disabled',false);
               });

            }
            
         });

   @if ($errors->any())
         alert('上傳檔案須為jpg,jpeg,png，並小於1MB');
    @endif


    </script>
    </body>
</html>
