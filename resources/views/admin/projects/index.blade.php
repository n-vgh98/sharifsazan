@extends('admin.layouts.master')
@section('content')
<section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.projects.index', 'fa') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.projects.index', 'en') }}" class="btn btn-primary">انگلیسی</a>
        </div>
</section>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">تنظیمات</th>
            <th scope="col">توضیحات</th>
            <th scope="col">نام مشتری </th>
            <th scope="col">نوع</th>
            <th scope="col">تصویر اصلی</th>
            <th scope="col">نام پروژه</th>
            <th scope="col">ردیف</th>
        </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
        @foreach ($languages as $language)
                @php
                    $project = $language->langable;
                @endphp
            <tr>
                <td>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                    <a href="{{route('admin.projects.edit',[$project->id,$project->language->name])}}"  class="btn btn-primary">
                        ویرایش
                    </a>
                </td>
                <td>
                         @php
                            echo substr($project->description, 0, 30);
                        @endphp
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                        data-target="#project_desc{{ $project->id }}">
                        متن کامل
                    </button>
                </td>
                <td>
                    {{$project->customer_name}}
                </td>
                @if ($project->type == 0)
                    <td><span class="badge badge-pill badge-success">ساختمانی </span></td>
                @elseif ($project->type == 1)
                    <td><span class="badge badge-pill badge-danger">صنعتی</span></td>
                @elseif ($project->type == 2)
                <td><span class="badge badge-pill badge-danger">پل و تقاطع</span></td>
                @endif
                <td>
                    <button type="button" class="" data-toggle="modal" data-target="#project_img{{ $project->id }}">

                        <img src="{{ asset($project->images->path) }}" style="width: 35px; height:35px;">
                    </button>
                </td>
                <td>{{ $project->name }}</td>
                <td>{{ $number}}</td>
            </tr>
            {{-- modal to show full text  --}}
                <div class="modal fade" id="project_desc{{ $project->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">متن پروژه</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @php
                                    echo $project->description;
                                @endphp
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of modal to show full  --}}
            {{--modal for edit image --}}
            <div class="modal fade" id="project_img{{ $project->id }}" tabindex="-1" role="dialog"
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
                                <form action="{{ route('admin.projects.update.image', $project->images->id) }}"
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
                                                autocomplete="alt" value="{{ $project->images->alt }}" autofocus>

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
                                                required value="{{ $project->images->name }}" autocomplete="name"
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


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ایجاد پروژه جدید
    </button>

     {{--modal for new project --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ایجاد پروژه </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="lang" value="{{ $lang }}">
                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-right">نام پروژه  </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                        required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">عکس خدمات</label>
                            <div class="col-md-6">
                                <input type="file" name="image" id="image" class="form-control"
                                    required autocomplete="image" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_name" class="col-md-4 col-form-label text-md-right">نام عکس</label>
                            <div class="col-md-6">
                                 <input type="text" name="image_name" id="image_name" class="form-control"
                                        required autocomplete="image_name" autofocus>
                            </div>
                        </div>
                        <div class="mform-group row">
                            <label for="alt" class="col-md-4 col-form-label text-md-right">Alt</label>
                            <div class="col-md-6">
                                <input type="text" name="alt" id="alt" class="form-control"
                                     required autocomplete="alt" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                                    <label for="type"
                                        class="col-md-4 col-form-label text-md-right">نوع پروژه؟ </label>
                                    <div class="radio">
                                    <label>
                                        <input type="radio" id="0" name="type" value="0">ساختمانی
                                    </label>
                                    <label>
                                        <input type="radio" id="1" name="type" value="1">صنعتی
                                    </label>
                                    <label>
                                        <input type="radio" id="2" name="type" value="2">پل و تقاطع
                                    </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status"
                                        class="col-md-4 col-form-label text-md-right">وضعیت پروژه؟</label>
                                    <div class="radio">
                                    <label>
                                        <input type="radio" id="0" name="status" value="0">در حال پیشرفت
                                    </label>
                                    <label>
                                        <input type="radio" id="1" name="status" value="1">تکمیل شده
                                    </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="year" class="col-md-4 col-form-label text-md-right">
                                        سال ساخت:</label>

                                    <div class="col-md-6">
                                        <input id="year" type="text" class="form-control" name="year"
                                                required autocomplete="year"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="floor" class="col-md-4 col-form-label text-md-right">تعداد طبقات</label>

                                    <div class="col-md-6">
                                        <input id="floor" type="text" class="form-control" name="floor"
                                               required autocomplete="floor"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="location" class="col-md-4 col-form-label text-md-right">مکان پروژه:</label>

                                    <div class="col-md-6">
                                        <input id="location" type="text" class="form-control" name="location"
                                               required autocomplete="location"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customer_name" class="col-md-4 col-form-label text-md-right"> نام مشتری:</label>

                                    <div class="col-md-6">
                                        <input id="customer_name" type="text" class="form-control" name="customer_name"
                                               required autocomplete="customer_name"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="area" class="col-md-4 col-form-label text-md-right"> مساحت :</label>

                                    <div class="col-md-6">
                                        <input id="area" type="text" class="form-control" name="area"
                                                required autocomplete="area"
                                               autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description"
                                        class="col-md-1 col-form-label text-md-right">توضیحات</label>

                                    <div class="col-md-11">
                                        <textarea id="description_add" type="text" class="form-control @error('description') is-invalid @enderror"
                                            name="description"  autocomplete="description" autofocus></textarea>

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        <div style="margin-top:15px;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">منصرف
                                شدم
                            </button>
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </div>
                        <input type="hidden" name="mode" value="1">
                    </form>
                </div>
                <div class="modal-members">
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace("description_add")
        CKEDITOR.replace("description_edit")
        
        
    </script>
@endsection