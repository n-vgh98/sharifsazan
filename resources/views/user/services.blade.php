@extends('user.layouts.master')
@section('content')

<section class="khadamat-main-section">
<div>
    <figure class="khadamat-img-section">
        <img src="{{asset($service->images->path)}}">
    </figure>
</div>

<div class="title-khadamat-page">
    <div>
        <h1> {{$service->title}}</h1>
    </div>
</div>
<section class="khadamat-article-nav">
    <div class="khadamat-parent-article">
        <div>
            {!! $service->description !!}
        </div>

    </div>

    <div class="khadamat-parent-box-left">
        <div class="khadamat-box-left">
            <div>
                <form class="khadamat-form-search-box" action="">
                    <div class="khadamat-box-search">
                        <i class="fa fa-search " aria-hidden="true"></i>
                    </div>
                    <div class="khadamat-form-search-box-input">
                        <input type="search" name="" id="" placeholder="جستجو">
                    </div>
                </form>
            </div>
            <!-- <nav class="khadamat-searchbox-nav"> -->
                <!-- <div class="khadamat-toggle">
                    <a href="#">توجیه طرح مبنای اقتصاد</a>
                </div>
                <div class="khadamat-toggle">
                    <p>
                        طراحی و شبیه سازی
                        <i class="fas fa-chevron-down"></i>
                    </p>
                </div>
                <ul class="khadamat-wrapper">
                    <li>
                        <a href="#">
                            سازه ساختمانی
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            مسطح پل و تقاطع غیر

                        </a>
                    </li>
                </ul>
                <div class="khadamat-toggle"><a href="#"> طرح توجیهی مجتمع های ساختمانی</a></div> -->

            <!-- </nav> -->

        </div>
    </div>

</section>

<!-- END SECION KHADAMAT -->
</section>
<!-- arrow function  -->
<div class="arrow-function-scroll ">
<a href="#go-to-top">
    <span>
        <i class="fa fa-angle-double-up"></i>
    </span>
</a>

</div>
@endsection
