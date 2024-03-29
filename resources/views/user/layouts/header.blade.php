 <!-- main responsive top menu static start -->
 @php

     $x = substr(Request::getPathInfo(), 3);
 @endphp



 <!-- main responsive top menu static start -->
 <menu class="parent-responsive-menu">

     <div class="wrapper-responsive-menu">
         <!-- flag nav start -->
         <div onClick="mFlag()" class="menu-flag menu-flag-show1">
             <p style="display: inline-block">{{ __('translation.language') }}
                 <i class="fas fa-chevron-down"></i>
             </p>
             <div class="menu-flag2">
                 <ul>

                     @php
                         $lang = substr(Request::getPathInfo(), 1, 2);
                         if ($lang == 'fa') {
                             $lang = 'en';
                             $link = $lang . $x;
                         } else {
                             $lang = 'fa';
                             $link = $lang . $x;
                         }
                     @endphp
                     @if ($lang == 'en')
                         <li><a href="#">Fa</a><img src="{{ asset('frontend/imgs/iran-flag.png') }}" alt="">
                             </a>
                         </li>
                         <hr>
                         <li><a href="/{{ $link }}">En</a><img src="{{ asset('frontend/imgs/eng-flag.png') }}"
                                 alt="">
                             </a>
                         </li>
                     @else
                         <li><a href="/{{ $link }}">Fa</a><img
                                 src="{{ asset('frontend/imgs/iran-flag.png') }}" alt="">
                             </a>
                         </li>
                         <hr>
                         <li><a href="#">En</a><img src="{{ asset('frontend/imgs/eng-flag.png') }}" alt="">
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
                     <a href="{{ route('user.notifications.all') }}"><i class="far fa-comment-alt"></i></a>

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
                 <a href="{{ route('home') }}">{{ __('translation.home') }}</a>
             </li>
             <li>

                 {{ __('translation.services') }}

                 <i class="fa fa-chevron-down"></i>
                 <!-- start wrapper-main-menu خدمات -->
                 <ul class="wrapper-main-menu">
                     @php
                         $lang = substr(Request::getPathInfo(), 1, 2);
                         $services = App\Models\Lang::where([['name', $lang], ['langable_type', 'App\Models\Service']])->get();
                     @endphp
                     @foreach ($services as $service)
                         @php
                             $service = $service->langable;
                         @endphp
                         <li>

                             <a
                                 href="{{ route('service.index', $service->slug) }}">{{ $service->category->title }}</a>

                         </li>
                     @endforeach
                 </ul>
                 <!-- end wrapper-main-menu خدمات -->
             </li>
             <li>

                 {{ __('translation.development-research') }}

                 <i class="fa fa-chevron-down"></i>
                 <!-- start wrapper-main-menu تحقیق توسعه-->
                 <ul class="wrapper-main-menu">
                     <li>
                         <a href="{{ route('front.courses.all') }}">
                             {{ __('translation.courses') }}
                         </a>
                     </li>

                     @php
                         $lang = substr(Request::getPathInfo(), 1, 2);
                         $articleCategoryLanguages = App\Models\Lang::where([['name', $lang], ['langable_type', 'App\Models\ArticleCategory']])->get();
                     @endphp
                     @foreach ($articleCategoryLanguages as $articleCategoryLanguage)
                         @php
                             $articleCategory = $articleCategoryLanguage->langable;
                         @endphp
                         <li>
                             <a href="{{ route('article.category.index', $articleCategory->id) }}">
                                 {{ $articleCategory->title }}

                             </a>
                         </li>
                     @endforeach
                     <li>
                         <a href="{{ route('bookshelf.index') }}">
                             {{ __('translation.electronic-library') }}
                         </a>
                     </li>
                 </ul>
                 <!-- end wrapper-main-menu تحقیق توسعه-->
             </li>
             <li>
                 {{ __('translation.work-with-us') }}
                 <i class="fa fa-chevron-down"></i>
                 <!-- start wrapper-main-menu دعوت به همکاری-->
                 <ul class="wrapper-main-menu">
                     @php
                         $lang = substr(Request::getPathInfo(), 1, 2);
                         $workWithUsCategoryLanguages = App\Models\Lang::where([['name', $lang], ['langable_type', 'App\Models\InviteCategory']])->get();
                     @endphp
                     @foreach ($workWithUsCategoryLanguages as $workWithUsCategoryLanguage)
                         @php
                             $category = $workWithUsCategoryLanguage->langable;
                         @endphp
                         <li>
                             <a href="{{ route('user.work.with.us.show', $category->id) }}">
                                 {{ $category->title }}
                             </a>
                         </li>
                     @endforeach
                 </ul>
                 <!-- end wrapper-main-menu دعوت به همکاری-->

             </li>
             <li><a href="{{ route('project.index') }}">{{ __('translation.projects') }}</a></li>
             <li> <a href="{{ route('contactus.index') }}"> {{ __('translation.contact-us') }}</a></li>
             <li><a href="{{ route('about_us.front.index') }}">{{ __('translation.about-us') }}</a></li>

         </ul>

         <!--				mnue flag2 start-->
         <div onClick="mFlag()" class="menu-flag menu-flag-show2">
             <p style="display: inline-block">{{ __('translation.language') }}
                 <i class="fas fa-chevron-down"></i>
             </p>
             <div class="menu-flag2">
                 <ul>

                     @php
                         $lang = substr(Request::getPathInfo(), 1, 2);
                         if ($lang == 'fa') {
                             $lang = 'en';
                             $link = $lang . $x;
                         } else {
                             $lang = 'fa';
                             $link = $lang . $x;
                         }
                     @endphp

                     @if ($lang == 'en')
                         <li><a href="#">Fa</a><img src="{{ asset('frontend/imgs/iran-flag.png') }}" alt="">
                             </a>
                         </li>
                         <hr>
                         <li><a href="/{{ $link }}">En</a><img
                                 src="{{ asset('frontend/imgs/eng-flag.png') }}" alt="">
                             </a>
                         </li>
                     @else
                         <li><a href="/{{ $link }}">Fa</a><img
                                 src="{{ asset('frontend/imgs/iran-flag.png') }}" alt="">
                             </a>
                         </li>
                         <hr>
                         <li><a href="#">En</a><img src="{{ asset('frontend/imgs/eng-flag.png') }}" alt="">
                             </a>
                         </li>
                     @endif
                 </ul>
             </div>
         </div>
     </nav>


     <nav class="nav-icon-main">
         <ul class="ul-icon-main">
             <li>
                 <a href="{{ route('user.notifications.all') }}">
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
                     <a href="#">
                         <i class="fas fa-user">{{ auth()->user()->name }}</i>
                     </a>
                     <ul class="wrapper-user-icon">
                         <li class="setting-menu">
                             <a href="{{ route('panel.index') }}">
                                 <button>
                                     <p class="big-p">{{ __('translation.setting') }}</p>
                                     <i class="fas fa-cog big-p"></i>
                                 </button>
                             </a>

                         </li>
                         <li class="settingg-menu">
                             <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                                 <button>
                                     <p class="big-p">{{ __('translation.logout') }}</p>
                                     <i class="fas fa-power-off big-p"></i>
                                 </button>
                             </form>
                         </li>
                     </ul>
                 @else
                     <a href="{{ route('login') }}">
                         <i class="fas fa-user"></i>
                     </a>
                 @endif


             </li>
         </ul>
     </nav>
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
                     {{ __('translation.home') }}
                 </a>
             </div>
             <div class="toggel">
                 <i class="fa fa-user"></i>

                 <a href="{{ route('panel.index') }}">
                     {{ __('translation.panel') }}
                 </a>
             </div>

             <div class="toggel">
                 <i class="fa fa-map-marker"></i>‏

                 <a href="{{ route('contactus.index') }}">
                     {{ __('translation.address') }}
                 </a>
             </div>

             <div class="toggel">
                 <i class="fab fa-gg"></i>
                 {{ __('translation.services') }}
                 <i class="fa fa-chevron-circle-down"></i>
             </div>
             
             <ul class="ul-wrapper-toggel">
                     @php
                         $lang = substr(Request::getPathInfo(), 1, 2);
                         $workWithUsCategoryLanguages = App\Models\Lang::where([['name', $lang], ['langable_type', 'App\Models\InviteCategory']])->get();
                     @endphp
                     @foreach ($workWithUsCategoryLanguages as $workWithUsCategoryLanguage)
                         @php
                             $category = $workWithUsCategoryLanguage->langable;
                         @endphp
                         <li>
                             <a href="{{ route('user.work.with.us.show', $category->id) }}">
                                 {{ $category->title }}
                             </a>
                         </li>
                     @endforeach
             </ul>

             <div class="toggel">
                 <i class="fa fa-file"></i>‏
                 <a href="{{route('project.index')}}">
                     {{ __('translation.projects') }}
                 </a>
             </div>
             <div class="toggel">
                 <i class="fa fa-list-alt" aria-hidden="true"></i>‏

                 {{ __('translation.development-research') }}
                 <i class="fa fa-chevron-circle-down"></i>‏

             </div>

             <ul class="ul-wrapper-toggel">
                 <li>
                     <a href="{{ route('front.courses.all') }}">
                         {{ __('translation.courses') }}

                     </a>
                 </li>
                 @php
                     $lang = substr(Request::getPathInfo(), 1, 2);
                     $articleCategoryLanguages = App\Models\Lang::where([['name', $lang], ['langable_type', 'App\Models\ArticleCategory']])->get();
                 @endphp
                 @foreach ($articleCategoryLanguages as $articleCategoryLanguage)
                     @php
                         $articleCategory = $articleCategoryLanguage->langable;
                     @endphp
                     <li>
                         <a href="{{ route('article.category.index', $articleCategory->id) }}">
                             {{ $articleCategory->title }}

                         </a>
                     </li>
                 @endforeach
                 <li>
                     <a href="{{ route('bookshelf.index') }}">
                         {{ __('translation.electronic-library') }}
                     </a>
                 </li>
             </ul>

             <div class="toggel">
                 <i class="far fa-handshake"></i>
                 {{ __('translation.work-with-us') }}
                 <i class="fa fa-chevron-circle-down"></i>‏


             </div>
             <ul class="ul-wrapper-toggel">

                 @php
                     $lang = substr(Request::getPathInfo(), 1, 2);
                     $workWithUsCategoryLanguages = App\Models\Lang::where([['name', $lang], ['langable_type', 'App\Models\InviteCategory']])->get();
                 @endphp
                 @foreach ($workWithUsCategoryLanguages as $workWithUsCategoryLanguage)
                     @php
                         $category = $workWithUsCategoryLanguage->langable;
                     @endphp
                     <li>
                         <a href="{{ route('user.work.with.us.show', $category->id) }}">
                             {{ $category->title }}
                         </a>
                     </li>
                 @endforeach
             </ul>
             <div class="toggel">
                 <a href="{{ route('contactus.index') }}">
                     <i class="fa fa-phone"></i>‏
                     {{ __('translation.contact-us') }}
                 </a>

             </div>
             <div class="toggel">
                 <a href="{{route('about_us.front.index')}}">
                     <i class="fa fa-building"></i>‏

                     {{ __('translation.about-us') }}
                 </a>
             </div>
         </ul>
     </nav>
 </menu>
 <!-- end responsive menu show wtih btn -->
