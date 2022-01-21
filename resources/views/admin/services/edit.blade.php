@extends('admin.layouts.master')
@section('sitetitle')
    ویرایش خدمات
@endsection

@section('pagetitle')
    ویرایش خدمات
@endsection

@section('content')
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">عنوان مقاله</label>
            <input class="form-control" type="text" name="title" value="{{ $service->title }}" id="title" required>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <br>
        <div>
            <label for="slug">نام مستعار(slug) </label>
            <input class="form-control" type="text" name="slug" id="slug" value="{{$service->slug}}">
        </div>
        <br>

        <div>
            <label style="display: inline-block;
                    max-width: 100%;
                    margin-bottom: 5px;
                    font-weight: bold;
                    ">نام دسته بندی</label>
            <select class="form-control" name="category">
                <option value="{{$service->category->id}}">{{$service->category->title}}</option>
            </select>
        </div>


        <div style="margin-top: 25px;">
            <label for="meta_keywords">کلمات کلیدی</label>
            <input type="text" value="{{ $service->meta_keywords }}" name="meta_keywords" id="meta_key_words" required
                class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="meta_description">meta description</label>
            <input type="text" value="{{ $service->meta_description}}" name="meta_description" id="meta_description"
                required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="description">متن خدمات</label>
            <textarea name="description" id="description" rows="10" cols="80">{{ $service->description }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input type="hidden" value="{{$service->language->name}}" name="lang">
        <div style="margin-top: 25px;">
            <button class="btn btn-success">ویرایش خدمات</button>
        </div>
    </form>

@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
