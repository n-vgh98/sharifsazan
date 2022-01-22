@extends('user.layouts.master')
@section('content')

    <main>


        <!-- start breadcrumb -->
        <section class="parent-breadcrumb-section">
            <div class="breadcrumb-section">
                <ul id="breadcrumbs">
                    <li><a href="{{ route('home') }}">خانه</a></li>
                    <li>
                        <a href="#">دعوت به همکاری</a>
                    </li>
                </ul>
            </div>
        </section>
        <!-- end breadcrumb -->
        <section class="parent-img-and-text-davat">

            <!-- end  top img -->

            <article class="article-pages-a">
                <p>
                    {!! $page->text1 !!}
                </p>
            </article>
            <section class="section-one-davat">
                <figure>
                    <img src="{{ asset($page->images->path) }}" alt="{{ $page->images->alt }}"
                        title="{{ $page->images->name }}">
                </figure>
            </section>
        </section>
        <!-- start top img -->




        <section class="section-boxes-davat">
            <!-- box-1  -->
            <div class="box-davat-page">
                <a href="{{ route('user.work.with.us.sabtename', $page->category->id) }}">
                    <div class="box-davat-page-div">
                        <img src="{{ asset('frontend/imgs/Group 1386.png') }}" alt="">

                    </div>
                    <div class="text-box-davat">

                        <p>تکمیل فرم</p>

                    </div>
                </a>
            </div>

            <!-- box-2  -->

            <div class="box-davat-page">
                <a href="{{ route('user.work.with.us.fani', $page->category->id) }}">
                    <div class="box-davat-page-div">

                        <img src="{{ asset('frontend/imgs/Group 1387.png') }}" alt="">


                    </div>
                    <div class="text-box-davat">

                        <p>آزمون فنی</p>

                    </div>
                </a>
            </div>
            <!-- box-3 -->
            <div class="box-davat-page">
                <a href="{{ route('user.work.with.us.amali', $page->category_id) }}">
                    <div class="box-davat-page-div">

                        <img src="{{ asset('frontend/imgs/Group 1388.png') }}" alt="">

                    </div>
                    <div class="text-box-davat">
                        <p>آزمون عملی</p>

                    </div>
                </a>
            </div>
            <!-- box-4 -->
            @auth

                <div class="box-davat-page">
                    <a href="{{ route('user.work.with.us.karname', $page->category->id) }}">
                        <div class="box-davat-page-div">
                            <img src="{{ asset('frontend/imgs/Group 1385.png') }}" alt="">
                        </div>
                        <div class="text-box-davat">
                            <p>نمره نهایی</p>
                        </div>
                    </a>
                </div>
            @endauth
        </section>


        <article class="article-pages-a">


            <p>
                {!! $page->text2 !!}
            </p>
        </article>


        <!-- arrow function  -->
        <div class="arrow-function-scroll ">
            <a href="#go-to-top">
                <span>
                    <i class="fa fa-angle-double-up"></i>
                </span>
            </a>

        </div>

    </main>

@endsection
@section('scripts')
    <script src="{{ asset('frontend/js/arrow.js') }}"></script>
@endsection
