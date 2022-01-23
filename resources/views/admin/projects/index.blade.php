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
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#exampleModalLong0{{ $project->id }}">
                        ویرایش
                    </button>
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
            {{--modal for edit --}}
            <div class="modal fade" id="exampleModalLong0{{$project->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ویرایش {{$project->name}} </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right"> نام پروژه 
                                        :</label>
                                    <div class="col-md-6">
                                        <input id="project" type="text" class="form-control" name="name"
                                               value="{{ $project->name }}" required autocomplete="name" autofocus>
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
                                    <label for="year" class="col-md-4 col-form-label text-md-right">
                                        سال ساخت:</label>

                                    <div class="col-md-6">
                                        <input id="year" type="text" class="form-control" name="year"
                                               value="{{ $project->year }}" required autocomplete="year"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="floor" class="col-md-4 col-form-label text-md-right">تعداد طبقات</label>

                                    <div class="col-md-6">
                                        <input id="floor" type="text" class="form-control" name="floor"
                                               value="{{$project->floor }}" required autocomplete="floor"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="location" class="col-md-4 col-form-label text-md-right">مکان پروژه:</label>

                                    <div class="col-md-6">
                                        <input id="location" type="text" class="form-control" name="location"
                                               value="{{$project->location }}" required autocomplete="location"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customer_name" class="col-md-4 col-form-label text-md-right"> نام مشتری:</label>

                                    <div class="col-md-6">
                                        <input id="customer_name" type="text" class="form-control" name="customer_name"
                                               value="{{$project->customer_name }}" required autocomplete="customer_name"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="area" class="col-md-4 col-form-label text-md-right"> مساحت :</label>

                                    <div class="col-md-6">
                                        <input id="area" type="text" class="form-control" name="area"
                                               value="{{$project->area }}" required autocomplete="area"
                                               autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description"
                                        class="col-md-1 col-form-label text-md-right">توضیحات</label>

                                    <div class="col-md-11">
                                        <textarea id="description_edit" type="text" class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ old('description') }}" autocomplete="description" autofocus>{{$project->description}}</textarea>

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