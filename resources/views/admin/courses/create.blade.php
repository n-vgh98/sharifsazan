@extends('admin.layouts.master')
@section('sitetitle')
    ساخت دوره جدید
@endsection

@section('pagetitle')
    ساخت دوره جدید
@endsection
@section('content')
    <form action="">
        @csrf
        <div>
            <label for="title">عنوان دوره</label>
            <input class="form-control" type="text" name="title" id="title" required placeholder="آموزش رایگان اتوکد">
        </div>

        <div style="margin-top: 25px;">
            <label for="price">قیمت دوره</label>
            <input class="form-control" type="number" name="price" id="price" required
                placeholder="قیمت به تومان(فقط عدد وارد شود)">
        </div>

        <div style="margin-top: 25px;">
            <label for="master_name">نام استاد</label>
            <input class="form-control" type="text" name="master_name" id="master_name" required>
        </div>

        <div style="margin-top: 25px;">
            <label for="master_job">شغل استاد</label>
            <input class="form-control" type="text" name="master_job" id="master_job" required>
        </div>

        <div style="margin-top: 25px;">
            <label for="link">لینک دوره</label>
            <input class="form-control" type="text" name="link" id="link"
                placeholder="این لینک دسترسی به دوره های الکترونیک میباشد و برای دوره های غیر الکترونیک نیاز به پر شدن ندارد">
        </div>

        <div style="margin-top: 25px;">
            <label for="introduction_v_link">لینک ویدیو معرفی دوره</label>
            <input class="form-control" type="text" name="introduction_v_link" id="introduction_v_link"
                placeholder="لینک ویدیو معرفی دوره" required>
        </div>

        <div style="margin-top: 25px;">
            <label for="off">تخفیف دوره</label>
            <input class="form-control" type="number" name="off" id="off" placeholder="در صورت نداشتن خالی رها شود">
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
            <label for="introduction">متن معرفی</label>
            <input class="form-control" type="text" name="introduction" id="introduction" required
                placeholder="آموزش رایگان اتوکد">
        </div>

        <div style="margin-top: 25px;">
            <label for="description">متن توضیحات</label>
            <input class="form-control" type="text" name="description" id="description" required>
        </div>

        <div style="margin-top: 25px;">
            <button class="btn btn-success">ساخت دوره</button>
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
