@extends('admin.layouts.master')
@section('content')
    <div class="alert alert-danger" role="alert">
        <p>توجه داشته باشید که برای ساخت تنظیمات حتما از دستور العمل زیر استفاده کنید:</p>
        <br>
        <p>نام صفحات:خانه(index),نمونه کارها(books),آموزش(course),مقالات(projects)
        </p>
        <br>
        <p>متن های درون پرانتز بالا را برای هر صفحه در قسمت عنوان صفحه وارد کنید</p>
    </div>

    <div class="alert alert-warning" role="alert">
        <p>بعضی از صفحات مثل مقالات عکس ندارند اما برای حلوگیری از خطا یک عکس FAKE بارگزاری کنید</p>
    </div>
    <div class="content-header bg-white text-right">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ایجاد تنظیمات جدید</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>

        {!! Form::open(['method' => 'post', 'action' => 'App\Http\Controllers\Admin\AdminPageDecorationController@store', 'files' => true]) !!}

        <div>
            {!! Form::label('page_name', 'عنوان صفحه:') !!}
            {!! Form::text('page_name', null, ['class' => 'form-control']) !!}
        </div><br>

        <div>
            {!! Form::label('meta_description', 'متا توضیحات:') !!}
            {!! Form::textarea('meta_description', null, ['class' => 'form-control']) !!}
        </div><br>
        <div>
            {!! Form::label('meta_keywords', 'متا برچسب ها:') !!}
            {!! Form::textarea('meta_keywords', null, ['class' => 'form-control']) !!}
        </div><br>
        <div>
            <div>
                {!! Form::label('text', 'متن شماره 1:') !!}
                {!! Form::textarea('text', null, ['class' => 'form-control', 'id' => 'description']) !!}
            </div><br>
        </div>


        {{-- path of photo --}}
        <div class="form-group row">
            <label for="path" class="col-md-1 col-form-label text-md-right">{{ __('عکس مقاله  ') }}</label>

            <div class="col-md-11">
                <input id="path" type="file" class="form-control" @error('path') is-invalid @enderror" name="path"
                    value="{{ old('path') }}" required autocomplete="path" autofocus>

                @error('path')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- alt of photo --}}
        <div class="form-group row">
            <label for="alt" class="col-md-1 col-form-label text-md-right">{{ __('عکس alt') }}</label>

            <div class="col-md-11">
                <input id="path" type="text" class="form-control" @error('alt') is-invalid @enderror" name="alt"
                    value="{{ old('alt') }}" required autocomplete="alt" autofocus>

                @error('alt')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- name of photo --}}
        <div class="form-group row">
            <label for="img_name" class="col-md-1 col-form-label text-md-right">{{ __('عکس name') }}</label>

            <div class="col-md-11">
                <input id="path" type="text" class="form-control" @error('img_name') is-invalid @enderror" name="img_name"
                    value="{{ old('img_name') }}" required autocomplete="img_name" autofocus>

                @error('img_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <input type="hidden" value="{{ $lang }}" name="lang">
        </input>
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
