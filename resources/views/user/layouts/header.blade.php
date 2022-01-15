 <!-- main responsive top menu static start -->
 @php

     $x = substr(Request::getPathInfo(), 3);
     $lang = substr(Request::getPathInfo(), 1, 2);
     if ($lang == 'fa') {
         $lang = 'en';
         $link = $lang . $x;
     } else {
         $lang = 'fa';
         $link = $lang . $x;
     }

 @endphp
 {{-- <menu class="parent-responsive-menu">

     <div class="wrapper-responsive-menu">
         <!-- flag nav start -->
         <nav class="nav-flag">
             <ul class="ul-flag">
                 <li>
                     <span>
                         <i class="fas fa-chevron-down"></i>
                     </span>
                     <span>fa</span>
                     <img src="{{ asset('frontend/imgs/iran-flag.png') }}" alt="">
                     <ul class="wrapper-flag">
                         <span>
                         </span>
                         <span>eg</span>
                         <img src="{{ asset('frontend/imgs/eng-flag.png') }}" alt="">
                     </ul>
                 </li>
             </ul>
         </nav>
         <!-- flag nav end -->
         <!-- left nav start -->
         <nav class="left-nav-responsive-menu">
             <ul class="left-ul-responsive-menu">
                 <li>
                     <i class="far fa-comment-alt"></i>
                 </li>
                 <li>
                     <i class="fas fa-shopping-cart"></i>
                 </li>
                 <button class="btn-responsive-menu">
                     <i class="fas fa-bars"></i>

                 </button>
             </ul>


         </nav>
         <!-- left nav start -->
     </div>

     <!-- nav-flag-main-menu" end -->
     <!-- start main menu  -->


     <nav class="nav-main-menu">
         <ul class="ul-main-menu">
             <!-- nav-flag-main-menu" start -->
             <nav class="nav-flag-main-menu">
                 <ul class="ul-flag-main-menu">
                     <li>
                         <span>
                             <i class="fas fa-chevron-down"></i>
                         </span>
                         <span>fa</span>
                         <img src="{{ asset('frontend/imgs/iran-flag.png') }}" alt="">
                         <ul class="wrapper-flag-main-menu">
                             <span>
                             </span>
                             <span>eg</span>
                             <img src="{{ asset('frontend/imgs/eng-flag.png') }}" alt="">
                         </ul>
                     </li>
                 </ul>
             </nav>
             <!-- nav-flag-main-menu" end -->
             <li>
                 <a href="{{ route('home') }}">خانه</a>
             </li>
             <li>

                 خدمات

                 <i class="fa fa-chevron-down"></i>
                 <!-- start wrapper-main-menu خدمات -->
                 <ul class="wrapper-main-menu">
                     <li>
                         <a href="khadamat.html">توجیه طرح بر مبنای اقتصاد</a>
                     </li>
                     <li>
                         <a href="khadamat.html">
                             طراحی و شبیه سازی
                         </a>
                     </li>
                     <li>
                         <a href="khadamat.html">
                             طرح توجیهی مجتمع های صنعتی
                         </a>
                     </li>

                     <li>
                         <a href="khadamat.html">
                             بهینه سازی و مقاوم سازی
                         </a>
                     </li>
                 </ul>
                 <!-- end wrapper-main-menu خدمات -->
             </li>
             <li>

                 تحقیق توسعه

                 <i class="fa fa-chevron-down"></i>
                 <!-- start wrapper-main-menu تحقیق توسعه-->
                 <ul class="wrapper-main-menu">
                     <li>
                         <a href="amozesh.html">
                             دوره اموزشی
                         </a>
                     </li>
                     @php
                         $articleCategoryLanguages = App\Models\Lang::where([['name', $lang], ['langable_type', 'App\Models\ArticleCategory']])->get();
                     @endphp
                     @foreach ($articleCategoryLanguages as $articleCategoryLanguage)
                         @php
                             $articleCategory = $articleCategoryLanguage->langable;
                         @endphp
                         <li>
                             <a href="#">
                                 {{ $articleCategory->title }}

                             </a>
                         </li>
                     @endforeach
                     <li>
                         <a href="article.html">
                             کتابخانه الکترونیکی
                         </a>
                     </li>
                 </ul>
                 <!-- end wrapper-main-menu تحقیق توسعه-->
             </li>
             <li>
                 دعوت به همکاری
                 <i class="fa fa-chevron-down"></i>
                 <!-- start wrapper-main-menu دعوت به همکاری-->
                 <ul class="wrapper-main-menu">
                     <li>
                         <a href="Davatbehamkari.html">
                             واحد سازه و پل
                         </a>
                     </li>
                     <li>
                         <a href="Davatbehamkari.html">
                             طراحی و شبیه سازی
                         </a>
                     </li>
                     <li>
                         <a href="Davatbehamkari.html">
                             واحد معماری و طراحی داخلی واحد اداری-مالی
                         </a>
                     </li>

                     <li>
                         <a href="Davatbehamkari.html">
                             واحد بازاریابی و فروش
                         </a>
                     </li>
                 </ul>
                 <!-- end wrapper-main-menu دعوت به همکاری-->

             </li>
             <li><a href="Proje.html">پروژها</a></li>
             <li><a href="tamasbama.html">تماس با ما</a></li>
             <li><a href="TeamMa.html">درباره ما</a></li>

         </ul>


     </nav>


     <!-- start icon main -->
     <nav class="nav-icon-main">
         <ul class="ul-icon-main">
             <li>
                 <a href="#">
                     <i class="fas fa-comment"></i>
                 </a>
             </li>
             <li>
                 <a href="#">
                     <i class="fa fa-shopping-cart"></i>
                 </a>
             </li>
             <li>
                 @if (Auth::check())
                     <a href="{{ route('panel.index') }}"><i
                             class="fas">{{ auth()->user()->name }}</i></a>
                 @else
                     <a href="{{ route('login') }}">
                         <i class="fas fa-user"></i>
                     </a>
                 @endif

                 <ul class="wrapper-user-icon">
                     <li class="setting-menu">
                         <p> تنظیمات</p>
                         <i class="fas fa-cog"></i>

                     </li>
                     <li class="settingg-menu">

                         <p> خروج </p>
                         <i class="fas fa-power-off"></i>
                     </li>
                 </ul>
             </li>
         </ul>
         @auth

             <form action="{{ route('logout') }}" method="POST">
                 @csrf
                 <button type="submit">خروج</button>
             </form>
         @endauth

     </nav>
     <!-- end icon main -->


     <!-- end main menu  -->
 </menu> --}}


 <!-- main responsive top menu static start -->
 <menu class="parent-responsive-menu">

     <div class="wrapper-responsive-menu">
         <!-- flag nav start -->


         <div onClick="mFlag()" class="menu-flag menu-flag-show1">
             <p style="display: inline-block">language
                 <i class="fas fa-chevron-down"></i>
             </p>
             <div class="menu-flag2">
                 <ul>

                     @if ($lang == 'fa')
                         <li><a href="/{{ $link }}">Fa</a><img
                                 src="{{ asset('frontend/imgs/iran-flag.png') }}" alt="">
                             </a>
                         </li>
                         <hr>
                         <li><a href="#">En</a><img src="{{ asset('frontend/imgs/eng-flag.png') }}" alt="">
                             </a>
                         </li>
                     @else
                         <li><a href="#">Fa</a><img src="{{ asset('frontend/imgs/iran-flag.png') }}" alt="">
                             </a>
                         </li>
                         <hr>
                         <li><a href="/{{ $link }}">En</a><img src="{{ asset('frontend/imgs/eng-flag.png') }}"
                                 alt="">
                             </a>
                         </li>
                     @endif
                 </ul>


             </div>


         </div>





         <!-- flag nav end -->
         <!-- left nav start -->
         <nav class="left-nav-responsive-menu">
             <ul class="left-ul-responsive-menu">
                 <li>
                     <i class="far fa-comment-alt"></i>
                 </li>
                 <li>
                     <i class="fas fa-shopping-cart"></i>
                 </li>
                 <button class="btn-responsive-menu">
                     <i class="fas fa-bars"></i>

                 </button>
             </ul>


         </nav>
         <!-- left nav start -->
     </div>

     <!-- nav-flag-main-menu" end -->
     <!-- start main menu  -->


     <nav class="nav-main-menu">
         <ul class="ul-main-menu">
             <!-- nav-flag-main-menu" start -->

             <!-- nav-flag-main-menu" end -->
             <li>
                 <a href="{{ route('home') }}">خانه</a>
             </li>
             <li>

                 خدمات

                 <i class="fa fa-chevron-down"></i>
                 <!-- start wrapper-main-menu خدمات -->
                 <ul class="wrapper-main-menu">
                     <li>
                         <a href="khadamat.html">توجیه طرح بر مبنای اقتصاد</a>
                     </li>
                     <li>
                         <a href="khadamat.html">
                             طراحی و شبیه سازی
                         </a>
                     </li>
                     <li>
                         <a href="khadamat.html">
                             طرح توجیهی مجتمع های صنعتی
                         </a>
                     </li>

                     <li>
                         <a href="khadamat.html">
                             بهینه سازی و مقاوم سازی
                         </a>
                     </li>
                 </ul>
                 <!-- end wrapper-main-menu خدمات -->
             </li>
             <li>

                 تحقیق توسعه

                 <i class="fa fa-chevron-down"></i>
                 <!-- start wrapper-main-menu تحقیق توسعه-->
                 <ul class="wrapper-main-menu">
                     <li>
                         <a href="amozesh.html">
                             دوره اموزشی
                         </a>
                     </li>
                     <li>
                         <a href="article.html">
                             پژوهش و نوآوری

                         </a>
                     </li>
                     <li>
                         <a href="article.html">
                             تکنولوژی های نوین

                         </a>
                     </li>
                     <li>
                         <a href="article.html">
                             کتابخانه الکترونیکی
                         </a>
                     </li>
                 </ul>
                 <!-- end wrapper-main-menu تحقیق توسعه-->
             </li>
             <li>
                 دعوت به همکاری
                 <i class="fa fa-chevron-down"></i>
                 <!-- start wrapper-main-menu دعوت به همکاری-->
                 <ul class="wrapper-main-menu">
                     <li>
                         <a href="Davatbehamkari.html">
                             واحد سازه و پل
                         </a>
                     </li>
                     <li>
                         <a href="Davatbehamkari.html">
                             طراحی و شبیه سازی
                         </a>
                     </li>
                     <li>
                         <a href="Davatbehamkari.html">
                             واحد معماری و طراحی داخلی واحد اداری-مالی
                         </a>
                     </li>

                     <li>
                         <a href="Davatbehamkari.html">
                             واحد بازاریابی و فروش
                         </a>
                     </li>
                 </ul>
                 <!-- end wrapper-main-menu دعوت به همکاری-->

             </li>
             <li><a href="Proje.html">پروژها</a></li>
             <li><a href="tamasbama.html">تماس با ما</a></li>
             <li><a href="TeamMa.html">درباره ما</a></li>

         </ul>

         <!--				mnue flag2 start-->
         <div onClick="mFlag()" class="menu-flag menu-flag-show2">
             <p style="display: inline-block">language
                 <i class="fas fa-chevron-down"></i>
             </p>
             <div class="menu-flag2">
                 <ul>

                     @if ($lang == 'fa')
                         <li><a href="/{{ $link }}">Fa</a><img
                                 src="{{ asset('frontend/imgs/iran-flag.png') }}" alt="">
                             </a>
                         </li>
                         <hr>
                         <li><a href="#">En</a><img src="{{ asset('frontend/imgs/eng-flag.png') }}" alt="">
                             </a>
                         </li>
                     @else
                         <li><a href="#">Fa</a><img src="{{ asset('frontend/imgs/iran-flag.png') }}" alt="">
                             </a>
                         </li>
                         <hr>
                         <li><a href="/{{ $link }}">En</a><img
                                 src="{{ asset('frontend/imgs/eng-flag.png') }}" alt="">
                             </a>
                         </li>
                     @endif
                 </ul>
             </div>
         </div>
     </nav>











     <!-- start icon main -->
     <nav class="nav-icon-main">
         <ul class="ul-icon-main">
             <li>
                 <a href="#">
                     <i class="fas fa-comment"></i>
                 </a>
             </li>
             <li>
                 <a href="#">
                     <i class="fa fa-shopping-cart"></i>
                 </a>
             </li>
             <li>
                 <a href="#">
                     <i class="fas fa-user"></i>
                 </a>
                 <ul class="wrapper-user-icon">
                     <li class="setting-menu">
                         <p>تنظیمات</p>
                         <i class="fas fa-cog"></i>

                     </li>
                     <li class="settingg-menu">
                         <p>خروج</p>
                         <i class="fas fa-power-off"></i>
                     </li>
                 </ul>
             </li>
         </ul>
     </nav>
     <!-- end icon main -->


     <!-- end main menu  -->
 </menu>
 <!-- main responsive  menu static end -->
 <!-- main responsive  menu static end -->


 <!-- start responsive menu show wtih btn -->
 <menu class="parenet-res-menu-with-btn">
     <nav class="nav-res-menu-btn">
         <ul class="ul-res-menu-btn">

             <div class="toggel">

                 <i class="fa fa-home"></i>


                 <a href="{{ route('home') }}">
                     خانه
                 </a>
             </div>
             <div class="toggel">
                 <i class="fa fa-user"></i>

                 <a href="panelkarbari.html">
                     پنل کاربری
                 </a>
             </div>

             <div class="toggel">
                 <i class="fa fa-map-marker"></i>‏

                 <a href="tamasbama.html">
                     ادرس
                 </a>
             </div>

             <div class="toggel">
                 <i class="fab fa-gg"></i>
                 خدمات
                 <i class="fa fa-chevron-circle-down"></i>
             </div>



             <ul class="ul-wrapper-toggel">
                 <li>
                     <a href="khadamat.html">توجیه طرح بر مبنای اقتصاد</a>
                 </li>
                 <li>
                     <a href="khadamat.html">
                         طراحی و شبیه سازی
                     </a>
                 </li>
                 <li>
                     <a href="khadamat.html">
                         طرح توجیهی مجتمع های صنعتی
                     </a>
                 </li>

                 <li>
                     <a href="khadamat.html">بهینه سازی و مقاوم سازی</a>
                 </li>

             </ul>

             <div class="toggel">
                 <i class="fa fa-file"></i>‏
                 <a href="Proje.html">
                     پروژه ها
                 </a>
             </div>
             <div class="toggel">
                 <i class="fa fa-list-alt" aria-hidden="true"></i>‏

                 تحقیق توسعه
                 <i class="fa fa-chevron-circle-down"></i>‏

             </div>

             <ul class="ul-wrapper-toggel">
                 <li>
                     <a href="amozesh.html">
                         دوره اموزشی
                     </a>
                 </li>
                 <li>
                     <a href="article.html">
                         پژوهش و نوآوری

                     </a>
                 </li>
                 <li>
                     <a href="article.html">
                         تکنولوژی های نوین

                     </a>
                 </li>
                 <li>
                     <a href="">
                         کتابخانه الکترونیکی
                     </a>
                 </li>
             </ul>

             <div class="toggel">
                 <i class="far fa-handshake"></i>
                 دعوت به همکاری
                 <i class="fa fa-chevron-circle-down"></i>‏


             </div>
             <ul class="ul-wrapper-toggel">

                 <li>
                     <a href="#">
                         واحد سازه و پل
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         طراحی و شبیه سازی
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         واحد معماری و طراحی داخلی واحد اداری-مالی
                     </a>
                 </li>

                 <li>
                     <a href="#">
                         واحد بازاریابی و فروش
                     </a>
                 </li>


             </ul>
             <div class="toggel">
                 <a href="#">
                     <i class="fa fa-phone"></i>‏
                     تماس با ما
                 </a>

             </div>
             <div class="toggel">
                 <a href="#">
                     <i class="fa fa-building"></i>‏

                     درباره ما
                 </a>

             </div>


         </ul>
     </nav>
 </menu>
 <!-- end responsive menu show wtih btn -->
