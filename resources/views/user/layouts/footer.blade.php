<!-- start title about and p  -->
@php

    $lang = substr(Request::getPathInfo(), 1, 2);
    $footers = App\Models\Lang::where([['langable_type', 'App\Models\Footer'], ['name', $lang]])->get();
    
 @endphp
 @foreach($footers as $footer)
@php
    $footer = $footer->langable;
@endphp
<div class="row-one-footer">
                <div class="title-footer">
                    <h4>درباره مرکز</h4>
                </div>
                <article>
            
                    <p>
                       {{$footer->about_us}}
                    </p>
                </article>
            </div>
            <!-- ادرس  -->
            <div class="parent-phone-icon-text-footer">
                <div class="text-one">
                    <div class="title-footer">
                        <h4>آدرس</h4>
                    </div>
                    <p>
                        <span><i class="fa fa-marker"></i></span>

                       {{$footer->address}}
                    </p>
                </div>
                <div class="parent-phone">

                    <p>
                        <span>
                            <i class="fa fa-phone"></i>
                        </span>
                       {{$footer->phone_num}}
                    </p>
                    <p>{{$footer->mobile_num}}</p>
                </div>
                <div class="btn-footer">
                    <a href="#">درخواست پروژه</a>
                </div>
            </div>
            <!-- ادرس  -->



            <!-- start title about and p  -->
            <!-- start menu , home ,.. -->
            <nav class="nav-row-three-footer">
                <div class="title-footer">
                    <h4>منو</h4>
                </div>
                <ul>
                    <li>
                        <a href="#">خانه</a>
                    </li>
                    <li>
                        <a href="#">خدمات</a>
                    </li>
                    <li>
                        <a href="#">پروژه ها</a>
                    </li>

                    <li>
                        <a href="#">تحقیق و توسعه </a>
                    </li>
                    <li>
                        <a href="#">دعوت به همکاری</a>
                    </li>
                    <li>
                        <a href="#">تماس</a>
                    </li>
                    <li>
                        <a href="#">درباره ما</a>
                    </li>
                </ul>

            </nav>
            <!-- end menu , home ,.. -->

            <!--start  اخرین پروژه ها  -->
            <nav class="nav-row-four-footer">
                <div class="title-footer">
                    <h4>آخرین پروژه ها</h4>
                </div>
                <ul>
                    <li>
                        <a href="#">خانه مسکونی احمد سرتیپ</a>
                    </li>
                    <li>
                        <a href="#">خانه مسکونی عامری</a>
                    </li>
                    <li>
                        <a href="#">ویلای شرقی</a>
                    </li>

                    <li>
                        <a href="#">ویلای صلاح الدین کلا </a>
                    </li>
                    <li>
                        <a href="#">ازمایشگاه تخصصی دانش</a>
                    </li>
                </ul>


                <!--end  اخرین پروژه ها  -->



                <!-- start title address and phone and btn -->
                <div class="row-two-footer">








                    <!-- end title address and phone and btn -->
            </nav>

            <nav class="social-media-footer">
                <ul>
                    <li>
                        <a href="{{$footer->face_link}}">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$footer->LinkedIn_link}}">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$footer->mail_link}}">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$footer->insta_link}}">
                            <i class="fab fa-instagram-square"></i>
                        </a>
                    </li>
                </ul>
            </nav>

@endforeach