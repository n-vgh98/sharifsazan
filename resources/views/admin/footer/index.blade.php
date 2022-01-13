@extends('admin.layouts.master')
@section('content')
<section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.footer.index', 'fa') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.footer.index', 'en') }}" class="btn btn-primary">انگلیسی</a>
        </div>
</section>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">حذف</th>
                <th scope="col">لینک فیسبوک</th>
                <th scope="col">لینک LinkedIn</th>
                <th scope="col">لینک ایمیل</th>
                <th scope="col">لینک اینستاگرام</th>
                <th scope="col">شماره همراه</th>
                <th scope="col">شماره تلفن ثابت</th>
                <th scope="col">آدرس</th>
                <th scope="col">درباره ما</th>
            </tr>
        </thead>
       
        <tbody>
        @foreach ($languages as $language)
                @php
                    $foot = $language->langable;
                @endphp
                <tr>
                    <td>
                    <form action="{{ route('admin.footer.destroy', $foot->id) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                    </td>
                    <td>{{ $foot->face_link }}</td>
                    <td>{{ $foot->LinkedIn_link }}</td>
                    <td>{{ $foot->mail_link }}</td>
                    <td>{{ $foot->insta_link }}</td>
                    <td>{{ $foot->mobile_num }}</td>
                    <td>{{ $foot->phone_num }}</td>
                    <td>
                    {!! \Illuminate\Support\Str::limit($foot->address,'50') !!}
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#foot{{ $foot->id }}">
                            متن کامل
                        </button>
                    </td>
                    <td>
                    {!! \Illuminate\Support\Str::limit($foot->about_us,'50') !!}
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#foot_aboutus{{ $foot->id }}">
                            متن کامل
                        </button>
                    </td>
                </tr>
        {{-- modal to show full text of address --}}
                <div class="modal fade" id="foot{{ $foot->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">آدرس </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @php
                                    echo $foot->address;
                                @endphp
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                            </div>
                        </div>
                    </div>
                </div>
        {{-- end of modal to show full text of address --}}
        {{-- modal to show full text of about_us --}}
                <div class="modal fade" id="foot_aboutus{{ $foot->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">درباره ما </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @php
                                    echo $foot->about_us;
                                @endphp
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                            </div>
                        </div>
                    </div>
                </div>
        {{-- end of modal to show full text of about_us --}}
        @endforeach
        </tbody>
    </table>
   
   
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ایجاد Fotter جدید
    </button>

    {{-- modal for new footer --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ایجاد Fotter </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.footer.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="lang" value="{{ $lang }}">

                        <div class="form-group row">
                            <label for="about_us"
                                class="col-md-4 col-form-label text-md-right">{{ __('درباره ما') }}</label>

                            <div class="col-md-6">
                                <input id="about_us" type="text" class="form-control" name="about_us"
                                    value="{{ old('about_us') }}" required autocomplete="about_us" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('آدرس') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address"
                                    value="{{ old('address') }}" required autocomplete="address" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_num"
                                class="col-md-4 col-form-label text-md-right">{{ __('تلفن ثابت') }}</label>

                            <div class="col-md-6">
                                <input id="phone_num" type="tel" class="form-control" name="phone_num"
                                    value="{{ old('phone_num') }}" required autocomplete="phone_num" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile_num"
                                class="col-md-4 col-form-label text-md-right">{{ __('شماره همراه') }}</label>

                            <div class="col-md-6">
                                <input id="mobile_num" type="tel" class="form-control" name="mobile_num"
                                    value="{{ old('mobile_num') }}" required autocomplete="mobile_num" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="insta_link"
                                class="col-md-4 col-form-label text-md-right">{{ __('لینک اینستاگرام') }}</label>

                            <div class="col-md-6">
                                <input id="insta_link" type="text" class="form-control" name="insta_link"
                                    value="{{ old('insta_link') }}" required autocomplete="insta_link" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mail_link"
                                class="col-md-4 col-form-label text-md-right">{{ __('لینک ایمیل') }}</label>
                            <div class="col-md-6">
                                <input id="mail_link" type="text" class="form-control" name="mail_link"
                                    value="{{ old('mail_link') }}" required autocomplete="mail_link" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="LinkedIn_link"
                                class="col-md-4 col-form-label text-md-right">{{ __('لینک LinkedIn') }}</label>

                            <div class="col-md-6">
                                <input id="LinkedIn_link" type="text" class="form-control" name="LinkedIn_link"
                                    value="{{ old('LinkedIn_link') }}" required autocomplete="LinkedIn_link" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="face_link"
                                class="col-md-4 col-form-label text-md-right">{{ __('لینک فیسبوک') }}</label>

                            <div class="col-md-6">
                                <input id="face_link" type="text" class="form-control" name="face_link"
                                    value="{{ old('face_link') }}" required autocomplete="face_link" autofocus>
                            </div>
                        </div>
                        <div style="margin-top:15px;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">منصرف
                                شدم</button>
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </div>
                        <input type="hidden" name="mode" value="1">
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    {{-- modal for edit footer --}}
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> --}}
    {{-- ویرایش Footer --}}
    {{-- </button> --}}
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
    {{-- <div class="modal-dialog" role="document"> --}}
    {{-- <div class="modal-content"> --}}
    {{-- <div class="modal-header"> --}}
    {{-- <h5 class="modal-title" id="exampleModalLabel">ویرایش Fotter </h5> --}}
    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> --}}
    {{-- <span aria-hidden="true">&times;</span> --}}
    {{-- </button> --}}
    {{-- </div> --}}
    {{-- <div class="modal-body"> --}}
    {{-- @foreach ($footer as $foot) --}}
    {{-- <form action="{{ route('footer.update', $foot->id) }}" method="POST" > --}}
    {{-- @csrf --}}
    {{-- @method("PATCH") --}}
    {{-- @endforeach --}}
    {{-- <div class="form-group row"> --}}
    {{-- <label for="about_us" --}}
    {{-- class="col-md-4 col-form-label text-md-right">{{ __('درباره ما') }}</label> --}}

    {{-- <div class="col-md-6"> --}}
    {{-- <input id="about_us" type="text" class="form-control" --}}
    {{-- name="about_us" value="{{ old('about_us') }}" required autocomplete="about_us" autofocus> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="form-group row"> --}}
    {{-- <label for="address" --}}
    {{-- class="col-md-4 col-form-label text-md-right">{{ __('آدرس') }}</label> --}}

    {{-- <div class="col-md-6"> --}}
    {{-- <input id="address" type="text" class="form-control" --}}
    {{-- name="address" value="{{ old('address') }}" required autocomplete="address" autofocus> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="form-group row"> --}}
    {{-- <label for="phone_num" --}}
    {{-- class="col-md-4 col-form-label text-md-right">{{ __('تلفن ثابت') }}</label> --}}

    {{-- <div class="col-md-6"> --}}
    {{-- <input id="phone_num" type="tel" class="form-control" --}}
    {{-- name="phone_num" value="{{ old('phone_num') }}" required autocomplete="phone_num" autofocus> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="form-group row"> --}}
    {{-- <label for="mobile_num" --}}
    {{-- class="col-md-4 col-form-label text-md-right">{{ __('شماره همراه') }}</label> --}}

    {{-- <div class="col-md-6"> --}}
    {{-- <input id="mobile_num" type="tel" class="form-control" --}}
    {{-- name="mobile_num" value="{{ old('mobile_num') }}" required autocomplete="mobile_num" autofocus> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="form-group row"> --}}
    {{-- <label for="insta_link" --}}
    {{-- class="col-md-4 col-form-label text-md-right">{{ __('لینک اینستاگرام') }}</label> --}}

    {{-- <div class="col-md-6"> --}}
    {{-- <input id="insta_link" type="text" class="form-control" --}}
    {{-- name="insta_link" value="{{ old('insta_link') }}" required autocomplete="insta_link" autofocus> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="form-group row"> --}}
    {{-- <label for="mail_link" --}}
    {{-- class="col-md-4 col-form-label text-md-right">{{ __('لینک ایمیل') }}</label> --}}
    {{-- <div class="col-md-6"> --}}
    {{-- <input id="mail_link" type="text" class="form-control" --}}
    {{-- name="mail_link" value="{{ old('mail_link') }}" required autocomplete="mail_link" autofocus> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="form-group row"> --}}
    {{-- <label for="LinkedIn_link" --}}
    {{-- class="col-md-4 col-form-label text-md-right">{{ __('لینک LinkedIn') }}</label> --}}

    {{-- <div class="col-md-6"> --}}
    {{-- <input id="LinkedIn_link" type="text" class="form-control" --}}
    {{-- name="LinkedIn_link" value="{{ old('LinkedIn_link') }}" required autocomplete="LinkedIn_link" autofocus> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="form-group row"> --}}
    {{-- <label for="face_link" --}}
    {{-- class="col-md-4 col-form-label text-md-right">{{ __('لینک فیسبوک') }}</label> --}}

    {{-- <div class="col-md-6"> --}}
    {{-- <input id="face_link" type="text" class="form-control" --}}
    {{-- name="face_link" value="{{ old('face_link') }}" required autocomplete="face_link" autofocus> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div style="margin-top:15px;"> --}}
    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">منصرف --}}
    {{-- شدم</button> --}}
    {{-- <button type="submit" class="btn btn-primary">ارسال</button> --}}
    {{-- </div> --}}
    {{-- <input type="hidden" name="mode" value="1"> --}}
    {{-- </form> --}}
    {{-- </div> --}}
    {{-- <div class="modal-footer"> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
@endsection
