@extends('admin.layouts.master')
@section('sitetitle')
    تیم ما
@endsection

@section('pagetitle')
   متن اصلی تیم ما
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">تاریخ آخرین بروزرسانی</th>
                <th scope="col">توضیح تیم ما</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ourteam as $team)

                <tr>
                    <td><a class="btn btn-warning" href="{{ route('our_team.edit', $team->id) }}">ویرایش</a></td>
                    <td>{{$team->updated_at}}</td>
                    <td>{!!Str::limit($team->text,'400')!!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('our_team.create') }}" class="btn btn-info"> ایجاد متن جدید</a>
@endsection
