@extends('admin.layouts.master')
@section('content')
<section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.projects.gallery.index', 'fa') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.projects.gallery.index', 'en') }}" class="btn btn-primary">انگلیسی</a>
        </div>
</section>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">تنظیمات</th>
            <th scope="col">توضیحات</th>
            <th scope="col">نوع</th>
            <th scope="col">نام پروژه</th>
            <th scope="col">تصویر</th>
            <th scope="col">ردیف</th>
        </tr>
        </thead>
        <tbody>
            @php
                $number = 1;
            @endphp
        @foreach ($languages as $language)
                @php
                    $photo = $language->langable;
                @endphp
            <tr>
                <td>
                    <form action="{{ route('admin.projects.gallery.destroy', $photo->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                    <a href="{{route('admin.projects.gallery.edit', [$photo->id,$photo->language->name])}}"  class="btn btn-primary">
                         ویرایش تصویر
                     </a>
                </td>
                <td>
                         @php
                            echo substr($photo->description, 0, 30);
                        @endphp
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                        data-target="#photo_desc{{ $photo->id }}">
                        متن کامل
                    </button>
                </td>
                @if ($photo->mode == 0)
                    <td><span class="badge badge-pill badge-success">اجرایی </span></td>
                @else ($projecphotot->mode == 1)
                    <td><span class="badge badge-pill badge-danger">فضای بیرونی</span></td>
                @endif
                <td>{{ $photo->project->name }}</td>
                <td>
                    <img src="{{ asset($photo->path) }}" style="width: 35px; height:35px;"> 
                </td>
                <td>{{ $number}}</td>
            </tr>
            {{-- modal to show full text  --}}
                <div class="modal fade" id="photo_desc{{ $photo->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">متن تصویر</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @php
                                    echo $photo->description;
                                @endphp
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of modal to show full  --}}  
        @php
            $number++;
        @endphp
        @endforeach
        </tbody>
    </table>


    <a href="{{route('admin.projects.gallery.create',$lang)}}"  class="btn btn-primary">
        ایجاد تصاویر جدید
    </a>

@endsection
