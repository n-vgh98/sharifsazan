@extends('user.layouts.master')
@section('content')

    <section>
        <div class="moshakhasat-header-photo-parent">
            <figure>
                <img src="imgs/architecture-g92e1743c5_1920[1] 1 (1).png">
            </figure>
        </div>
        <div class="title-khadamat-page">
            <div>
                <h1>{{ __('translation.course-information') }}</h1>
            </div>
        </div>
        <section class="parent-article-moshakhasat">
            <section>
                <article>

                    <div class="article-moshakhasat">
                        <p>
                            {!! $course->introduction !!}
                        </p>
                    </div>
                </article>

            </section>
            <section class="title-article-moshakhasat">
                <h3>{{ __('translation.introduction-video') }}</h3>
                <div class="videopart-moshakhasat">

                    <video src="{{ $course->introduction_v_link }}" controls type="video/mp4" poster="imgs/404.jpg">
                    </video>

                </div>
                <div class="">
                    {!! $course->description !!}
                </div>
                </article>
                <section class="parent-nazarat-moshakhasat">
                    <h3 class="title-nazarat-moshakhasat ">{{ __('translation.comment-and-feedback') }}</h3>
                    <div class="parent-chart-moshakhasat">
                        <canvas id="myChart" class="hw"></canvas>
                    </div>
                    @auth
                        <div>
                            <p> با <span id="sabtenazarclick">ثبت نظر </span>و تجربه خود به کاربران دیگر انتقال دهید
                            </p>
                        </div>
                    @endauth
                </section>

                @auth

                    <!--parent div sabt nazar-->
                    <div class="parent-sabtNazar">
                        <img class="crossSign-sabtNazar" src="{{ asset('frontend/imgs/cross-sign.png') }}" alt="#"
                            title="بستن">

                        <div class="boxDiv-sabtNazar">


                            <p class="p-sabtNazar">ایمیل شما<span class="span-sabtNazar"> یا شماره تماس</span></p>
                            <input type="text">
                            <p class="p-sabtNazar">نظر شما</p>
                            <textarea class="nazarShomaText" rows="40" cols="5"> </textarea>

                            <input class="sendBut-sabtNazar" type="submit" value="ثبت نظر">

                        </div>
                    </div>
                    <!--end parent div sabt nazar-->


                @endauth



                <div class="parent-nazaratform-moshakhasat">
                    <h3 class="title-article-moshakhasat"> نظرات شرکت کنندگان</h3>
                    <div class="nazarat-sherkatkonandegan-moshakhasat">
                        <form action="/action_page.php">
                            <label for="fanebayan">فن بیان مدرس:</label>
                            <select id="fanebayan" name="fanebayan">
                                <option value="1">1 </option>
                                <option value="2">2 </option>
                                <option value="3">3 </option>
                                <option value="4">4 </option>
                                <option value="5">5 </option>
                                <option value="6">6 </option>
                                <option value="7">7 </option>
                                <option value="8">8 </option>
                                <option value="9">9 </option>
                                <option value="10">10</option>
                            </select>
                            <label for="kharidbesarfe">خرید به صرفه:</label>
                            <select id="kharidbesarfe" name="kharidbesarfe">
                                <option value="1">1 </option>
                                <option value="2">2 </option>
                                <option value="3">3 </option>
                                <option value="4">4 </option>
                                <option value="5">5 </option>
                                <option value="6">6 </option>
                                <option value="7">7 </option>
                                <option value="8">8 </option>
                                <option value="9">9 </option>
                                <option value="10">10</option>
                            </select>
                            <label for="keifiatdore">کیفیت دوره اموزشی:</label>
                            <select id="keifiatdore" name="keifiatdore">
                                <option value="1">1 </option>
                                <option value="2">2 </option>
                                <option value="3">3 </option>
                                <option value="4">4 </option>
                                <option value="5">5 </option>
                                <option value="6">6 </option>
                                <option value="7">7 </option>
                                <option value="8">8 </option>
                                <option value="9">9 </option>
                                <option value="10">10</option>
                            </select>
                            <label for="mofid">مفید و موثر بودن دوره:</label>
                            <select id="mofid" name="mofid">
                                <option value="1">1 </option>
                                <option value="2">2 </option>
                                <option value="3">3 </option>
                                <option value="4">4 </option>
                                <option value="5">5 </option>
                                <option value="6">6 </option>
                                <option value="7">7 </option>
                                <option value="8">8 </option>
                                <option value="9">9 </option>
                                <option value="10">10</option>
                            </select>

                        </form>
                    </div>
                </div>

                <div class="parent-sabtenazar-moshakhasat">
                    <button class="sabtenazar-moshakhasat">
                        <a href="#">

                            {{ __('translation.send') }} </a>
                    </button>
                </div>
            </section>

            <div class="leftbox-moshakhasatdore">
                <div>
                    @if ($course->type == 1)
                        <p>نوع دوره:فیزیکی</p>
                    @else
                        <p>نوع دوره:الکترونیکی</p>
                    @endif

                </div>
                <div class="price-moshakhasat-boxleft">
                    <p>هزینه :{{ $course->price }} تومان</p>
                    <p class="price-moshakhasat-boxleft-style"> {{ $course->off }}% تخفیف </p>
                </div>
                <div>
                    @if ($course->licensable == 1)
                        <p>گواهینامه :دارد</p>
                    @else
                        <p>گواهینامه :ندارد</p>

                    @endif
                </div>

                <div class="img-parent-master-moshakhasat">
                    <figure><img src="{{ asset($course->master_pic_path) }}"></figure>


                </div>

                <div class="namedars-moshakhasat">
                    <p>نام درس:{{ $course->master_name }}</p>
                    <p>عنوان شغلی:{{ $course->master_job }}</p>
                </div>

                <div class="parent-btn-moshakhasat-sabadekharid">
                    <button class="btn-moshakhasat-sabadekharid">
                        <a href="#"> افزودن به سبد خرید</a>
                    </button>
                </div>
            </div>


        </section>
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
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
    <script src="{{ asset('frontend/js/chart.js') }}"></script>
    <script src="{{ asset('frontend/js/arrow.js') }}"></script>
    <script src="{{ asset('frontend/js/nazarShoma.js') }}"></script>
@endsection
