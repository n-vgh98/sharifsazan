@extends('user.layouts.master')
@section('content')
    <section class="parent-breadcrumb-section parent-article-breadcrumb-section">
        <div class="breadcrumb-section">
            <ul id="breadcrumbs">
                <li><a href="{{ route('home') }}">{{ __('translation.home') }}</a></li>
                <li>
                    <a href="{{ route('user.notifications.all') }}">{{ __('translation.notifications') }}</a>
                </li>
            </ul>
        </div>

    </section>
    <div class="title-khadamat-page">
        <div>
            <h1> {{ __('translation.notifications') }}</h1>
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
                        <a href="#">{{ __('translation.see-more') }}</a>
                    </div>

                </div>
            </section>
        @endforeach
        @foreach ($privatenotifications as $privatenotification)


            <section class="parent-box-news">
                <div class="text-news">
                    <h3>{{ $privatenotification->title }}</h3>
                    <a href="{{ $privatenotification->link }}"><i class="fa fa-link"></i> Link</a>
                </div>
                <div class="text-box-news">
                    {{ $privatenotification->text }}
                </div>
                <div class="parent-btn-more-news">
                    <div class=" btn-more-news">
                        <a href="#">{{ __('translation.see-more') }}</a>
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
