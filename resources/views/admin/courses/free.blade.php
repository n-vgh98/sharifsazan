@extends('admin.layouts.master')
@section('sitetitle')
    دوره های رایگان
@endsection

@section('pagetitle')
    دوره های رایگان
@endsection
@section('content')
    <table class="table  table-striped">
        <thead>
            <tr>
                <th scope="col">تنظیمات</th>
                <th scope="col">تغیر</th>
                <th scope="col">تعداد دفعات استفاده</th>
                <th scope="col">تخفیف</th>
                <th scope="col">هزینه دوره به تومان</th>
                <th scope="col">وضعیت برگزاری دوره</th>
                <th scope="col">نوع دوره</th>
                <th scope="col">نام استاد</th>
                <th scope="col">نام دوره</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            {{-- making number for rows --}}
            @php
                $number = 1;
            @endphp
            @foreach ($courses as $course)
                <tr>

                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#edit{{ $course->id }}">
                            حذف
                        </button>
                    </td>
                    <td>
                        <a href="{{ 'admin.courses.create' }}" class="btn btn-warning">ویرایش</a>
                    </td>
                    <td>{{ $course->use_time }}</td>
                    <td>{{ $course->off }}%</td>
                    <td>
                        {{ number_format($course->price) }}
                    </td>
                    <td>
                        @if ($course->mode == 1)
                            آنلاین
                        @else
                            آفلاین
                        @endif
                    </td>
                    <td>
                        @if ($course->type == 1)
                            بسته فیزیکی
                        @else
                            الکترونیک
                        @endif
                    </td>
                    <td>{{ $course->master_name }}</td>
                    <td>{{ $course->title }}</td>

                    <th scope="row">{{ $number }}</th>
                </tr>

                {{-- modal for editing courses --}}
                <div class="modal fade" id="edit{{ $course->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end ofmodal for editing courses --}}

                @php
                    $number++;
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection
