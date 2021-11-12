@extends('admin.layouts.master')
@section('sitetitle')
    لیست همه کاربران
@endsection
@section('content')
@section('pagetitle')
    همه کاربران
@endsection
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">تنظیمات</th>
            <th scope="col">دسترسی ها</th>
            <th scope="col">جنسیت</th>
            <th scope="col">شغل</th>
            <th scope="col">ایمیل</th>
            <th scope="col">نام</th>
            <th scope="col">شماره</th>

        </tr>
    </thead>
    <tbody>
        {{-- make number for rows --}}
        @php
            $number = 1;
        @endphp
        @foreach ($users as $user)
            {{-- getting roles --}}
            @php
                $rolesname = [];
            @endphp
            {{-- putting roles name into $rolesname --}}
            @foreach ($user->roles as $role)
                @php
                    array_push($rolesname, $role->name);
                @endphp
            @endforeach


            <tr>
                <td>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">حذف کاربر</button>

                    </form>

                </td>

                {{-- change $rolesname to string to show roles --}}
                <td>{{ implode(',', $rolesname) }}</td>


                {{-- check if user is male of femail --}}
                @if ($user->gender == 0)
                    <td>{{ 'مرد' }}</td>
                @else
                    <td>{{ 'زن' }}</td>
                @endif
                {{-- check if user is male of femail --}}
                <td>{{ $user->job }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>
                <th scope="row">{{ $number }}</th>
            </tr>


            @php
                $number++;
            @endphp
        @endforeach
    </tbody>
</table>
@endsection
