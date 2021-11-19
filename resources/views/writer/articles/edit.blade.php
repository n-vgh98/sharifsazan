@extends('writer.layouts.master')
@section('sitetitle')
    ویرایش مقاله
@endsection

@section('pagetitle')
    ویرایش مقاله
@endsection

@section('content')
    <form action="{{ route('writer.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">عنوان مقاله</label>
            <input class="form-control" type="text" name="title" value="{{ $article->title }}" id="title" required>
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
            <label for="meta_key_words">کلمات کلیدی</label>
            <input type="text" value="{{ $article->meta_key_words }}" name="meta_key_words" id="meta_key_words" required
                class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="meta_descriptions">meta description</label>
            <input type="text" value="{{ $article->meta_descriptions }}" name="meta_descriptions" id="meta_descriptions"
                required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="text">متن مقاله</label>
            <textarea name="text" id="text" rows="10" cols="80">{{ $article->text }}</textarea>
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <input type="hidden" name="lang" value="{{ $lang }}">
        <div style="margin-top: 25px;">
            <button class="btn btn-success">ویرایش مقاله</button>
        </div>
    </form>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('text');
    </script>
@endsection
