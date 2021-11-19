@extends('admin.layouts.master')
@section('sitetitle')
    ویرایش دوره
@endsection

@section('pagetitle')
    ویرایش دوره
@endsection
@section('content')

    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
        @csrf
        <div>
            <label for="title">عنوان دوره</label>
            <input class="form-control" value="{{ $course->title }}" type="text" name="title" id="title" required
                placeholder="آموزش رایگان اتوکد">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div style="margin-top: 25px;">
            <label for="price">قیمت دوره</label>
            <input class="form-control" value="{{ $course->price }}" type="number" name="price" id="price" required
                placeholder="قیمت به تومان(فقط عدد وارد شود)">
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div style="margin-top: 25px;">
            <label for="master_name">نام استاد</label>
            <input class="form-control" value="{{ $course->master_name }}" type="text" name="master_name"
                id="master_name" required>
            @error('master_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div style="margin-top: 25px;">
            <label for="master_job">شغل استاد</label>
            <input class="form-control" value="{{ $course->master_job }}" type="text" name="master_job" id="master_job"
                required>
            @error('master_job')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div style="margin-top: 25px;">
            <label for="link">لینک دوره</label>
            <input class="form-control" type="text" value="{{ $course->link }}" name="link" id="link"
                placeholder="این لینک دسترسی به دوره های الکترونیک میباشد و برای دوره های غیر الکترونیک نیاز به پر شدن ندارد">
            @error('link')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div style="margin-top: 25px;">
            <label for="introduction_v_link">لینک ویدیو معرفی دوره</label>
            <input class="form-control" value="{{ $course->introduction_v_link }}" type="text"
                name="introduction_v_link" id="introduction_v_link" placeholder="لینک ویدیو معرفی دوره" required>
            @error('introduction_v_link')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div style="margin-top: 25px;">
            <label for="off">تخفیف دوره</label>
            <input class="form-control" type="number" value="{{ $course->off }}" name="off" id="off"
                placeholder="در صورت نداشتن خالی رها شود">
            @error('off')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div style="margin-top: 25px;">
            <select name="licensable" class="custom-select">
                <option selected>مدرک دارد؟</option>
                <option value="1">بله</option>
                <option value="0">خیر</option>
            </select>

            <select name="mode" class="custom-select">
                <option selected>نحوه ارائه</option>
                <option value="1">آنلاین</option>
                <option value="0">آفلاین(بسته های ارسالی و دوره های از پیش ظبط شده)</option>
            </select>

            <select name="type" class="custom-select">
                <option selected>نوع دوره</option>
                <option value="1">الکترونیک</option>
                <option value="0">غیر الکترونیک(بسته های ارسالی)</option>
            </select>
        </div>

        <div style="margin-top: 25px;">
            <label for="meta_key_words">کلمات کلیدی</label>
            <input type="text" value="{{ $course->meta_key_words }}" name="meta_key_words" id="meta_key_words" required
                class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="meta_descriptions">meta description</label>
            <input type="text" value="{{ $course->meta_descriptions }}" name="meta_descriptions" id="meta_descriptions"
                required class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="introduction">متن معرفی</label>
            <textarea name="introduction" id="introduction" rows="10" cols="80">{{ $course->introduction }}</textarea>
            @error('introduction')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div style="margin-top: 25px;">
            <label for="description">متن توضیحات</label>
            <textarea name="description" id="description" rows="10" cols="80">{{ $course->description }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input type="hidden" name="lang" value="{{ $lang }}">

        <div style="margin-top: 25px;">
            <button class="btn btn-success">ویرایش دوره</button>
        </div>
    </form>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('introduction');
        CKEDITOR.replace('description');
    </script>

@endsection
