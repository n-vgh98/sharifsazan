@extends('admin.layouts.master')
@section('sitetitle')
    دسته بندی مقالات
@endsection

@section('pagetitle')
    لیست دسته بندی مقالات
@endsection

@section('content')
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
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </td>
                    <td><a class="btn btn-info" href="#">مشاهده مقالات این دسته بندی</a></td>
                    <td>{{ $category->name }}</td>
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
        ساخت کتاب جدید
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
                    <form action="{{ route('admin.books.store') }}" method="POST">
                        @csrf
                        <div style="margin-top: 25px;">
                            <label for="name">نام کتاب</label>
                            <input type="text" name="name" id="name" required class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="link">لینک دانلود کتاب</label>
                            <input type="text" name="link" id="link" required class="form-control">
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
