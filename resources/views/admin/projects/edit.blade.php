@extends('admin.layouts.master')
@section('sitetitle')
    پروژه ها
@endsection

@section('pagetitle')
    ویرایش پروژه 
@endsection

@section('content')
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label style="display: inline-block;
                    max-width: 100%;
                    margin-bottom: 5px;
                    font-weight: bold;
                    ">نام  پروژه:</label>
                 <input type="text" name="name" id="name" required class="form-control" value="{{$project->name}}">
        </div>
        <br/>
        
        <div class="form-group row">
            <label for="type"
                class="col-md-4 col-form-label text-md-right">نوع پروژه</label>
            <div class="radio">
            <label>
                <input type="radio" id="0" name="type" value="0" {{ $project->type == "0" ? 'checked' : '' }}>ساختمانی
            </label>
            <label>
                <input type="radio" id="1" name="type" value="1" {{ $project->type == "1" ? 'checked' : '' }}>صنعتی 
            </label>
            <label>
                <input type="radio" id="2" name="type" value="2" {{ $project->type == "2" ? 'checked' : '' }}>پل و تقاطع 
            </label>
            </div>
        </div>

        <div class="form-group row">
            <label for="status"
                class="col-md-4 col-form-label text-md-right">وضعیت پروژه</label>
            <div class="radio">
            <label>
                <input type="radio" id="0" name="status" value="0" {{ $project->status == "0" ? 'checked' : '' }}>در حال پیشرفت
            </label>
            <label>
                <input type="radio" id="1" name="status" value="1" {{ $project->status == "1" ? 'checked' : '' }}>تکمیل شده 
            </label>
            </div>
        </div>
        <div style="margin-top: 25px;">
            <label for="year">سال ساخت:</label>
            <input id="year" type="text" class="form-control" name="year" value="{{$project->year}}" required>
        </div>
        <div style="margin-top: 25px;">
            <label for="floor">تعداد طبقات</label>
            <input id="floor" type="text" class="form-control" name="floor" value="{{$project->floor}}" required>
        </div>
        <div style="margin-top: 25px;">
            <label for="location" >مکان پروژه:</label>
            <input id="location" type="text" class="form-control" name="location" value="{{$project->location}}" required>
        </div>
        <div style="margin-top: 25px;">
            <label for="customer_name" > نام مشتری:</label>
            <input id="customer_name" type="text" class="form-control" name="customer_name" value="{{$project->customer_name}}" required>
        </div>
        <div style="margin-top: 25px;">
            <label for="area"> مساحت :</label>
            <input id="area" type="text" class="form-control" name="area" value="{{$project->area}}" required>
        </div>

        <div style="margin-top: 25px;">
            <label for="description">توضیحات تصویر </label>
            <textarea name="description" id="description" rows="10" cols="80">{{$project->description}}</textarea>
        </div>
        <br>
        <input type="hidden" value="{{$project->language->name}}" name="lang">
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
