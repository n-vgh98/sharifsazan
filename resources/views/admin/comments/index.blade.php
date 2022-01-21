@extends('admin.layouts.master')
@section('sitetitle')
    کامنت ها
@endsection

@section('pagetitle')
    لیست کامنت ها
@endsection

@section('content')

    <br><br><br>
    <strong>لیست کامنت ها </strong>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">تنظیمات</th>
                <th scope="col">تاییدیه</th>
                <th scope="col">متن کامنت</th>
                <th scope="col">نام ارسال کننده </th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
            @foreach ($comments as $comment)
                <tr>
                    <td>
                        <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>

                    </td>

                    <td>
                        @if ($comment->status == 1)
                            <form action="{{ route('admin.comments.decline', $comment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">تایید شده</button>
                            </form>
                        @endif
                        @if ($comment->status == 0)
                            <form action="{{ route('admin.comments.accept', $comment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">تایید نشده</button>
                            </form>
                        @endif
                    </td>

                    <td><button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#exampleModalLong0{{ $comment->id }}">
                            مشاهده متن کامل
                        </button></td>
                    <td>{{ $comment->sender->name }}</td>
                    <th scope="row">{{ $number }}</th>
                </tr>
                @php
                    $number++;
                @endphp
                <!-- Modal for editing-->
                <div class="modal fade" id="exampleModalLong0{{ $comment->id }}" tabindex="-1" role="dialog"
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
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div style="margin-top: 25px;">
                                        <label for="name">متن</label>
                                        <textarea type="text" disabled name="name" id="name" required
                                            class="form-control">{{ $comment->text }}</textarea>
                                    </div>
                                    <input type="hidden" name="lang" value="0">
                                    <div style="margin-top: 25px;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach

        </tbody>
    </table>
@endsection
