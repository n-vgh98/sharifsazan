<!DOCTYPE html>
@if ($local = app()->getLocale() == 'fa')
<html lang="fa" dir="rtl">
@else
<html lang="en" dir="ltr">

@endif

<head>
    @include('user.layouts.head')
    @yield('header')
</head>


<body>
<nav>
		    <!-- start left banner sharifsazan and menu  -->
            <div class="MenuPagesHS">

                <div class="parent-btn-text-icon-menu-scorll">
                    <div class="parent-btn-menu-pagesHS">
                        <button class="btn-show-menuHorinzentalpage">
                            <i class="fas fa-bars"></i>
                        </button>
                        <p>منو</p>
                    </div>
                    <div class="parent-btn-menu-pagesHS">
                        <button>
                        <a href="{{route('home')}}">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        </button>
                        <p>بازگشت</p>

                    </div>
                </div>

                <figure class="menu-img-team-ma">
                    <img src="imgs/sharif.png" alt="">
                </figure>

            </div>

            <!-- Start Menu  -->

            <menu class="MenuPageScorll">
                <!-- start close btn -->
                <div class="parent-btn-close-menu-sc">
                    <button type="menu" class="closedmenupagesc"><i class="fa fa-close"></i></button>
                </div>
                <!-- end close btn -->
                <div class="line-menu-scpage">

                </div>
                <nav>
                    <ul>
                        <li>
                            <a href="#">
                                خانه

                            </a>
                            <span><i class="fas fa-home"></i>
                            </span>
                        </li>

                        <li>
                            <a href="#">
                                پنل کاربری

                            </a>
                            <span><i class="fas fa-user"></i>
                            </span>
                        </li>

                        <!-- toggel خدمات -->
                        <div class="toggel-sc-menu">
                            <span>
                                <i class="fas fa-chevron-down chveronscmenu"></i> </span>
                            <p>خدمات</p>
                            <span>
                                <i class="fas fa-cogs"></i>
                            </span>
                        </div>
                        <ul class="wrapper-toggel-sc">
                            <li><a href="#">توسعه طرح بر مبنای اقتصاد</a></li>
                            <li><a href="#">طراحی و شبیه سازی</a></li>
                            <li><a href="#">طرح توجیهی و مجتمع های صنعتی</a></li>
                            <li><a href="#">بهینه سازی و مقاوم سازی</a></li>

                        </ul>
                        <!-- toggel خدمات -->
                        <li>
                            <a href="#">
                                پروژه ها
                            </a>
                            <span>
                                <i class="fas fa-project-diagram"></i>
                            </span>
                        </li>

                        <!-- toggel تحقیق و توسعه -->
                        <div class="toggel-sc-menu">
                            <span>
                                <i class="fas fa-chevron-down chveronscmenu"></i>
                            </span>
                            <p>تحقیق و توسعه</p>
                            <span>
                                <i class="fas fa-chart-pie"></i>
                            </span>
                        </div>
                        <ul class="wrapper-toggel-sc">
                            <li><a href="#">دوره اموزشی</a></li>
                            <li><a href="#">پژوهش و نواوری</a></li>
                            <li><a href="#">تکنولوژی های نوین</a></li>
                            <li><a href="#">کتابخانه الکترونیکی</a></li>
                        </ul>
                        <!-- toggel تحقیق و توسعه -->


                        <!-- toggel دعوت به همکاری -->
                        <div class="toggel-sc-menu">
                            <span>
                                <i class="fas fa-chevron-down chveronscmenu"></i>
                            </span>
                            <p>دعوت به همکاری</p>
                            <span>
                                <i class="fas fa-users"></i>
                            </span>
                        </div>
                        <ul class="wrapper-toggel-sc">
                            <li><a href="#">واحد سازه و پل</a></li>
                            <li><a href="#">واحد معماری و طراحی داخلی</a></li>
                            <li><a href="#">واحد اداری - مالی</a></li>
                            <li><a href="#">واحد بازار یابی و فروش</a></li>
                        </ul>
                        <!-- toggel دعوت به همکاری -->


                        <li>
                            <a href="#">
                                سفارش پروژه
                            </a>
                            <span>
                                <i class="fas fa-clone"></i>
                            </span>
                        </li>
                        <li>
                            <a href="#">
                                تماس با ما
                            </a>
                            <span>
                                <i class="fas fa-phone"></i>
                            </span>
                        </li>
                        <li>
                            <a href="#">
                                درباره ما
                            </a>
                            <span>
                                <i class="fas fa-paste"></i>
                            </span>
                        </li>
                    </ul>

                </nav>
            </menu>
            <!-- end Menu  -->

            <!-- end left banner sharifsazan and menu  -->

		
		
		</nav>
		
		
        <main class="main-scorllsHorinzentalPages">
            @php
                $about = $about_us->langable;
            @endphp
            <!-- start intro section -->
            <section class="section-intro-ScorllHsPages">
                <div id="slider-demo">
                
                <div class="slideshow-container">

            <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="{{asset($about->images[0]->path)}}">
            </div>

            <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="{{asset($about->images[1]->path)}}">
            </div>

            <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="{{asset($about->images[2]->path)}}">
            </div>



