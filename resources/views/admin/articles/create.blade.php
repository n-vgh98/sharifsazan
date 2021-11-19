@extends('admin.layouts.master')
@section('sitetitle')
    ساخت مقاله
@endsection

@section('pagetitle')
    ساخت مقاله جدید
@endsection

@section('content')
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">عنوان مقاله</label>
            <input class="form-control" type="text" name="title" id="title" required>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div style="margin-top: 25px;">
            <select name="category_id" class="custom-select">
                <option selected>نام دسته بندی</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach

            </select>
        </div>

        <div style="margin-top: 25px;">
            <label for="image">عکس دوره</label>
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
            <label for="meta_key_words">کلمات کلیدی</label>
            <input type="text" name="meta_key_words" id="meta_key_words" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="meta_description">meta description</label>
            <input type="text" name="meta_descriptions" id="meta_descriptions" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="text">متن مقاله</label>
            <textarea name="text" id="text" rows="10" cols="80"></textarea>
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <input type="hidden" name="lang" value="{{ $lang }}">
        <div style="margin-top: 25px;">
            <button type="submit" class="btn btn-success">ساخت مقاله</button>
        </div>
    </form>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('text');
    </script>
@endsection
