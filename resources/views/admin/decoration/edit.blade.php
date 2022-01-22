@extends('admin.layouts.master')
@section('content')
    <div class="content-header bg-white text-right">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">تغییر تنظیمات </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>

        {!! Form::open(['method'=>'PATCH' , 'action'=>['App\Http\Controllers\Admin\AdminPageDecorationController@update',$article->id],'files'=>true]) !!}

        <div>
            {!! Form::label('page_name', 'عنوان صفحه:') !!}
            {!! Form::text('page_name', $article->page_name, null, ['class' => 'form-control']) !!}
        </div><br>

        <div>
            {!! Form::label('meta_description', 'متا توضیحات:') !!}
            {!! Form::textarea('meta_description', $article->meta_description, ['class' => 'form-control']) !!}
        </div><br>
        <div>
            {!! Form::label('meta_keywords', 'متا برچسب ها:') !!}
            {!! Form::textarea('meta_keywords', $article->meta_keywords, ['class' => 'form-control']) !!}
        </div><br>
        <div>
            <div>
                {!! Form::label('text', 'متن شماره 1:') !!}
                <? echo htmlspecialchars($contentFromDB); ?>
                {!! Form::textarea('text', $article->text, null, ['class' => 'form-control', 'id' => 'description']) !!}
            </div><br>
        </div>

        <input type="hidden" value="{{$article->lang->name}}" name="lang">
        <div>
            {!! Form::submit('ذخیره', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('adminpanel/ckeditor/adapters/jquery.js') }}"></script>
    <script>
        CKEDITOR.replace('text', {
            language: 'fa',
        });
        CKEDITOR.replace('text_2', {
            language: 'fa',
        });
        CKEDITOR.replace('text_3', {
            language: 'fa',
        });
        CKEDITOR.replace('text_4', {
            language: 'fa',
        });
    </script>
@endsection
