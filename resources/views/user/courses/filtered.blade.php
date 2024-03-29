@extends('user.layouts.master')
@section('content')
    <!-- start breadcrumb -->
    <section class="parent-breadcrumb-section parent-article-breadcrumb-section">
        <div class="breadcrumb-section">
            <ul id="breadcrumbs">
                <li><a href="{{ route('home') }}">{{ __('translation.home') }}</a></li>
                <li>
                    <a href="{{ route('front.courses.all') }}">{{ __('translation.courses') }}</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- end breadcrumb -->


    <h1 class="project-title-h1">{{ __('translation.courses') }}</h1>

    <section class="right-article-wrapper-full">
        @if ($decoration != null)

            <div class="question-project">
                <p>{!! $decoration->text !!}</p>
            </div>
        @endif

        <div class="divShowForm">
            <button class="buttonShowForm">{{ __('translation.show-filter') }}</button>
        </div>
        <form id="formID" action="{{ route('front.courses.search') }}" method="post">
            @csrf
            <fieldset>
                <legend>{{ __('translation.filters') }}</legend>

                <div class="div-filter-projects">

                    <div>
                        <lable><span class="big-p">نوع دوره</span></lable>
                        <br>
                        @if (in_array('online', $checkfilter))
                            <input name="online" checked id="0" value="1" type="checkbox">
                            <lable>{{ __('translation.online-course') }}</lable><br>
                        @else
                            <input name="online" id="0" value="1" type="checkbox">
                            <lable>{{ __('translation.online-course') }}</lable><br>
                        @endif

                        @if (in_array('offline', $checkfilter))
                            <input name="offline" checked id="1" value="1" type="checkbox">
                            <lable>{{ __('translation.offline-course') }}</lable><br>
                        @else
                            <input name="offline" id="1" value="1" type="checkbox">
                            <lable>{{ __('translation.offline-course') }}</lable><br>
                        @endif

                        @if (in_array('free', $checkfilter))
                            <input name="free" checked id="2" value="1" type="checkbox">
                            <lable>{{ __('translation.free-course') }}</lable>
                        @else
                            <input name="free" id="2" value="1" type="checkbox">
                            <lable>{{ __('translation.free-course') }}</lable>
                        @endif
                    </div>
                </div>

                <div class="submit-div">
                    <input type="submit" value="{{ __('translation.apply-filter') }}">
                </div>

            </fieldset>
        </form>
        <section class="article-text-wrapper">
            <!--examples project-demo first start                  -->
            <div class="examples-project-main">
                <h2 class="project-title-h2">{{ __('translation.filtered') }}</h2>
                <section class="examples-project-full">
                    @foreach ($filteredcourses as $course)
                        <a href="{{ route('front.courses.show', $course->id) }}">
                            <div class="examples-project-item">
                                <img src="{{ asset($course->images->path) }}" alt="{{ $course->images->alt }}"
                                    title="{{ $course->images->name }}">
                                <p>{{ $course->title }}</p>
                                <p>{!! \Illuminate\Support\Str::limit($course->introduction, '50') !!}</p>
                            </div>
                        </a>
                    @endforeach
                </section>
            </div>

        </section>

    </section>

@endsection
@section('scripts')
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend/js/formJQ.js') }}" type="text/javascript"></script>
@endsection
