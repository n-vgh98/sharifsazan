@extends('admin.layouts.master')
@section('sitetitle')
    کتابخانه آنلاین
@endsection

@section('pagetitle')
    لیست کتاب ها
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">تنظیمات</th>
                <th scope="col">لینک دانلود</th>
                <th scope="col">نام کتاب </th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
            @foreach ($books as $book)

                <tr>
                    <td>
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </td>
                    <td><a class="btn btn-info" href="{{ route('admin.books.download', $book->id) }}">دانلود</a></td>
                    <td>{{ $book->name }}</td>
                    <th scope="row">{{ $number }}</th>
                </tr>
                @php
                    $number++;
                @endphp
            @endforeach

        </tbody>
    </table>
@endsection
