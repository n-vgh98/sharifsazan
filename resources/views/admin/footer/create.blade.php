@extends('admin.layouts.master')
@section('content')

    <div class="content-header bg-white text-right" >
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ایجاد Footer</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <div class="container-fluid" style="width: 100%; height: 100%; ">
            <div class="col-md-10 offset-1" style="background-color: whitesmoke; margin-right: 8%;" >
                {{--@include('partials.form-errors')--}}
                {!! Form::open(['method'=>'post' , 'action'=>'Admin\AdminFooter@store']) !!}
                <div>
                    {!! Form::label('about_us','درباره ما:') !!}
                    {!! Form::textarea('about_us', null , ['class'=>'form-control']) !!}
                </div><br>
                <div>
                    {!! Form::label('address','آدرس:') !!}
                    {!! Form::textarea('address', null , ['class'=>'form-control']) !!}
                </div><br>
                <div>
                    {!! Form::label('phone_num','شماره ثابت:') !!}
                    {!! Form::text('phone_num',null,['class'=>'form-control']) !!}
                </div><br>
                <div>
                    {!! Form::label('mobile_num','شماره همراه:') !!}
                    {!! Form::text('mobile_num',null,['class'=>'form-control']) !!}
                </div><br>
                <div>
                    {!! Form::label('insta_link','لینک اینستاگرام:') !!}
                    {!! Form::text('insta_link',null,['class'=>'form-control']) !!}
                </div><br>
                <div>
                    {!! Form::label('mail_link','لینک ایمیل:') !!}
                    {!! Form::text('mail_link',null,['class'=>'form-control']) !!}
                </div><br>
                <div>
                    {!! Form::label('LinkedIn_link','لینک LinkedIn:') !!}
                    {!! Form::text('LinkedIn_link',null,['class'=>'form-control']) !!}
                </div><br>
                <div>
                    {!! Form::label('face_link','لینک فیسبوک:') !!}
                    {!! Form::text('face_link',null,['class'=>'form-control']) !!}
                </div><br>
                <div >
                    {!! Form::submit('ذخیره',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
