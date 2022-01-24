@extends('admin.layouts.master')
@section('sitetitle')
    گالری پروژه ها 
@endsection

@section('pagetitle')
    ساخت تصویر جدید
@endsection

@section('content')
    <form action="{{ route('admin.projects.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label style="display: inline-block;
                    max-width: 100%;
                    margin-bottom: 5px;
                    font-weight: bold;
                    ">نام  پروژه:</label>
            <select class="form-control" name="project_id">
            @foreach ($languages as $language)
                @php
                    $project = $language->langable;
                @endphp
                <option value="{{$project->id}}">{{$project->name}}</option>
            @endforeach
            </select>
        </div>
        <br/>
        <div class="form-group row">
            <label for="type"
                class="col-md-4 col-form-label text-md-right">نوع تصویر</label>
            <div class="radio">
            <label>
                <input type="radio" id="0" name="mode" value="0">اجرایی
            </label>
            <label>
                <input type="radio" id="1" name="mode" value="1">فضای بیرونی
            </label>
            </div>
        </div>
        <div style="margin-top: 25px;">
            <label for="image">عکس پروژه</label>
            <input type="file" name="image" id="image" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="image_name">نام عکس</label>
            <input type="text" name="image_name" id="image_name" required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="alt">Alt</label>
            <input type="text" name="alt" id="alt" required class="form-control">
        </div><br/>
        <div style="margin-top: 25px;">
            <label for="description">توضیحات تصویر </label>
            <textarea name="description" id="description" rows="10" cols="80"></textarea>
        </div>
        <br>
        <input type="hidden" value="{{$lang}}" name="lang">
        <div style="margin-top: 25px;">
            <button type="submit" class="btn btn-success">ثبت </button>
        </div>
    </form>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
