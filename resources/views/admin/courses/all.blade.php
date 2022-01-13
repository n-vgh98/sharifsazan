@extends('admin.layouts.master')
@section('sitetitle')
    تمام دوره ها
@endsection

@section('pagetitle')
    تمام دوره ها
@endsection
@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.courses.all.farsi') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.courses.all.english') }}" class="btn btn-primary">انگلیسی</a>
        </div>
    </section>
    <table class="table  table-striped">
        <thead>
            <tr>
                <br><br>
                <strong>دوره های فارسی</strong>
                <br>
                <th scope="col">تنظیمات</th>
                <th scope="col">تغیر</th>
                <th scope="col">زبان</th>
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
            @foreach ($languages as $language)
                @php
                    $course = $language->langable;
                @endphp
                <tr>
                    <td>
                        <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning">ویرایش</a>
                    </td>
                    <td>
                        {{ $course->language->name }}
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
                @php
                    $number++;
                @endphp
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.courses.create') }} " class="btn btn-primary">ساخت دوره جدید</a>
@endsection
