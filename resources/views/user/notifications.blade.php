@extends('user.layouts.master')
@section('content')
    <section class="parent-breadcrumb-section parent-article-breadcrumb-section">
        <div class="breadcrumb-section">
            <ul id="breadcrumbs">
                <li><a href="{{ route('home') }}">خانه</a></li>
                <li>
                    <a href="{{ route('user.notifications.all') }}">اطلاعیه</a>
                </li>
            </ul>
        </div>

    </section>
    <div class="title-khadamat-page">
        <div>
            <h1> اطلاعیه</h1>
        </div>
    </div>
    <section class="parent-parent-box-news">
        @foreach ($notifications as $notification)


            <section class="parent-box-news">
                <div class="text-news">
                    <h3>{{ $notification->title }}</h3>
                    <a href="{{ $notification->link }}"><i class="fa fa-link"></i> Link</a>
                </div>
                <div class="text-box-news">
                    {{ $notification->text }}
                </div>
                <div class="parent-btn-more-news">
                    <div class=" btn-more-news">
                        <a href="#">دیدن جزئیات بیشتر</a>
                    </div>

                </div>
            </section>
        @endforeach
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('frontend/js/akhabar.js') }}"> </script>
    <script src="{{ asset('frontend/js/responsiveMenu.js') }}"></script>
@endsection
