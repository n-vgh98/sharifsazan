@extends('user.layouts.master')
@section('content')
    <section class="khadamat-main-section">

        <div>
            <figure class="khadamat-img-section">
                <img src="{{ asset($article->images->path) }}" alt="{{ asset($article->images->alt) }}"
                    title="{{ asset($article->images->name) }}">
            </figure>
        </div>
        <div class="title-khadamat-page">
            <div>
                <h1> {{ $article->title }}</h1>
            </div>
        </div>
        <section class="khadamat-article-nav">
            <div class="khadamat-parent-article">
                <div>
                    <h2>{{ $article->title }}</h2>
                    <article>{!! $article->text !!}</article>
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
                    <nav class="khadamat-searchbox-nav">
                        @foreach ($article->category->articles as $article1)
                            <div class="khadamat-toggle">
                                <a href="{{ route('article.category.show', $article->id) }}">{{ $article->title }}</a>
                            </div>
                        @endforeach
                    </nav>
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
