@extends('user.layouts.master')
@section('content')
    <section>
        <div class="moshakhasat-header-photo-parent">
            <figure>
                <img src="{{ asset($project->images->path) }}">
            </figure>
        </div>
        <div class="title-khadamat-page">
            <div>
                <h1> مشخصات پروژه ...</h1>
            </div>
<<<<<<< HEAD
        </div>
        <section class="parent-article-moshakhasat">
            <section>
                <article>
                    <div class="article-moshakhasat">
                        <p>
                            {!! $project->description !!}
                        </p>
=======
            <div class="title-khadamat-page">
                <div>
                    <h1> مشخصات پروژه ...</h1>
                </div>
            </div>
            <section class="parent-article-moshakhasat">
                <section>
                    <article>
                        <div class="article-moshakhasat">
                            <p>
                                {!! $project->description !!}
                            </p>
                        </div>
                    </article>

                </section>
                <section class="title-article-moshakhasat">
                  
					 <div class="examples-project-main">
                               
                            <h3 class="project-title-h2">تصاویر اجرایی</h3>
                            <section class="examples-project-full">
                        @foreach($project_photo as $photo)
                        @if($photo->mode == 0)
                           <a> 
                               <div class="examples-project-item">
                            
                                <img src="{{asset($photo->path)}}" alt="{{asset($photo->alt)}}">
                                <p>{{$photo->name}}</p>
                                   <p>
                                       {!! $photo->description!!}
                                   </p>
                                
                            </div></a>
                        @endif
                        @endforeach
                            
                        </section> 
                        </div>
					
					 <div class="examples-project-main">
                               
                            <h3 class="project-title-h2">فضایی بیرونی</h3>
                            <section class="examples-project-full">
                            @foreach($project_photo as $photo)
                            @if($photo->mode == 1)
                            <a> 
                               <div class="examples-project-item">
                            
                                <img src="{{asset($photo->path)}}" alt="{{asset($photo->alt)}}">
                                <p>{{$photo->name}}</p>
                                   <p>
                                       {!! $photo->description!!}
                                   </p>
                                
                            </div></a>
                            @endif
                            @endforeach
                             
                        </section> 
                        </div>
                </section>

                <div class="leftbox-moshakhasatdore">
                    <div>
                        <p class="big-p">مشخصات پروژه</p>
                        <p>نام پروژه :{{$project->name}}</p>
<p>نوع پروژه :  @if ($project->type == 0)
                    ساختمانی
                    @elseif ($project->type == 1)
                    صنعتی
                    @elseif ($project->type == 2)
                    پل و تقاطع
                @endif
</p>
<p>سال طراحی : {{$project->year}}</p>
                      <p>تعداد طبقه : {{$project->floor}}</p>
                      <p>مکان: {{$project->location}}</p>
                      <p>نام مشتری :   {{$project->customer_name}}</p>
                        <p>&nbsp;مساحت:   {{$project->area}}</p>
>>>>>>> 5f28ff8d201de0af780ba263fb78f2725f587d6e
                    </div>
                </article>

            </section>
            <section class="title-article-moshakhasat">

                <div class="examples-project-main">

                    <h3 class="project-title-h2">تصاویر اجرایی</h3>
                    <section class="examples-project-full">
                        @foreach ($project_photo as $photo)
                            @if ($photo->mode == 0)
                                <a>
                                    <div class="examples-project-item">

                                        <img src="{{ asset($photo->path) }}" alt="{{ asset($photo->alt) }}">
                                        <p>{{ $photo->name }}</p>
                                        <p>
                                            {!! $photo->description !!}
                                        </p>

                                    </div>
                                </a>
                            @endif
                        @endforeach

                    </section>
                </div>

                <div class="examples-project-main">

                    <h3 class="project-title-h2">فضایی بیرونی</h3>
                    <section class="examples-project-full">
                        @foreach ($project_photo as $photo)
                            @if ($photo->mode == 1)
                                <a>
                                    <div class="examples-project-item">

                                        <img src="{{ asset($photo->path) }}" alt="{{ asset($photo->alt) }}">
                                        <p>{{ $photo->name }}</p>
                                        <p>
                                            {!! $photo->description !!}
                                        </p>

                                    </div>
                                </a>
                            @endif
                        @endforeach

                    </section>
                </div>

                <!--			  just 3-->
                <!-- <div class="examples-project-main">

                                <h3 class="project-title-h2">پروژه های مشابه</h3>
                                <section class="examples-project-full2">

                               <a href="#">
                                   <div class="examples-project-item2">

                                    <img src="imgs/b32.png" alt="">
                                    <p>عنوان</p>
                                       <p>کسب و کاردیجیتال: به تکنیک ها و عملیاتی که در فضای مجازی باعث فروش محصولات و خدمات می شود
                                    کسب و کار دیجیتال گفته می شود که به آنdigital marketing هم می گویند.</p>

                                </div></a>


                            </section>
                            </div>
         -->
            </section>

            <div class="leftbox-moshakhasatdore">
                <div>
                    <p class="big-p">مشخصات پروژه</p>
                    <p>نام پروژه :{{ $project->name }}</p>
                    <p>نوع پروژه : @if ($project->type == 0)
                            ساختمانی
                        @elseif ($project->type == 1)
                            صنعتی
                        @elseif ($project->type == 2)
                            پل و تقاطع
                        @endif
                    </p>
                    <p>سال طراحی : {{ $project->year }}</p>
                    <p>تعداد طبقه : {{ $project->floor }}</p>
                    <p>مکان: {{ $project->location }}</p>
                    <p>نام مشتری : {{ $project->customer_name }}</p>
                    <p>&nbsp;مساحت: {{ $project->area }}</p>
                </div>





            </div>


        </section>
    </section>

@endsection
