@extends('user.layouts.master')
@section('content')

    <section class="parent-breadcrumb-section parent-article-breadcrumb-section">
        <div class="breadcrumb-section">
            <ul id="breadcrumbs">
                <li><a href="{{ route('home') }}">{{ __('translation.home') }}</a></li>
                <li>
                    <a href="{{ route('project.index') }}">{{ __('translation.projects') }}</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- end breadcrumb -->


    <h1 class="project-title-h1">{{ __('translation.projects') }} </h1>






    <section class="right-article-wrapper-full">

        @if ($decoration != null)


            <div class="question-project">
                <p>

                    {!! $decoration->text !!}
                </p>
            </div>
        @endif
        <div class="divShowForm">

            <button class="buttonShowForm">نمایش فیلتر ها</button>

        </div>
        <form id="formID">
            <fieldset>
                <legend>فیلتر پروژه ها</legend>

                <div class="div-filter-projects">

                    <div>
                        <lable><span class="big-p">نوع</span></lable>
                        <br>
                        <input type="checkbox">
                        <lable>مجتمع ساختمانی</lable><br>
                        <input type="checkbox">
                        <lable>مجتمع صنعتی</lable><br>
                        <input type="checkbox">
                        <lable>پل و نقاطع غیر مسطح</lable>

                    </div>
                    <div>
                        <lable><span class="big-p">مفهومی</span></lable>
                        <br>
                        <input type="checkbox">
                        <lable>تکمیل شده</lable><br>
                        <input type="checkbox">
                        <lable>در حال پیشرفت</lable><br>

                    </div>
                    <div>
                        <lable><span class="big-p">مرتب سازی</span></lable>
                        <br>
                        <input type="checkbox">
                        <lable>پیش فرض</lable><br>
                        <input type="checkbox">
                        <lable>مقیاس و منطقه</lable><br>
                        <input type="checkbox">
                        <lable>سال</lable><br>
                        <input type="checkbox">
                        <lable>متراژ پروژه</lable><br>
                        <input type="checkbox">
                        <lable>ارتفاع</lable>

                    </div>
                </div>

                <div class="submit-div">
                    <input type="submit" value="اعمال فیلتر ها">
                </div>

            </fieldset>
        </form>





        <section class="article-text-wrapper">




            <!--                           examples project-demo first start                  -->
            <div class="examples-project-main">

                <h2 class="project-title-h2">پروژه ها</h2>
                <section class="examples-project-full">
                    @foreach ($languages as $language)
                        @php
                            $project = $language->langable;
                        @endphp
                        <a href="{{ route('project.show.details', $project->name) }}">
                            <div class="examples-project-item">

                                <img src="{{ asset($project->images->path) }}" alt="{{ asset($project->images->alt) }}">
                                <p>{{ $project->name }}</p>
                                <p>{!! $project->description !!}</p>

                            </div>
                        </a>
                    @endforeach
                </section>
            </div>
            <!--                           examples project-demo first start                  -->

            <!--                           examples project-demo second start                  -->
            <div class="examples-project-main">

                <h3 class="project-title-h2">جدید ترین پروژه ها</h3>
                <section class="examples-project-full">
                    @foreach ($languages as $language)
                        @php
                            $project = $language->langable;
                            $project->orderBy('created_at', 'desc')->take(6);
                        @endphp
                        <a href="{{ route('project.show.details', $project->name) }}">
                            <div class="examples-project-item">

                                <img src="{{ asset($project->images->path) }}"
                                    alt="{{ asset($project->images->alt) }}">
                                <p>{{ $project->name }}</p>
                                <p>{!! $project->description !!}</p>

                            </div>
                        </a>
                    @endforeach
                </section>


                <h3 class="project-title-h2">پروژه های در حال ساخت</h3>
                <section class="examples-project-full">
                    @foreach ($languages as $language)
                        @php
                            $project = $language->langable;
                        @endphp
                        @if ($project->status == 0)
                            <a href="{{ route('project.show.details', $project->name) }}">
                                <div class="examples-project-item">

                                    <img src="{{ asset($project->images->path) }}"
                                        alt="{{ asset($project->images->alt) }}">
                                    <p>{{ $project->name }}</p>
                                    <p>{!! $project->description !!}</p>

                                </div>
                            </a>
                        @endif
                    @endforeach
                </section>
            </div>
            <!--                           examples project-demo second end                  -->

        </section>

    </section>
@endsection
