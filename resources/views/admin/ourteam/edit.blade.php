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
            <label for="image_1">تصویر اول اسلایدر </label>
            <input type="file" name="image_1" id="image_1" required class="form-control">
        </div>
        <div style="margin-top: 25px;">
            <label for="image_1_name">نام عکس</label>
            <input type="text" name="image_1_name" id="image_1_name" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="alt_1">Alt</label>
            <input type="text" name="alt_1" id="alt_1" required class="form-control">
        </div>
        <div style="margin-top: 25px;">
            <label for="image_2">تصویر دوم اسلایدر </label>
            <input type="file" name="image_2" id="image_2" required class="form-control">
        </div>
        <div style="margin-top: 25px;">
            <label for="image_2_name">نام عکس</label>
            <input type="text" name="image_2_name" id="image_2_name" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="alt_2">Alt</label>
            <input type="text" name="alt_2" id="alt_2" required class="form-control">
        </div>
        <div style="margin-top: 25px;">
            <label for="image_3">تصویر سوم اسلایدر </label>
            <input type="file" name="image_3" id="image_3" required class="form-control">
        </div>
        <div style="margin-top: 25px;">
            <label for="image_3_name">نام عکس</label>
            <input type="text" name="image_3_name" id="image_3_name" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="alt_3">Alt</label>
            <input type="text" name="alt_3" id="alt_3" required class="form-control">
        </div>
        <div style="margin-top: 25px;">
            <label for="text">توضیح درباره ی تیم ما </label>
            <textarea name="text" id="text" rows="10" cols="80"></textarea>
        </div>
        <div style="margin-top: 25px;">
            <button type="submit" class="btn btn-success">ذخیره</button>
        </div>
    </form>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('text');
    </script>
@endsection
