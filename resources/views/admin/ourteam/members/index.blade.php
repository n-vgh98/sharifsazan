@extends('admin.layouts.master')
@section('content')<section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.our_team.member.index', 'fa') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.our_team.member.index', 'en') }}" class="btn btn-primary">انگلیسی</a>
        </div>
</section>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">تنظیمات</th>
            <th scope="col">تاریخ ایجاد</th>
            <th scope="col">ارتباط</th>
            <th scope="col">عنوان شغل</th>
            <th scope="col"> تصویر</th>
            <th scope="col">نام و نام خانوادگی</th>
            <th scope="col">ردیف</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($languages as $language)
                @php
                    $member = $language->langable;
                @endphp
            <tr>
                <td>
                    <form action="{{ route('admin.our_team.member.destroy', $member->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#exampleModalLong0{{ $member->id }}">
                        ویرایش
                    </button>
                </td>
                <td>{{ $member->created_at }}</td>
                @if ($member->mode == 1)
                    <td><span class="badge badge-pill badge-success">همکار است</span></td>
                @else
                    <td><span class="badge badge-pill badge-danger">همکار نیست</span></td>
                @endif
                <td>{{ $member->job_title }}</td>
                
                <td>
                    <button type="button" class="" data-toggle="modal"
                        data-target="#member_img{{ $member->id }}">

                        <img src="{{ asset($member->images[0]->path) }}" style="width: 35px; height:35px;">
                    </button>
                </td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->id }}</td>
            </tr>
            <!-- modal foe edit image -->
            <div class="modal fade" id="member_img{{ $member->id }}" tabindex="-1" role="dialog"
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
                                <form action="{{ route('admin.our_team.member.update.image', $member->images[0]->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- section for changing article image --}}
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
                                                autocomplete="alt" value="{{ $member->images[0]->alt }}" autofocus>

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
                                                required value="{{ $member->images[0]->name }}" autocomplete="name"
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

            {{--modal for edit --}}
            <div class="modal fade" id="exampleModalLong0{{$member->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ویرایش {{$member->name}} </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.our_team.member.update', $member->id) }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">نام و نام
                                        خانوادگی:</label>
                                    <div class="col-md-6">
                                        <input id="about_us" type="text" class="form-control" name="name"
                                               value="{{ $member->name }}" required autocomplete="name" autofocus>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="image">تصویر  همکار </label>
                                    <input type="file" name="image" id="image" required class="form-control">
                                </div> -->
                                <div class="form-group row">
                                    <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('عکس') }}</label>

                                    <div class="col-md-6">
                                        <input id="path" type="file" class="form-control @error('path') is-invalid @enderror"
                                            name="path" valu="path" required autocomplete="path" autofocus>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="image_name">نام عکس</label>
                                    <input type="text" name="image_name" id="image_name" required class="form-control">
                                </div> -->
                                <div class="form-group row">
                                    <label for="img_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('عکس name') }}</label>

                                    <div class="col-md-6">
                                        <input id="path" type="text" class="form-control @error('img_name') is-invalid @enderror"
                                            name="img_name" value="img_name" required autocomplete="img_name"
                                            autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alt" class="col-md-4 col-form-label text-md-right">{{ __('عکس alt') }}</label>

                                    <div class="col-md-6">
                                        <input id="path" type="text" class="form-control @error('alt') is-invalid @enderror"
                                            name="alt" value="alt" required autocomplete="alt" autofocus>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="alt">Alt</label>
                                    <input type="text" name="alt" id="alt" required class="form-control">
                                </div> -->
                                <div class="form-group row">
                                    <label for="job_title" class="col-md-4 col-form-label text-md-right">عنوان
                                        شغلی:</label>

                                    <div class="col-md-6">
                                        <input id="job_title" type="text" class="form-control" name="job_title"
                                               value="{{ $member->job_title }}" required autocomplete="job_title"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="education" class="col-md-4 col-form-label text-md-right">تحصیلات</label>

                                    <div class="col-md-6">
                                        <input id="education" type="text" class="form-control" name="education"
                                               value="{{$member->education }}" required autocomplete="education"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="attribute" class="col-md-4 col-form-label text-md-right">ویژگی:</label>

                                    <div class="col-md-6">
                                        <input id="attribute" type="tel" class="form-control" name="attribute"
                                               value="{{$member->attribute }}" required autocomplete="attribute"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="admin"
                                        class="col-md-4 col-form-label text-md-right">مدیر یا همکار؟</label>
                                    <div class="radio">
                                    <label>
                                        <input type="radio" id="0" name="admin" value="0">همکار
                                    </label>
                                    <label>
                                        <input type="radio" id="1" name="admin" value="1">مدیر
                                    </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mode"
                                        class="col-md-4 col-form-label text-md-right">درحال حاضر همکار است یا خیر؟</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio"  id="1" name="mode" value="1">همکار است
                                        </label>
                                        <label>
                                            <input type="radio"  id="0" name="mode" value="0">قطع همکاری
                                        </label>
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
        @endforeach
        </tbody>
    </table>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ایجاد همکار جدید
    </button>

     {{--modal for new footer --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ایجاد همکار </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.our_team.member.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="lang" value="{{ $lang }}">
                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-right">نام و نام خانوادگی</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                        required autocomplete="name" autofocus>
                            </div>
                        </div>
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
                            <label for="img_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('عکس name') }}</label>

                            <div class="col-md-6">
                                <input id="path" type="text" class="form-control @error('img_name') is-invalid @enderror"
                                    name="img_name" value="{{ old('img_name') }}" required autocomplete="img_name"
                                    autofocus>

                                @error('img_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="job_title" class="col-md-4 col-form-label text-md-right">عنوان شغلی</label>

                            <div class="col-md-6">
                                <input id="job_title" type="text" class="form-control" name="job_title"
                                        required autocomplete="job_title" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="education"
                                   class="col-md-4 col-form-label text-md-right">تحصیلات</label>

                            <div class="col-md-6">
                                <input id="education" type="text" class="form-control" name="education"
                                      required autocomplete="education" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="attribute"
                                   class="col-md-4 col-form-label text-md-right">ویژگی</label>

                            <div class="col-md-6">
                                <input id="attribute" type="text" class="form-control" name="attribute"
                                       required autocomplete="attribute" autofocus>
                            </div>
                        </div>
                        {{--@foreach($members as $member)--}}
                        <div class="form-group row">
                            <label for="admin"
                                   class="col-md-4 col-form-label text-md-right">مدیر یا همکار؟</label>
                            <div class="radio">
                            <label>
                                <input type="radio" id="0" name="admin" value="0">همکار
                            </label>
                            <label>
                                <input type="radio" id="1" name="admin" value="1">مدیر
                            </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mode"
                                   class="col-md-4 col-form-label text-md-right">درحال حاضر همکار است یا خیر؟</label>
                            <div class="radio">
                                <label>
                                    <input type="radio"  id="1" name="mode" value="1">همکار است
                                </label>
                                <label>
                                    <input type="radio"  id="0" name="mode" value="0">قطع همکاری
                                </label>
                            </div>
                        </div>
                        {{--@endforeach--}}
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
