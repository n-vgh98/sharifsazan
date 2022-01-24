@extends('admin.layouts.master')

@section('sitetitle')
    عکس های اسلایدر
@endsection


@section('pagetitle')
    عکس های اسلایدر
@endsection

@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.index.slider.index', 'fa') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.index.slider.index', 'en') }}" class="btn btn-primary">انگلیسی</a>
        </div>
    </section>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" scope="col">امکانات</th>
                <th class="text-center" scope="col">مشخصات عکس</th>
                <th class="text-center" scope="col">#</th>
            </tr>
        </thead>
        <tbody>

            {{-- make number for rows --}}
            @php
                $number = 0;
            @endphp

            @foreach ($languages as $language)


                {{-- it get  image detail because we cant use relations in on src tags --}}
                @php
                    $image = $language->langable;
                    $imagedetail = $image->detail;
                    $number++;
                @endphp

                {{-- for preventing error --}}
                @if ($imagedetail !== null)
                    <tr>
                        {{-- button for removing image --}}
                        <td class="text-center">
                            <form action="{{ route('admin.index.slider.destroy', $image->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">حذف عکس</button>
                            </form>
                        </td>
                        {{-- button for editing image --}}


                        <td class="text-center">
                            <button type="button" class="" data-toggle="modal"
                                data-target="#image{{ $image->id }}">

                                <img src="{{ asset("$imagedetail->path") }}" style="width: 35px; height:35px;">
                            </button>
                        </td>


                        <th class="text-center" scope="row">{{ $number }}</th>
                    </tr>
                @endif

                {{-- for preventing error --}}
                @if ($imagedetail !== null)
                    <!-- modal for editing image -->
                    <div class="modal fade" id="image{{ $image->id }}" tabindex="-1" role="dialog"
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
                                    <form action="{{ route('admin.index.slider.update', $image->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        {{-- section for changing image --}}
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
                                                    class="form-control @error('alt') is-invalid @enderror" name="alt"
                                                    required value="{{ $imagedetail->alt }}" autocomplete="alt"
                                                    autofocus>

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
                                                    required value="{{ $imagedetail->name }}" autocomplete="name"
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
                @endif

            @endforeach

        </tbody>
    </table>

    {{-- button to add photo --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        اضافه کردن عکس جدید
    </button>

    {{-- modal for adding new image --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> اضافه کردن عکس جدید </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.index.slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="lang" value="{{ $lang }}">
                        {{-- path of photo --}}
                        <div class="form-group row">
                            <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('عکس') }}</label>

                            <div class="col-md-6">
                                <input id="path" type="file" class="form-control @error('path') is-invalid @enderror"
                                    name="path" value="{{ old('path') }}" required autocomplete="path" autofocus>

                                @error('path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- alt of photo --}}
                        <div class="form-group row">
                            <label for="alt" class="col-md-4 col-form-label text-md-right">{{ __('عکس alt') }}</label>

                            <div class="col-md-6">
                                <input id="path" type="text" class="form-control @error('alt') is-invalid @enderror"
                                    name="alt" value="{{ old('alt') }}" required autocomplete="alt" autofocus>

                                @error('alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- name of photo --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('عکس name') }}</label>

                            <div class="col-md-6">
                                <input id="path" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

@endsection
