@extends('admin.layouts.master')
@section('sitetitle')
    تیم ما
@endsection

@section('pagetitle')
   ایجاد متن جدید
@endsection

@section('content')
    <form action="{{ route('admin.our_team.update', $ourteam->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-top: 25px;">
            <label for="image">تصویر اصلی</label>
            <input type="file" name="image" id="image" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="image_name">نام عکس</label>
            <input type="text" value="{{ $ourteam->images->name }}" name="image_name" id="image_name" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="alt">Alt</label>
            <input type="text" value="{{ $ourteam->images->alt }}" name="alt" id="alt" required class="form-control">
        </div>
        <div style="margin-top: 25px;">
            <label for="text">توضیح درباره ی تیم ما </label>
            <textarea name="text" id="text" rows="10" cols="80">{{$ourteam->text}}</textarea>
        </div>
        <div style="margin-top: 25px;">
            <button type="submit" class="btn btn-success">بروزرسانی</button>
        </div>
    </form>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('text');
    </script>
@endsection
