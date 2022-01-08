@extends('admin.layouts.master')
@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">تنظیمات</th>
            <th scope="col">تاریخ ایجاد</th>
            <th scope="col">ارتباط</th>
            <th scope="col">عنوان شغل</th>
            <th scope="col">نام و نام خانوادگی</th>
            <th scope="col">ردیف</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($members as $member)
            <tr>
                <td>
                    <form action="{{ route('members.destroy', $member->id) }}" method="post">
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
                <td>{{ $member->name }}</td>
                <td>{{ $member->id }}</td>
            </tr>

            {{--modal for edit --}}
            <div class="modal fade" id="exampleModal{{$member->id}}" tabindex="-1" role="dialog"
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
                            <form action="{{ route('members.update', $member->id) }}" method="POST">
                                @csrf
                                @method("PATCH")
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">نام و نام
                                        خانوادگی:</label>
                                    <div class="col-md-6">
                                        <input id="about_us" type="text" class="form-control" name="name"
                                               value="{{ $member->name }}" required autocomplete="name" autofocus>
                                    </div>
                                </div>
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
                                    <select name="admin" class="custom-select">
                                        <option selected>مدیر یا همکار؟</option>
                                        <option value="{{$member->admin == 1}}">مدیر</option>
                                        <option value="{{$member->admin == 0}}">همکار</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <select name="admin" class="custom-select">
                                        <option selected>درحال حاضر همکار است یا خیر؟</option>
                                        <option value="{{$member->mode == 1}}">همکار است</option>
                                        <option value="{{$member->mode == 0}}">قطع همکاری</option>
                                    </select>
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
                    <form action="{{ route('members.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-right">نام و نام خانوادگی</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                        required autocomplete="name" autofocus>
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
