@extends('admin.layouts.master')
@section('sitetitle')
    ویرایش دوره
@endsection

@section('pagetitle')
    ویرایش دوره
@endsection
@section('content')

    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
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
                <option value="{{ $course->licensable }}" selected>مدرک دارد؟</option>
                <option value="1">بله</option>
                <option value="0">خیر</option>
            </select>

            <select name="mode" class="custom-select">
                <option value="{{ $course->mode }}" selected>نحوه ارائه</option>
                <option value="1">آنلاین</option>
                <option value="0">آفلاین(بسته های ارسالی و دوره های از پیش ظبط شده)</option>
            </select>

            <select name="type" class="custom-select">
                <option value="{{ $course->type }}" selected>نوع دوره</option>
                <option value="0">الکترونیک</option>
                <option value="1">غیر الکترونیک(بسته های ارسالی)</option>
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
            <label for="image_name">image name</label>
            <input type="text" value="{{ $course->images[0]->name }}" name="image_name" id="image_name" required
                class="form-control">
        </div>

        <div style="margin-top: 25px;">
            <label for="image_alt">image alt</label>
            <input type="text" value="{{ $course->images[0]->alt }}" name="alt" id="alt" required class="form-control">
        </div>



        <div style="margin-top: 25px;">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                مشاهده عکس فعلی
            </button>
            <label for="image">تغییر عکس </label>
            <input type="file" name="image" id="image" class="form-control">
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

        <div style="margin-top: 25px;">
            <button class="btn btn-success">ویرایش دوره</button>
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
                    <img src="{{ asset($course->images[0]->path) }}" alt="" style="height: 500px; width:500px;">
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
        CKEDITOR.replace('introduction');
        CKEDITOR.replace('description');
    </script>

@endsection
