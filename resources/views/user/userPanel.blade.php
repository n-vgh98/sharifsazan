@extends('user.layouts.master')
@section('content')
    <section class="parent-parent-panel">
        <section>
            <section id="parent-breadcrumb-section">
                <section class="parent-breadcrumb-section">
                    <div class="breadcrumb-section">
                        <ul id="breadcrumbs">
                            <li><a href="#">خانه</a></li>
                            <li>
                                <a href="#">
                                    پنل کاربر
                                </a>
                            </li>
                            <p class="sapcelipanel">/</p>
                            <p class="AddTextLi">

                            </p>
                        </ul>
                    </div>
                </section>

                <section class="parent-virayesh-etelaat-panel" id="parent-breadcrumb-section-virayesh">
                    <p>ویرایش مشخصات</p>
                    <form class="grid-virayesh-etelaat">
                        <div class="div-box1-virayesh-panel">
                            <input type="text" placeholder="نام">
                            <input type="text" placeholder="نام خانوادگی">
                            <input type="number" placeholder="شماره تماس">
                        </div>
                        <div class="div-box2-virayesh-panel">
                            <div class="jensiate-panel">
                                <label>جنسیت:</label>
                                <br>
                                <input type="radio" id="women" name="sex" value="women">
                                <label for="women">خانم</label>
                                <input type="radio" id="men" name="sex" value="men">
                                <label for="men">آقا</label>
                            </div>

                            <input type="email" placeholder="ایمیل" class="email-virayesh-panel">
                        </div>


                    </form>
                    <div class="parent-btn-virayeshe-etelaat">
                        <button class="btn-virayesh-etelaat-panel"> ثبت</button>
                    </div>
                </section>


                <section class="parent-virayaesh-panel">
                    <div>
                        <p>تغییر رمز عبور</p>
                    </div>
                    <div class="wrapper-virayesh-panel">

                        <form action="#">
                            <p>رمز عبور قبلی*:</p>
                            <input type="password">
                            <p>رمز عبور جدید*:</p>
                            <input type="password">
                            <div>
                                <p>تکرار رمز عبور جدید*:</p>
                            </div>

                            <input type="password">

                        </form>
                        <form action="#">
                            <button class="button-changepass"> <a href="#"> تغییر رمز عبور </a></button>

                        </form>
                    </div>

                </section>
            </section>
        </section>




        <section class="parent-panel">

            <div class="panel-icon-pf">
                <figure class="parent-topimg-paenlkarbari">

                    <img src="imgs/panel_profile_img.png" alt="" class="fa-circle-user">
                    <a href="#">
                        <i class="fa fa-camera"></a></i>
                </figure>

            </div>

            <div>نام و نام خانوادگی:ایلین ارمی</div>
            <div>email</div>
            <div>phone</div>

            <div class="parent-btn-panel">
                <button class="btn-change-password-panel" id="btn-change-password-panel">تغییر رمز عبور</button>
                <button class="btn-exit-panel"><a href="#">خروج</a></button>

            </div>

            <nav class="parent-menu-panel">
                <ul>
                    <li class="virayesh-panel">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        <a href="#" id="virayesh-panel">
                            ویرایش
                        </a>
                    </li>

                    <li>
                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                        <a href="#">
                            اخبار
                        </a>
                    </li>
                    <li>
                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                        <a href="#">
                            دوره های من
                        </a>
                    </li>
                    <li>
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        <a href="#">
                            سبد خرید
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
        <!-- change pass -->



    </section>
@endsection
@section('scripts')
    <script src="{{ asset('front/jqery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/js/responsiveMenu.js') }}"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="{{ asset('front/js/homepage.js') }}"></script>
    <script src="{{ asset('front/js/panelkarbari.js') }}">
    @endsection
