@extends('admin.layouts.master')
@section('sitetitle')
    گروه ها
@endsection

@section('pagetitle')
    لیست گروه ها
@endsection

@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.invites.category.farsi') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.invites.category.english') }}" class="btn btn-primary">انگلیسی</a>
        </div>
    </section>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">تنظیمات</th>
                <th scope="col">مشاهده</th>
                <th scope="col">زبان</th>
                <th scope="col">لینک کارنامه</th>
                <th scope="col">لینک فرم آزمون عملی</th>
                <th scope="col">لینک فرم آزمون فنی</th>
                <th scope="col">لینک فرم ثبت نام</th>
                <th scope="col">نام گروه</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
            @foreach ($languages as $language)
                @php
                    $category = $language->langable;
                @endphp
                <tr>
                    <td>
                        <form action="{{ route('admin.invites.category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </td>
                    <td><a class="btn btn-info" href="{{ route('admin.invites.category.show', $category->id) }}">مشاهده
                            صفحات گروه</a>
                    </td>
                    <td>{{ $category->language->name }}</td>
                    <td><a href="{{ $category->karname }}">فرم کارنامه</a></td>
                    <td><a href="{{ $category->technical_exam_form_link }}">فرم آزمون عملی</a></td>
                    <td><a href="{{ $category->practical_exam_form_link }}">فرم آزمون فنی</a></td>
                    <td><a href="{{ $category->register_form_link }}">فرم ثبت نام</a></td>
                    <td>{{ $category->title }}</td>
                    <th scope="row">{{ $number }}</th>
                </tr>
                @php
                    $number++;
                @endphp
            @endforeach

        </tbody>
    </table>
    {{-- create books --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ساخت گروه جدید
    </button>

    {{-- modal for making book --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ساخت کتاب جدید</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.invites.category.store') }}" method="POST">
                        @csrf
                        <div style="margin-top: 25px;">
                            <label for="title">نام گروه</label>
                            <input type="text" name="title" id="title" required class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="register_form_link">لینک فرم ثبت نام</label>
                            <input type="text" name="register_form_link" id="register_form_link" required
                                class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="technical_exam_form_link">لینک آزمون عملی</label>
                            <input type="text" name="technical_exam_form_link" id="technical_exam_form_link" required
                                class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="practical_exam_form_link">لینک آزمون فنی</label>
                            <input type="text" name="practical_exam_form_link" id="practical_exam_form_link" required
                                class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="practical_exam_form_link">لینک کارنامه</label>
                            <input type="text" name="karname" id="practical_exam_form_link" required class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <select name="lang" class="custom-select">
                                <option selected>زبان دسته بندی</option>
                                <option value="en">اینگلیسی</option>
                                <option value="fa">فارسی</option>
                            </select>
                        </div>
                        <br><br>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                        <button type="submit" class="btn btn-primary"> ذخیره</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
