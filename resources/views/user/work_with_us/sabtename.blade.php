@extends('user.layouts.master')
@section('content')

    <main>


        <!-- start breadcrumb -->
        <section class="parent-breadcrumb-section parent-article-breadcrumb-section">
            <div class="breadcrumb-section">
                <ul id="breadcrumbs">
                    <li><a href="{{ route('home') }}">خانه</a></li>
                    <li>
                        <a href="{{ route('user.work.with.us.show', $page->category->id) }}">دعوت به همکاری</a>
                    </li>
                    <li><a href="#"> فرم ثبت نام</a></li>
                </ul>
            </div>
        </section>
        <!-- end breadcrumb -->
        <section class="parent-img-and-text-davat">

            <!-- end  top img -->

            <article class="article-pages-a">
                <div class="tilte-pages-a">
                    <h3>دعوت به همکاری</h3>
                </div>

                <p>{!! $page->text1 !!}</p>
            </article>
            <section class="section-one-davat">
                <figure>
                    <img src="{{ asset($page->images->path) }}" alt="{{ $page->images->alt }}"
                        title="{{ $page->images->name }}">
                </figure>
            </section>
        </section>

        <section class="parent-breadcrumb-section parent-article-breadcrumb-section">
            <div class="breadcrumb-section">
                <ul id="breadcrumbs">
                    <li><i class="fa fa-link"></i><a href="{{ $page->category->register_form_link }}">link</a> </li>

                </ul>
            </div>
        </section>




    </main>

@endsection
