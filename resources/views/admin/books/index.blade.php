@extends('admin.layouts.master')
@section('sitetitle')
    کتابخانه آنلاین
@endsection

@section('pagetitle')
    لیست کتاب ها
@endsection

@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.books.farsi') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.books.english') }}" class="btn btn-primary">انگلیسی</a>
        </div>
    </section>
    <br><br><br>
    <strong>لیست کتاب ها </strong>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">تنظیمات</th>
                <th scope="col">ویرایش</th>
                <th scope="col">زبان</th>
                <th scope="col">لینک دانلود</th>
                <th scope="col">نام کتاب </th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
            @foreach ($languages as $language)
                @php
                    $book = $language->langable;
                @endphp
                <tr>
                    <td>
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>

                    </td>
                    <td><button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#exampleModalLong0{{ $book->id }}">
                            ویرایش
                        </button></td>
                    <td>{{ $book->language->name }}</td>
                    <td><a class="btn btn-info" href="{{ $book->link }}">دانلود</a></td>
                    <td>{{ $book->name }}</td>
                    <th scope="row">{{ $number }}</th>
                </tr>
                @php
                    $number++;
                @endphp
                <!-- Modal for editing-->
                <div class="modal fade" id="exampleModalLong0{{ $book->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.books.update', $book->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div style="margin-top: 25px;">
                                        <label for="name">نام کتاب</label>
                                        <input type="text" name="name" value="{{ $book->name }}" id="name" required
                                            class="form-control">
                                    </div>
                                    <div style="margin-top: 25px;">
                                        <label for="link">لینک دانلود کتاب</label>
                                        <input type="text" name="link" id="link" value="{{ $book->link }}" required
                                            class="form-control">
                                    </div>

                                    <div style="margin-top: 25px;">
                                        <label for="image_name">image name</label>
                                        <input type="text" value="{{ $book->images[0]->name }}" name="image_name"
                                            id="image_name" required class="form-control">
                                    </div>

                                    <div style="margin-top: 25px;">
                                        <label for="image_alt">image alt</label>
                                        <input type="text" value="{{ $book->images[0]->alt }}" name="alt" id="alt"
                                            required class="form-control">
                                    </div>



                                    <div style="margin-top: 25px;">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#exampleModalLong">
                                            مشاهده عکس فعلی
                                        </button>
                                        <label for="image">تغییر عکس </label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>

                                    <input type="hidden" name="lang" value="0">

                                    <div style="margin-top: 25px;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                                        <button type="submit" class="btn btn-primary"> ذخیره</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- modal for showing image --}}
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">عکس فعلی</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset($book->images[0]->path) }}" alt=""
                                    style="height: 500px; width:500px;">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>

                            </div>
                        </div>
                    </div>
                </div>
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
                    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="margin-top: 25px;">
                            <label for="name">نام کتاب</label>
                            <input type="text" name="name" id="name" required class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="link">لینک دانلود کتاب</label>
                            <input type="text" name="link" id="link" required class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="image">عکس کتاب</label>
                            <input type="file" name="image" id="image" required class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="image_name">نام عکس</label>
                            <input type="text" name="image_name" id="image_name" required class="form-control">
                        </div>

                        <div style="margin-top: 25px;">
                            <label for="alt">Alt</label>
                            <input type="text" name="alt" id="alt" required class="form-control">
                        </div>

                        <div style="margin-top: 25px;">
                            <select class="form-control" name="lang" class="custom-select">
                                <option selected>زبان کاربران کتاب</option>
                                <option value="en">اینگلیسی</option>
                                <option value="fa">فارسی</option>
                            </select>
                        </div>

                        <div style="margin-top: 25px;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                            <button type="submit" class="btn btn-primary"> ذخیره</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
