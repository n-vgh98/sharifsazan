@extends('writer.layouts.master')
@section('sitetitle')
    ویرایش صفحه
@endsection

@section('pagetitle')
    ویرایش صفحه
@endsection
@section('content')
    <form action="{{ route('writer.invites.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-top: 25px;">
            <select name="title" class="custom-select">
                <option selected>نام صفحه</option>
                <option value="0">ثبت نام</option>
                <option value="1">فرم آزمون فنی </option>
                <option value="2">فرم آزمون عملی </option>
                <option value="3">صفحه همکاری با ما </option>
            </select>
        </div>

        <div style="margin-top: 25px;">
            <select name="category_id" class="custom-select">
                <option selected>گروه مد نظر</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach

            </select>
        </div>

        <div style="margin-top: 25px;">
            <label for="text1">متن اول</label>
            <textarea name="text1" id="text1" rows="10" cols="80">{{ $page->text1 }}</textarea>
            @error('text1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div style="margin-top: 25px;">
            <label for="description">متن دوم</label>
            <textarea name="text2" id="text2" rows="10" cols="80">{{ $page->text2 }}</textarea>
            @error('text2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div style="margin-top: 25px;">
            <button class="btn btn-success">ساخت صفحه</button>
        </div>
    </form>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('text1');
        CKEDITOR.replace('text2');
    </script>
@endsection
