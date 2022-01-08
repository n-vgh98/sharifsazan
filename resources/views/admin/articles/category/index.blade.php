@extends('admin.layouts.master')
@section('sitetitle')
    دسته بندی مقالات
@endsection

@section('pagetitle')
    لیست دسته بندی مقالات
@endsection

@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.articles.categories.farsi') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.articles.categories.english') }}" class="btn btn-primary">انگلیسی</a>
        </div>
    </section>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">تنظیمات</th>
                <th scope="col">مشاهده</th>
                <th scope="col">نام دسته بندی </th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
            @foreach ($categories as $category)

                <tr>
                    <td>
                        <form action="{{ route('admin.articles.categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="hidden" name="lang" value="0">
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </td>
                    <td><a class="btn btn-info"
                            href="{{ route('admin.articles.categories.show', [$category->id, 0]) }}">مشاهده
                            مقالات این دسته
                            بندی</a></td>
                    <td>{{ $category->title }}</td>
                    <th scope="row">{{ $number }}</th>
                </tr>
                @php
                    $number++;
                @endphp
            @endforeach

        </tbody>
    </table>

    {{-- create category --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ساخت دسته بندی جدید
    </button>



    {{-- modal for making category --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ساخت دسته بندی جدید</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.articles.categories.store') }}" method="POST">
                        @csrf
                        <div style="margin-top: 25px;">
                            <label for="title">نام دسته بندی</label>
                            <input type="text" name="title" id="title" required class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <select class="form-control" name="lang" class="custom-select">
                                <option selected>زبان کاربران دسته بندی</option>
                                <option value="1">اینگلیسی</option>
                                <option value="0">فارسی</option>
                            </select>
                        </div>
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
