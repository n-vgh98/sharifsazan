@extends('admin.layouts.master')
@section('sitetitle')
    تیم ما
@endsection

@section('pagetitle')
   متن اصلی تیم ما
@endsection
@section('content')
<section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.our_team.index', 'fa') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.our_team.index', 'en') }}" class="btn btn-primary">انگلیسی</a>
        </div>
</section>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">تاریخ آخرین بروزرسانی</th>
                <th scope="col">توضیح تیم ما</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($languages as $language)
                @php
                    $team = $language->langable;
                @endphp
                <tr>
                    <td><a class="btn btn-warning" href="{{ route('admin.our_team.edit', $team->id) }}">ویرایش</a></td>
                    <td>{{$team->updated_at}}</td>
                    <td>{!!Str::limit($team->text,'400')!!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.our_team.create',$lang) }}" class="btn btn-info"> ایجاد متن جدید</a>
@endsection
