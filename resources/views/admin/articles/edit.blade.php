@extends('admin.layouts.master')
@section('sitetitle')
    ویرایش مقاله
@endsection

@section('pagetitle')
    ویرایش مقاله
@endsection

@section('content')
    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
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
            <label for="text">متن مقاله</label>
            <textarea name="text" id="text" rows="10" cols="80">{{ $article->text }}</textarea>
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


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
