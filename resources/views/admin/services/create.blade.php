@extends('admin.layouts.master')
@section('sitetitle')
    ساخت خدمات
@endsection

@section('pagetitle')
    ساخت خدمات جدید
@endsection

@section('content')
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">عنوان خدمات</label>
            <input class="form-control" type="text" name="title" id="title" required>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><br>
        <div>
            <label for="slug">نام مستعار(slug) </label>
            <input class="form-control" type="text" name="slug" id="slug">
        </div>
        <br>
        <div>
            <label style="display: inline-block;
                    max-width: 100%;
                    margin-bottom: 5px;
                    font-weight: bold;
                    ">نام دسته بندی:</label>
            <select class="form-control" name="category">
            @foreach ($languages as $language)
                @php
                    $category = $language->langable;
                @endphp
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
            </select>
        </div>

        <div style="margin-top: 25px;">
            <label for="image">عکس خدمات</label>
            <input type="file" name="image" id="image" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="image_name">نام عکس</label>
            <input type="text" name="image_name" id="image_name" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="alt">Alt</label>
            <input type="text" name="alt" id="alt" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="meta_keywords">کلمات کلیدی</label>
            <input type="text" name="meta_keywords" id="meta_keywords" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="meta_description">meta description</label>
            <input type="text" name="meta_description" id="meta_description" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="description">متن خدمات</label>
            <textarea name="description" id="description" rows="10" cols="80"></textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input type="hidden" value="{{$lang}}" name="lang">
        <div style="margin-top: 25px;">
            <button type="submit" class="btn btn-success">ساخت خدمات</button>
        </div>
    </form>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
