@extends('admin.layouts.master')
@section('sitetitle')
    مقالات
@endsection

@section('pagetitle')
    لیست مقالات دسته بندی {{ $category->title }}
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">تنظیمات</th>
                <th scope="col">امکانات</th>
                <th scope="col">خلاصه متن</th>
                <th scope="col">نام دسته بندی </th>
                <th scope="col">عنوان مقاله </th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
            @foreach ($category->articles as $article)

                <tr>
                    <td>
                        <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </td>
                    <td><a class="btn btn-warning" href="{{ route('admin.articles.edit', $article->id) }}">ویرایش</a></td>
                    <td>
                        @php
                            echo substr($article->text, 0, 30);
                        @endphp
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#article{{ $article->id }}">
                            متن کامل
                        </button>

                    </td>
                    <td>{{ $article->category->title }}</td>
                    <td>{{ $article->title }}</td>
                    <th scope="row">{{ $number }}</th>
                </tr>

                {{-- modal to show full text of article --}}
                <div class="modal fade" id="article{{ $article->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">متن مقاله</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @php
                                    echo $article->text;
                                @endphp
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of modal to show full text of article --}}

                @php
                    $number++;
                @endphp
            @endforeach

        </tbody>
    </table>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">ساخت مقاله جدید</a>

@endsection
