@extends('admin.layouts.master')
@section('sitetitle')
    دسته بندی خدمات
@endsection

@section('pagetitle')
    لیست دسته بندی خدمات
@endsection

@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.services.category.index','fa') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.services.category.index','en') }}" class="btn btn-primary">انگلیسی</a>
        </div>
    </section>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">تنظیمات</th>
                <th scope="col">تنظیمات</th>
                <th scope="col">نام دسته بندی </th>
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
                        <form action="{{ route('admin.services.category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong0{{$category->id}}">
                            ویرایش
                     </button>
                    </td>
                    <td>{{ $category->title }}</td>
                    <th scope="row">{{ $number }}</th>
                </tr>
            <!-- modal for edit -->
            <div class="modal fade" id="exampleModalLong0{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ویرایش دسته بندی </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.services.category.update',$category->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="lang" value="{{ $lang }}">
                        <div style="margin-top: 25px;">
                            <label for="title">نام دسته بندی</label>
                            <input type="text" value="{{$category->title}}" name="title" id="title" required class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="slug">نام مستعار </label>
                            <input type="text" value="{{$category->slug}}" name="slug" id="slug"  class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="meta_keywords">meta_keywords</label>
                            <input type="text" value="{{$category->meta_keywords}}" name="meta_keywords" id="meta_keywords" required class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="meta_description">meta_description</label>
                            <input type="text" value="{{$category->meta_description}}" name="meta_description" id="meta_description" required class="form-control">
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
                    <form action="{{ route('admin.services.category.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="lang" value="{{ $lang }}">
                        <div style="margin-top: 25px;">
                            <label for="title">نام دسته بندی</label>
                            <input type="text" name="title" id="title" required class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="slug">نام مستعار </label>
                            <input type="text" name="slug" id="slug"  class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="meta_keywords">meta_keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" required class="form-control">
                        </div>
                        <div style="margin-top: 25px;">
                            <label for="meta_description">meta_description</label>
                            <input type="text" name="meta_description" id="meta_description" required class="form-control">
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
