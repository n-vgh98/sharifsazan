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
                            <li><a href="{{ route('home') }}"> {{ __('translation.home') }}</a></li>
                            <li>
                                <a href="{{ route('panel.index') }}">
                                    {{ __('translation.panel') }}
                                </a>
                            </li>
                            <p class="sapcelipanel">/</p>
                            <p class="AddTextLi">

                            </p>
                        </ul>
                    </div>
                </section>

                <section class="parent-virayesh-etelaat-panel" id="parent-breadcrumb-section-virayesh">
                    <p> {{ __('translation.change-detail') }}</p>
                    <form class="grid-virayesh-etelaat">
                        <div class="div-box1-virayesh-panel">
                            <input name="name" type="text" value="{{ auth()->user()->name }}">
                            <input type="number" name="phone_number" value="{{ auth()->user()->phone_number }}">
                        </div>
                        <div class="div-box2-virayesh-panel">
                            <div class="jensiate-panel">
                                <label>{{ __('translation.gender') }}:</label>
                                <br>
                                @if (auth()->user()->gender == 1)
                                    <input type="radio" id="women" checked name="sex" value="women">
                                @else
                                    <input type="radio" id="women" name="sex" value="women">
                                @endif
                                <label for="women">{{ __('translation.femail') }}</label>
                                @if (auth()->user()->gender == 0)
                                    <input type="radio" id="men" name="sex" checked value="men">

                                @else
                                    <input type="radio" id="men" name="sex" value="men">
                                @endif
                                <label for="men">{{ __('translation.male') }}</label>
                            </div>

                            <input type="email" value="{{ auth()->user()->email }}" class="email-virayesh-panel">
                        </div>
                        <div class="parent-btn-virayeshe-etelaat">
                            <button class="btn-virayesh-etelaat-panel">{{ __('translation.send') }}</button>
                        </div>
                    </form>
                </section>


                <section class="parent-virayaesh-panel">
                    <div>
                        <p>{{ __('translation.change-password') }}</p>
                    </div>
                    <div class="wrapper-virayesh-panel">

                        <form action="{{ route('panel.updatePassword') }}" method="POST">
                            @csrf
                            <p>{{ __('translation.new-password') }}*:</p>
                            <input name="password" type="password">
                            <div>
                                <p>{{ __('translation.password_confirmation') }}*:</p>
                            </div>
                            <input name="password_confirmation" type="password">
                            <br>
                            <button type="submit" class="button-changepass"> {{ __('translation.change-password') }}
                            </button>
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

            <div>{{ __('translation.name') }}:{{ auth()->user()->name }}</div>
            <div>{{ __('translation.email') }}:{{ auth()->user()->email }}</div>

            <div class="parent-btn-panel">
                <button class="btn-change-password-panel"
                    id="btn-change-password-panel">{{ __('translation.change-password') }}</button>
                <form action="{{ route('logout') }}" method="POST"> @csrf<button class="btn-exit-panel"><a
                            href="#">{{ __('translation.logout') }}</a></button>
                </form>


            </div>

            <nav class="parent-menu-panel">
                <ul>
                    <li class="virayesh-panel">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        <a href="#" id="virayesh-panel">
                            {{ __('translation.change-detail') }}
                        </a>
                    </li>

                    <li>
                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                        <a href="{{ route('user.notifications.all') }}">
                            {{ __('translation.notifications') }}
                        </a>
                    </li>
                    {{-- <li>
                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                        <a href="#">
                            دوره های من
                        </a>
                    </li> --}}
                    {{-- <li>
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        <a href="#">
                            سبد خرید
                        </a>
                    </li> --}}
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
