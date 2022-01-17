@extends('admin.layouts.master')
@section('sitetitle')
    پیام های عمومی
@endsection
@section('pagetitle')
    پیام های عمومی
@endsection
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">تنظیمات</th>
                <th scope="col">وضعیت نمایش</th>
                <th scope="col">لینک</th>
                <th scope="col">خلاصه متن</th>
                <th scope="col">عنوان</th>
                <th scope="col">دریافت کننده</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>

            {{-- make number for rows --}}
            @php
                $number = 1;
            @endphp

            @foreach ($notifications as $notification)

                {{-- for removing notification --}}
                <tr>
                    <td>
                        <form action="{{ route('admin.notifications.destroy', $notification->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف پیام</button>
                        </form>
                    </td>
                    {{-- for removing notification --}}

                    {{-- for changing status --}}
                    @if ($notification->status == 1)
                        <td>
                            <form action="{{ route('admin.notifications.status.update', $notification->id) }}"
                                method="post">
                                @csrf
                                <button type="submit" class="btn btn-info">در حال نمایش</button>
                            </form>
                        </td>
                    @else
                        <td>
                            <form action="{{ route('admin.notifications.status.update', $notification->id) }}"
                                method="post">
                                @csrf
                                <button type="submit" class="btn btn-info">عدم نمایش</button>
                            </form>
                        </td>
                    @endif
                    {{-- for changing status --}}

                    <td>
                        @if ($notification->link == null)
                            ندارد
                        @else
                            <a href="{{ $notification->link }}">ورود به لینک</a>
                        @endif
                    </td>
                    <td>
                        {{-- button to show full message --}}
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#text{{ $notification->id }}">متن
                            کامل</button>...{{ substr($notification->text, 0, 25) }}
                    </td>
                    <td>{{ $notification->title }}</td>
                    <td>همه کاربران</td>
                    <th scope="row">{{ $number }}</th>
                </tr>


                <!-- Modal  for showing message-->
                <div class="modal fade" id="text{{ $notification->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">متن پیام</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{ $notification->text }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- make number for rows --}}
                @php
                    $number++;
                @endphp
            @endforeach

        </tbody>
    </table>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ایجاد پیام جدید
    </button>

    {{-- modal for making new public mmessage --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ارسال پیام عمومی </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.notifications.store') }}" method="POST">
                        @csrf

                        <div>
                            <label for="text">عنوان پیام</label>
                            <input type="text" required name="title" class="form-control">
                            @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="text">متن پیام</label>
                            <input type="text" required name="text" class="form-control">
                            @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="link">لینک</label>
                            <input type="text" name="link" placeholder="این قسمت میتواند خالی باشد" class="form-control">
                            @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
@endsection
