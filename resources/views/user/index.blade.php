@extends('user.layouts.master')
@section('content')

    <main class="myMargin-top">

        <div id="mydiv">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="{{ asset('frontend/imgs/swiper_slider.png') }}" style="width:100%">
                    <div class="text">Caption Text</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="{{ asset('frontend/imgs/swiper_slider.png') }}" style="width:100%">
                    <div class="text">Caption Two</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="{{ asset('frontend/imgs/swiper_slider.png') }}" style="width:100%">
                    <div class="text">Caption Three</div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>




        <h1 class="project-title-h1">{{ __('translation.sharif-sazan') }}</h1>

        @if ($decoration != null)

            <section class="why-us">

                <div>
                    <article>
                        <p>
                            {!! $decoration->text !!}
                        </p>
                    </article>
                </div>

                <figure>
                    <img src="{{ asset($decoration->image->path) }}" alt="{{ $decoration->image->alt }}"
                        title="{{ $decoration->image->name }}">
                </figure>

            </section>
        @endif

        <!--just 3-->
        <div class="examples-project-main">

            <h2 class="project-title-h2">{{ __('translation.last-projects') }}</h2>
            <section class="examples-project-full2">

                <a href="#">
                    <div class="examples-project-item2">

                        <img src="imgs/b32.png" alt="">
                        <p>عنوان</p>
                        <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                            کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>

                    </div>
                </a>
            </section>
        </div>
    </main>



@endsection
