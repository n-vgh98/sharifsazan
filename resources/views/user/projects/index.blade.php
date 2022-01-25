@extends('user.layouts.master')
@section('content')

<section class="parent-breadcrumb-section parent-article-breadcrumb-section">
                <div class="breadcrumb-section">
                    <ul id="breadcrumbs">
                        <li><a href="{{ route('home') }}">{{ __('translation.home') }}</a></li>
                        <li>
                            <a href="{{route('project.index')}}">{{ __('translation.projects') }}</a>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- end breadcrumb -->
             <h1 class="project-title-h1">{{ __('translation.projects') }} </h1>
                <section class="right-article-wrapper-full">
                    
                    <div class="question-project">
                         <p>
                            {!! $decoration->text !!}
                        </p>
                    </div>
                    <section class="article-text-wrapper">
                        
<!--                           examples project-demo first start                  -->
                           <div class="examples-project-main">
                               
                            <h2 class="project-title-h2">پروژه ها</h2>
                            <section class="examples-project-full">
                        @foreach($languages as $language)
                            @php
                                $project = $language->langable;
                            @endphp
                           <a href="{{route('project.show.details',$project->name)}}"> 
                               <div class="examples-project-item">
                                
                                <img src="{{asset($project->images->path)}}" alt="{{asset($project->images->alt)}}">
                                <p>{{$project->name}}</p>
                                   <p>{!! $project->description !!}</p>
                                
                            </div></a>
                        @endforeach
                        </section> 
                        </div>
<!--                           examples project-demo first start                  -->
                        
<!--                           examples project-demo second start                  -->
                           <div class="examples-project-main">
                               
                            <h3 class="project-title-h2">جدید ترین پروژه ها</h3>
                            <section class="examples-project-full">
                            @foreach($languages as $language)
                            @php
                                $project = $language->langable;
                                $project->orderBy('created_at','desc')->take(6);
                            @endphp
                            <a href="{{route('project.show.details',$project->name)}}"> 
                               <div class="examples-project-item">
                                
                                <img src="{{asset($project->images->path)}}" alt="{{asset($project->images->alt)}}">
                                <p>{{$project->name}}</p>
                                   <p>{!! $project->description !!}</p>
                                
                            </div></a>
                            @endforeach
                        </section>
 
							   
							   <h3 class="project-title-h2">پروژه های در حال ساخت</h3>
                            <section class="examples-project-full">
                            @foreach($languages as $language)
                            @php
                                $project = $language->langable;
                            @endphp
                            @if($project->status == 0)
                            <a href="{{route('project.show.details',$project->name)}}"> 
                               <div class="examples-project-item">
                                
                                <img src="{{asset($project->images->path)}}" alt="{{asset($project->images->alt)}}">
                                <p>{{$project->name}}</p>
                                   <p>{!! $project->description !!}</p>
                                
                            </div></a>
                            @endif
                            @endforeach
                        </section>
                        </div>
<!--                           examples project-demo second end                  -->
                        
                    </section>
            
                </section>
@endsection
