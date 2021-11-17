@extends('writer.layouts.master')
@section('sitetitle')
    ساخت مقاله
@endsection

@section('pagetitle')
    ساخت مقاله جدید
@endsection

@section('content')
    <form action="{{ route('writer.articles.store') }}" method="POST" enctype="multipart/form-data">
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

            <select name="language" class="custom-select">
                <option selected>زبان مقاله</option>
                <option value="1">اینگلیسی</option>
                <option value="0">فارسی</option>
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
            <label for="text">متن مقاله</label>
            <textarea name="text" id="text" rows="10" cols="80"></textarea>
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div style="margin-top: 25px;">
            <button class="btn btn-success">ساخت مقاله</button>
        </div>
    </form>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('text');
    </script>
@endsection
