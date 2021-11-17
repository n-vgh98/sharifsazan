@extends('writer.layouts.master')
@section('sitetitle')
    صفحات
@endsection

@section('pagetitle')
    لیست صفحات {{ $category->title }}
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">تنظیمات</th>
                <th scope="col">تغیر</th>
                <th scope="col">متن دوم</th>
                <th scope="col">متن اول</th>
                <th scope="col">نام صفحه</th>
                <th scope="col">نام گروه</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
            @foreach ($category->pages as $page)

                <tr>
                    <td>
                        <form action="{{ route('writer.invites.pages.destroy', $page->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </td>
                    <td><a class="btn btn-warning" href="{{ route('writer.invites.pages.edit', $page->id) }}">ویرایش</a>
                    </td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#text2{{ $page->id }}">
                            مشاهده متن دوم
                        </button></td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#text1{{ $page->id }}">
                            مشاهده متن اول
                        </button></td>
                    <td>
                        {{-- title har safhe ba asase adad kar mikone ta moshakhas beshe har safhe bara che ghesmate --}}
                        @if ($page->title == 0)
                            <p>ثبت نام</p>
                        @elseif($page->title == 1)
                            <p>آزمون فنی</p>
                        @elseif($page->title == 2)
                            <p>آزمون عملی</p>
                        @elseif($page->title == 3)
                            <p>همکاری با ما</p>
                        @endif

                    </td>
                    <th scope="row">{{ $page->category->title }}</th>
                    <th scope="row">{{ $number }}</th>
                </tr>

                {{-- modal for first text --}}
                <div class="modal fade" id="text1{{ $page->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">متن اول(بالای صفحه)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @php
                                    echo $page->text1;
                                @endphp
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of modal for first text --}}

                {{-- modal for second text --}}
                <div class="modal fade" id="text2{{ $page->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">متن دوم(پایین صفحه)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @php
                                    echo $page->text2;
                                @endphp
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of modal for second text --}}

                @php
                    $number++;
                @endphp
            @endforeach

        </tbody>
    </table>
    <a href="{{ route('writer.invites.pages.create') }}" class="btn btn-info">ساخته صفحه جدید</a>
@endsection
