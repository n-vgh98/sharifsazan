{{-- @extends('authentication.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


@extends('user.layouts.master')
@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />

@endsection
@section('content')
    <div class="base-div" id="base-div">


        <!--right side	-->

        <div class="right-side">
            <form class="form-right" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="gender">
                    <label for=""><b>جنسیت</b>*</label>

                    <input name="gender" value="1" class="rd" type="radio">
                    <label for=""><b>خانم</b></label>


                    <input name="gender" value="0" class="rd" type="radio">
                    <label for=""><b>آقا</b></label>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="name"><label for="" class="label1"><b>نام</b></label>
                    <input name="name" type="text" class="txt1">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="job"><label for="" class="label1"><b>شغل</b></label>
                    <input name="Job" type="text" class="txt1">
                    @error('job')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <input type="email" name="email" class="txt2" required placeholder="ایمیل ">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="phone" name="phone" class="txt2" required placeholder="شماره تماس ">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="text" name="password" class="txt2" required placeholder="رمز عبور (حداقل 7 حرف)*">
                <input type="text" name="password_confirmation" class="txt2" required
                    placeholder="تایید رمز عبور*">


                {{-- <div><input type="text" class="txt3" required placeholder="کد امنیتی">
                    <div class="code">
                        <p><b>79+3</b></p>
                    </div>
                </div> --}}

                <button type="submit" class="btn1">ثبت نام</button>

                <p class="or-sabtenamlogin ">
                    <bb>___________یا__________</bb>
                </p>
                <button class="btn2">ثبت نام/ ورود ,&nbsp; به گوگل <b>G</b></button>

            </form>
        </div>
        <!--end right side	-->





        <!--left side-->
        <div class="left-side-2">

            <div class="left-button-div">
                <button class="left-button1" id="sign-up" onClick="m2()"><b>ثبت نام</b></button>
                <button class="left-button2" id="sign-in" onClick="m1()"> <b>ورود</b></button>
            </div>
        </div>
        <!--end left side-->
    </div>
    <!--end main div-->
    <!--end sign up-->



    <!--sign in-->
    <!--main div-->
    <div class="base-div2" id="base-div2">


        <!--right side	-->

        <div class="right-side2">
            <form class="form-right2" action="{{ route('login') }}" method="POST">
                @csrf
                <input type=" email" class="txt2" name="email" required placeholder="ایمیل ">
                <input type="text" name="password" class="txt2" required placeholder="رمز عبور (حداقل 7 حرف)*">

                {{-- <div><input type="text" class="txt3" required placeholder="کد امنیتی">
                    <div class="code">
                        <p><b>79+3</b></p>
                    </div>
                </div> --}}

                <button type="submit" class="btn1">ورود</button>

                <p class="forget-pass"><a href="forgetpass.html" target="_blank">آیا رمز عبور خود را فراموش کرده
                        اید؟</a></p>


            </form>
        </div>
        <!--end right side	-->



        <!--left side-->
        <div class="left-side">

            <div class="left-button-div">
                <button class="left-button1" onClick="m2()"><b>ثبت نام</b></button>
                <button class="left-button2" id="sign-in2" onClick="m1()"> <b>ورود</b></button>
            </div>
        </div>
        <!--end left side-->
    </div>
    <!--end main div-->
@endsection
@section('scripts')
    <script>
        function m1() {
            document.getElementById("base-div2").style.display = "grid";
            document.getElementById("base-div").style.display = "none";
            document.getElementById("sign-in2").style.backgroundColor = "#FFFFFF99";
        }

        function m2() {
            document.getElementById("base-div").style.display = "grid";
            document.getElementById("base-div2").style.display = "none";
            document.getElementById("sign-up").style.backgroundColor = "#FFFFFF99";

        }
    </script>


    <script src="{{ asset('frontend/js/responsiveMenu.js') }}"></script>
@endsection
