@extends('admin.layouts.master')
@section('sitetitle')
    خدمات
@endsection

@section('pagetitle')
    لیست خدمات
@endsection

@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.services.index','fa') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.services.index','en') }}" class="btn btn-primary">انگلیسی</a>
        </div>
    </section>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">تنظیمات</th>
                <th scope="col">امکانات</th>
                <th scope="col">خلاصه متن</th>
                <th scope="col">نام دسته بندی </th>
                <th scope="col">تصویر</th>
                <th scope="col">عنوان خدمات </th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
            @foreach ($languages as $language)
            @php
                $service = $language->langable;
            @endphp
                <tr>
                    <td>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </td>
                    <td><a class="btn btn-warning" href="{{ route('admin.services.edit', $service->id) }}">ویرایش</a></td>
                    <td>
                        @php
                            echo substr($service->description, 0, 30);
                        @endphp
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#service{{ $service->id }}">
                            متن کامل
                        </button>

                    </td>
                   
                    <td>{{ $service->category->title }}</td>
                    {{-- button for editing service image --}}
                    <td>
                        <button type="button" class="" data-toggle="modal" data-target="#service_img{{ $service->id }}">

                            <img src="{{ asset($service->images->path) }}" style="width: 35px; height:35px;">
                        </button>
                    </td>
                    <td>{{ $service->title }}</td>
                    <th scope="row">{{ $number }}</th>
                </tr>

                {{-- modal to show full text of service --}}
                <div class="modal fade" id="service{{ $service->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">متن خدمات</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @php
                                    echo $service->description;
                                @endphp
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of modal to show full text of service --}}

                 <!-- modal for editing service image -->
                 <div class="modal fade" id="service_img{{ $service->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-link" id="exampleModalLabel">تغیر مشخصات عکس</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.services.update.image', $service->images->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- section for changing service image --}}
                                    <div class="form-group row">
                                        <label for="path"
                                            class="col-md-4 col-form-label text-md-right">{{ __('عکس') }}</label>

                                        <div class="col-md-6">
                                            <input id="path" type="file"
                                                class="form-control @error('path') is-invalid @enderror" name="path"
                                                autocomplete="path" autofocus>

                                            @error('path')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- section for changing image  alt --}}
                                    <div class="form-group row">
                                        <label for="alt"
                                            class="col-md-4 col-form-label text-md-right">{{ __('عکس alt') }}</label>

                                        <div class="col-md-6">
                                            <input id="alt" type="text"
                                                class="form-control @error('alt') is-invalid @enderror" name="alt" required
                                                autocomplete="alt" value="{{ $service->images->alt }}" autofocus>

                                            @error('alt')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- section for changing image  name --}}
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('عکس name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                required value="{{ $service->images->name }}" autocomplete="name"
                                                autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div style="margin-top:15px;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">منصرف
                                            شدم</button>
                                        <button type="submit" class="btn btn-primary">ارسال</button>
                                    </div>

                                </form>
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
        <a href="{{ route('admin.services.create', $lang) }}" class="btn btn-primary">ساخت خدمات جدید</a>

@endsection
