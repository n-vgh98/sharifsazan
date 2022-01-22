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
                    @auth

                    @endauth
                    @if (auth()->check())
                        <div>
                            <p> با <span id="sabtenazarclick">ثبت نظر </span>و تجربه خود به کاربران دیگر انتقال دهید
                            </p>
                        </div>
                    @else
                        <div>
                            <a href="{{ route('login') }}">برای ثبت نظر وارد حساب کاربری خود شوید</a>
                        </div>
                    @endif
                </section>

                @auth
                    <!--parent div sabt nazar-->
                    <div class="parent-sabtNazar">
                        <img class="crossSign-sabtNazar" src="{{ asset('frontend/imgs/cross-sign.png') }}" alt="#"
                            title="بستن">
                        <form action="{{ route('user.comments.store') }}" method="POST">
                            @csrf
                            <div class="boxDiv-sabtNazar">
                                <p class="p-sabtNazar">ایمیل شما<span class="span-sabtNazar"> یا شماره تماس</span></p>
                                <input name="email" disabled value="{{ auth()->user()->email }}" type="text">
                                <p class="p-sabtNazar">نظر شما</p>
                                <textarea name="text" class="nazarShomaText" rows="40" cols="5"> </textarea>
                                <input class="sendBut-sabtNazar" type="submit" value="ثبت نظر">
                                <input type="hidden" name="commentable" value="Course">
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                            </div>
                        </form>
                    </div>
                    <!--end parent div sabt nazar-->
                @endauth
                @auth
                    <h3 class="title-nazarat-moshakhasat">نظر کاربران</h3>
                    <section class="section-nazar">
                        <form class="form-nazar">
                            <fieldset>
                                <legend>نظر کاربران</legend>
                                @foreach ($comments as $comment)
                                    <div class="form-nazar-div1"><label>{{ $comment->writer->name }}</label>
                                        <textarea disabled="disabled">{{ $comment->text }}</textarea>
                                    </div>
                                    @foreach ($comment->answers as $answer)
                                        <div class="form-nazar-div2"> <label class="form-nazar-margin">Admin</label>
                                            <textarea class="form-nazar-margin"
                                                disabled="disabled">{{ $answer->text }}</textarea>
                                        </div>
                                    @endforeach
                                    <hr>
                                @endforeach

                            </fieldset>
                        </form>
                    </section>
                @endauth
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

                <form class="parent-btn-moshakhasat-sabadekharid" method="POST"
                    action="{{ route('user.shopping.list.add', $course->id) }}">
                    @csrf
                    <button class="btn-moshakhasat-sabadekharid">
                        <a href="#"> افزودن به سبد خرید</a>
                    </button>
                </form>
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