</div>
<br>

<div class="dotSlide">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
    
    </div>
             
                <div class="title-team-ma">
                    <h2> معرفی ما</h2>
                </div>
                <article>
                    <p>
                        {!! $about->text !!}
                    </p>
                </article>

            </section>
            <!-- end intro section -->

            <!-- start banner  -->
            <section class="section-bannerScorllHSpages">
                <div class="banner-sc-PageH">

                    <h6>تیم ما</h6>


                </div>
            </section>
            <!-- end banner  -->

            <!--leader section img start  -->
            <section class="one-imgSCHPages">
            @foreach($team_member as $member)
                    <figure>
                         @php 
                            $member = $member->langable;
                         @endphp
                         @if($member->admin == 1)
                        <a>
                            <img src="{{asset($member->images[0]->path)}}" alt="">
                        </a>
                        <figcaption>

                            <div class="text-figcaptionPagesScH">
                                <p>{{$member->name}} </p>
                                <p>{{$member->job_title}} </p>
                                <p>{{$member->education}} </p>
                                <p>{{$member->attribute}}</p>
                            </div>

                        </figcaption>
                        @endif
                    </figure>
                    @endforeach
            </section>
            <!--leader section img end  -->

            <!-- start RowsImgsPageScH imgs have four imgs -->
            <section class="RowsImgsPageScH">
                <!-- wrapper one  -->
                <div class="wrapper-RowsImgs-PageScH">
                @foreach($team_member as $member)
					 <figure>
                         @php 
                            $member = $member->langable;
                         @endphp
                         @if($member->admin == 0 && $member->mode == 1)
                        <a>
                            <img src="{{asset($member->images[0]->path)}}" alt="">
                        </a>
                        <figcaption>

                            <div class="text-figcaptionPagesScH">
                            <p>{{$member->name}} </p>
                                <p>{{$member->job_title}} </p>
                                <p>{{$member->education}} </p>
                                <p>{{$member->attribute}}</p>
                            </div>

                        </figcaption>
                        @endif
                    </figure>
                    @endforeach
                   </div>
            </section>
            <!-- end  RowsImgsPageScH imgs have four imgs -->

            <!-- start banner  -->
            <section class="section-bannerScorllHSpages">
                <div class="banner-sc-PageH title-hamkaran">

                    <h6>همکاران گذشته</h6>


                </div>
            </section>
            <!-- end banner  -->

            <!-- start personal imgs have three imgs -->
               <section class="RowsImgsPageScH">
                <!-- wrapper one  -->
                <div class="wrapper-RowsImgs-PageScH">
                  
                @foreach($team_member as $member)
					 <figure>
                         @php 
                            $member = $member->langable;
                         @endphp
                         @if($member->admin == 0 && $member->mode == 0)
                        <a>
                            <img src="{{asset($member->images[0]->path)}}" alt="">
                        </a>
                        <figcaption>

                            <div class="text-figcaptionPagesScH">
                            <p>{{$member->name}} </p>
                                <p>{{$member->job_title}} </p>
                                <p>{{$member->education}} </p>
                                <p>{{$member->attribute}}</p>
                            </div>

                        </figcaption>
                        @endif
                    </figure>
                @endforeach
                   </div>

            </section>
            <!-- end personal imgs have three imgs -->
        </main>

  

    @include('user.layouts.scripts')
    @yield('scripts')
</body>

</html>
