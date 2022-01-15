@extends('user.layouts.master')
@section('header')
    <style>
        html,
        body {
            scroll-behavior: smooth;
            background-image: url({{ asset('frontend/imgs/triangle.png') }});
        }

        .nav-res-menu-btn {
            height: 95vh;

        }



        @media screen and (max-width: 576px) {
            .nav-res-menu-btn {

                height: 106vh;
            }
        }

    </style>
@endsection
@section('content')
    <section class="parent-parent-panel">
        <section>
            <section id="parent-breadcrumb-section">
                <section class="parent-breadcrumb-section">
                    <div class="breadcrumb-section">
                        <ul id="breadcrumbs">
                            <li><a href="{{ route('home') }}">خانه</a></li>
                            <li>
                                <a href="{{ route('panel.index') }}">
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
                    <form class="grid-virayesh-etelaat" action="{{ route('panel.updateInformation') }}" method="POST">
                        @csrf
                        <div class="div-box1-virayesh-panel">
                            <input type="text" placeholder="نام" name="name" value="{{ auth()->user()->name }}">
                            <input type="number" name="phone_number" value="{{ auth()->user()->phone_number }}"
                                placeholder="شماره تماس">
                        </div>
                        <div class="div-box2-virayesh-panel">
                            <div class="jensiate-panel">
                                <label>جنسیت:</label>
                                <br>
                                @if (auth()->user()->gender == 0)
                                    <input type="radio" id="women" name="sex" value="0">
                                    <label for="women">خانم</label>
                                    <input checked type="radio" id="men" name="sex" value="1">
                                    <label for="men">آقا</label>
                                @else
                                    <input checked type="radio" id="women" name="sex" value="0">
                                    <label for="women">خانم</label>
                                    <input type="radio" id="men" name="sex" value="1">
                                    <label for="men">آقا</label>
                                @endif

                            </div>

                            <input type="email" name="email" value="{{ auth()->user()->email }}" placeholder="ایمیل"
                                class="email-virayesh-panel">
                        </div>

                        <div class="parent-btn-virayeshe-etelaat">
                            <button type="submit" class="btn-virayesh-etelaat-panel"> ثبت</button>
                        </div>
                    </form>

                </section>


                <section class="parent-virayaesh-panel">
                    <div>
                        <p>تغییر رمز عبور</p>
                    </div>
                    <div class="wrapper-virayesh-panel">

                        <form action="{{ route('panel.updatePassword') }}" method="POST">
                            @csrf
                            <p>رمز عبور جدید*:</p>
                            <input name="password" type="password">
                            <div>
                                <p>تکرار رمز عبور جدید*:</p>
                            </div>
                            <input name="password_confirmation" type="password">
                            <br>
                            <button type="submit" class="button-changepass"> تغییر رمز عبور </button>
                        </form>



                    </div>

                </section>
            </section>
        </section>
        <section class="parent-panel">

            <div class="panel-icon-pf">
                <figure class="parent-topimg-paenlkarbari">

                    <img src="{{ asset('frontend/imgs/panel_profile_img.png') }}" alt="" class="fa-circle-user">
                    <a href="#">
                        <i class="fa fa-camera"></a></i>
                </figure>

            </div>

            <div>نام و نام خانوادگی:{{ auth()->user()->name }}</div>
            <div>email:{{ auth()->user()->email }}</div>

            <div class="parent-btn-panel">
                <button class="btn-change-password-panel" id="btn-change-password-panel">تغییر رمز عبور</button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-exit-panel"><a href="#">خروج</a></button>
                </form>
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
    <script src="{{ asset('frontend/jqery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/responsiveMenu.js') }}"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend/js/homepage.js') }}"></script>
    <script src="{{ asset('frontend/js/panelkarbari.js') }}"> </script>
@endsection
