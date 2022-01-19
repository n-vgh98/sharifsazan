@extends('user.layouts.master')
@section('content')

    <main>
        <!-- start breadcrumb -->
        <section class="parent-breadcrumb-section">
            <div class="breadcrumb-section">
                <ul id="breadcrumbs">
                    <li><a href="{{ route('home') }}">خانه</a></li>
                    <li>
                        <a href="{{ route('user.shopping.list.index') }}">سبد خرید</a>
                    </li>
                </ul>
            </div>
        </section>
        <!-- end breadcrumb -->

        <section class="sabd-kharid-section-box">

            <!-- start top-box -->

            <section style="border: solid" class="wrapper-sabadkharid-box">

                @foreach ($orders as $order)

                    <div class="box-one-sabadkharid" id="0">
                        <div class="row-one-sabad-kharid">
                            <figure>
                                <a href="{{ route('front.courses.show', $order->course->id) }}">
                                    <img src="{{ asset($order->course->images->path) }}"
                                        alt="{{ $order->course->images->alt }}"
                                        title="{{ $order->course->images->name }}">
                                </a>

                            </figure>

                            <div class="title-sabadekharid-about">
                                <h3>{{ $order->course->title }}</h3>
                            </div>
                        </div>

                        <nav class="nav-icon-sabadkharid">
                            <ul class="ul-icon-sabad-kharid">
                                <li>
                                    <i class="fas fa-plus-circle Increment"></i>
                                    <input type="text" name="" id="" value="1" disabled class="numb">
                                    <i class=" fas fa-minus-circle Decrement"></i>
                                    <i class="DeleteBoxSabadKharid fas fa-trash-alt"></i>
                                </li>
                        </nav>
                    </div>
                @endforeach

            </section>

            <form action="#" class="btn-sabad-for-mob">
                <button type="submit" class="btn-sabadkharid">ثبت</button>
            </form>
            <!-- end top-box -->
            <!-- btn start  -->


            <div class="parent-box-left-sabadkharid">
                <!-- title start  -->
                <div class="title-sabadkharid">
                    <p>مشاهده دوره های مشابه</p>
                </div>
                <!-- title end  -->

                @php
                    $i = 1;
                @endphp
                @foreach ($languages as $language)
                    @php
                        $course = $language->langable;
                    @endphp
                    @if ($i < 3)
                        <figure>
                            <a href="{{ route('front.courses.show', $course->id) }}">
                                <img src="{{ asset($course->images->path) }}" title="{{ $course->images->name }}"
                                    alt="{{ $course->images->alt }}">
                            </a>
                            <figcaption>معماری و انرژی پایدار</figcaption>
                        </figure>
                    @endif
                    @php
                        $i++;
                    @endphp
                @endforeach


            </div>
        </section>
        <form action="#" class="btn-sabad-kharid-tablet">
            <button type="submit" class="btn-sabadkharid">ثبت</button>
        </form>
        <!-- btn end  -->
    </main>

@endsection
@section('scripts')
    <script src="{{ asset('frontend/js/sabadkharid.js') }}"></script>
@endsection
