@extends('user.layouts.master')
@section('content')


    <section class="parent-breadcrumb-section">
        <div class="breadcrumb-section">
            <ul id="breadcrumbs">
                <li><a href="{{ route('home') }}">خانه</a></li>
                <li>
                    <a href="#">نتیجه ازمون</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- end breadcrumb -->
    <!--	........................start of username-success.................-->

    <p class="user-name-successfull">نام کاربر: {{ auth()->user()->name }}</p>

    <!--	........................end of username-success.................-->




    <!--	........................start of azmun.................-->

    <div class="parent-successfull">
        <div>
            @if ($karname->status == 1)
                <img src="{{ asset('frontend/imgs/check.png') }}" alt="" title="" class="img-successfull">
            @else
                <img src="{{ asset('frontend/imgs/close.png') }}" alt="" title="" class="img-successfull">
            @endif

        </div>
        @if ($karname->status == 1)
            <p>شما موفق به کسب نمره قبولی شده اید</p>
        @else
            <p>شما موفق به کسب نمره قبولی نشده اید</p>
        @endif



        <div class="azmun-success">

            <div class="input-success">
                <p class="azmun-text">آزمون فنی: </p>
                <p class="azmun-text">{{ $karname->fani }}</p>
            </div>

            <div class="input-success">
                <p class="azmun-text">آزمون عملی: </p>
                <p class="azmun-text">{{ $karname->amali }}</p>
            </div>

            <div class="input-success">
                <p class="azmun-text">نمره نهایی: </p>
                <p class="azmun-text">{{ $karname->final }}</p>
            </div>


        </div>

    </div>

@endsection
