@extends('user.layouts.master')
@section('content')

    <!-- start breadcrumb -->
    <section class="parent-breadcrumb-section parent-article-breadcrumb-section">
        <div class="breadcrumb-section">
            <ul id="breadcrumbs">
                <li><a href="{{ route('home') }}">خانه</a></li>
                <li>
                    <a href="{{ route('bookshelf.index') }}">کتابخانه الکترونیکی</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- end breadcrumb -->


    <h1 class="project-title-h1">کتاب ها</h1>






    <section class="right-article-wrapper-full">

        <div class="question-project">
            <p>عنوان توضیحات کلی در مورد کتاب ها</p>
            <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
        </div>






        <section class="article-text-wrapper">


            <!--                           examples project-demo first start                  -->
            <div class="examples-project-main">

                <h2 class="project-title-h2">آخرین کتاب ها</h2>
                <section class="examples-project-full">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($languages as $language)
                        @php
                            $book = $language->langable;
                        @endphp
                        @if ($i < 3)

                            <a href="{{ $book->link }}" target="_blank">
                                <div class="examples-project-item">

                                    <img src="{{ asset($book->images->path) }}" alt="{{ $book->images->alt }}"
                                        title="{{ $book->images->name }}">
                                    <p>{{ $book->name }}</p>
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
                <h3 class="project-title-h2">همه کتاب ها</h3>
                <section class="examples-project-full">
                    @foreach ($languages as $language)
                        @php
                            $book = $language->langable;
                        @endphp
                        <a href="{{ $book->link }}" target="_blank">
                            <div class="examples-project-item">

                                <img src="{{ asset($book->images->path) }}" alt="{{ $book->images->alt }}"
                                    title="{{ $book->images->name }}">
                                <p>{{ $book->name }}</p>
                            </div>
                        </a>
                    @endforeach
                </section>
            </div>
            <!--                           examples project-demo second end                  -->

        </section>

    </section>
@endsection
