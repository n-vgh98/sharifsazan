@extends('user.layouts.master')
@section('content')
    <section class="parent-breadcrumb-section parent-article-breadcrumb-section">
        <div class="breadcrumb-section">
            <ul id="breadcrumbs">
                <li><a href="{{ route('home') }}">خانه</a></li>
                <li><a href="#"> مقالات </a></li>
                <li>
                    <a href="#">{{ $category->title }}</a>
                </li>

            </ul>
        </div>
    </section>
    <!-- end breadcrumb -->
    <h1 class="project-title-h1">{{ $category->title }}</h1>

    <section class="right-article-wrapper-full">

        <div class="question-project">
            <p>عنوان توضیحات کلی در مورد سایت ها</p>
            <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>
        </div>





        <section class="article-text-wrapper">
            @php
                $i = 0;
            @endphp
            <!--                           examples project-demo first start                  -->
            <div class="examples-project-main">

                <h2 class="project-title-h2">پروژه ها</h2>
                <section class="examples-project-full">

                    @foreach ($category->articles as $article)
                        @if ($i < 3)


                            <a href="{{ route('article.category.show') }}">
                                <div class="examples-project-item">

                                    <img src="{{ asset($article->images->path) }}" alt="">
                                    <p>{{ $article->title }}</p>
                                    <p>{!! \Illuminate\Support\Str::limit($article->text, '130') !!}</p>

                                </div>
                            </a>
                            @php
                                $i++;
                            @endphp
                        @endif
                    @endforeach
                </section>
            </div>
            <!--                           examples project-demo first start                  -->

            <!--                           examples project-demo second start                  -->
            <div class="examples-project-main">

                <h3 class="project-title-h2">همه مقالات {{ $category->title }}</h3>
                <section class="examples-project-full">

                    @foreach ($category->articles as $article)
                        <a href="{{ route('article.category.show') }}">
                            <div class="examples-project-item">

                                <img src="{{ asset($article->images->path) }}" alt="">
                                <p>{{ $article->title }}</p>
                                <p>{!! \Illuminate\Support\Str::limit($article->text, '130') !!}</p>

                            </div>
                        </a>
                    @endforeach

                </section>
            </div>
            <!--                           examples project-demo second end                  -->
        </section>

    </section>
@endsection
