@extends('user.layouts.master')
@section('content')
    <!-- start breadcrumb -->
    <section class="parent-breadcrumb-section parent-article-breadcrumb-section">
        <div class="breadcrumb-section">
            <ul id="breadcrumbs">
                <li><a href="{{ route('home') }}">خانه</a></li>
                <li>
                    <a href="{{ route('front.courses.all') }}">دوره های آموزشی</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- end breadcrumb -->


    <h1 class="project-title-h1">دوره های آموزشی</h1>






    <section class="right-article-wrapper-full">

        <div class="question-project">
            <p>عنوان توضیحات کلی در مورد دوره ها</p>
            <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
        </div>
        <div class="divShowForm">

            <button class="buttonShowForm">نمایش فیلتر ها</button>

        </div>
        <form id="formID">
            <fieldset>
                <legend>فیلتر پروژه ها</legend>

                <div class="div-filter-projects">

                    <div>
                        <lable><span class="big-p">نوع دوره</span></lable>
                        <br>
                        <input type="checkbox">
                        <lable>دوره های آنلاین</lable><br>
                        <input type="checkbox">
                        <lable>دوره های آفلاین</lable><br>
                        <input type="checkbox">
                        <lable>محبوب ترین ها</lable>

                    </div>
                </div>

                <div class="submit-div">
                    <input type="submit" value="اعمال فیلتر ها">
                </div>

            </fieldset>
        </form>





        <section class="article-text-wrapper">




            <!--                           examples project-demo first start                  -->
            <div class="examples-project-main">

                <h2 class="project-title-h2">آخرین آموزش ها</h2>
                <section class="examples-project-full">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($languages as $language)
                        @php
                            $course = $language->langable;
                        @endphp
                        @if ($i < 3)
                            <a href="{{ route('front.courses.show', $course->id) }}">
                                <div class="examples-project-item">

                                    <img src="{{ asset($course->images->path) }}" alt="{{ $course->images->alt }}"
                                        title="{{ $course->images->name }}">
                                    <p>{{ $course->title }}</p>
                                    <p>{!! \Illuminate\Support\Str::limit($course->introduction, '50') !!}</p>

                                </div>
                            </a>
                        @endif
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </section>
            </div>
            <!--                           examples project-demo first start                  -->

            <!--                           examples project-demo second start                  -->
            <div class="examples-project-main">

                <h3 class="project-title-h2">محبوب ترین ها</h3>
                <section class="examples-project-full">

                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/b32.png" alt="">
                            <p>عنوان</p>
                            <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                                کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/b32.png" alt="">
                            <p>عنوان</p>
                            <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                                کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/b32.png" alt="">
                            <p>عنوان</p>
                            <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                                کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/b32.png" alt="">
                            <p>عنوان</p>
                            <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                                کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
                        </div>
                    </a>
                </section>
                <h3 class="project-title-h2">همه آموزش ها</h3>
                <section class="examples-project-full">

                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/b32.png" alt="">
                            <p>عنوان</p>
                            <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                                کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/b32.png" alt="">
                            <p>عنوان</p>
                            <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                                کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/b32.png" alt="">
                            <p>عنوان</p>
                            <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                                کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="examples-project-item">

                            <img src="imgs/b32.png" alt="">
                            <p>عنوان</p>
                            <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                                کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
                        </div>
                    </a>
                </section>
            </div>
            <!--                           examples project-demo second end                  -->

        </section>

    </section>

@endsection
@section('scripts')
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend/js/formJQ.js') }}" type="text/javascript"></script>
@endsection
