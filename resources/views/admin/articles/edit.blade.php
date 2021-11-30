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
            <label for="image_name">image name</label>
            <input type="text" value="{{ $article->images[0]->name }}" name="image_name" id="image_name" required
                class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="image_alt">image alt</label>
            <input type="text" value="{{ $article->images[0]->alt }}" name="alt" id="alt" required class="form-control">
        </div>



        <div style="margin-top: 25px;">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                مشاهده عکس فعلی
            </button>
            <label for="image">تغییر عکس </label>
            <input type="file" name="image" id="image" class="form-control">
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

    {{-- modal for showing image --}}
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">عکس فعلی</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset($article->images[0]->path) }}" alt="" style="height: 500px; width:500px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('text');
    </script>
@endsection
