@extends('admin.layouts.master')
@section('sitetitle')
    لیست کاربران ادمین
@endsection
@section('content')
@section('pagetitle')
    کاربران ادمین
@endsection
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">تنظیمات</th>
            <th scope="col">تغیر سطوح دسترسی </th>

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

            {{-- check if admin is in rolesname or not (check mikone ke admin hast ya na) --}}
            @if (in_array('admin', $rolesname)))
                <tr>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف کاربر</button>

                        </form>

                    </td>

                    {{-- section for changing roles --}}
                <td>
                    <div class="btn-group"> <button type="button" class="btn btn-info dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">تغیر سطح <span
                                class="caret"></span></button>
                        <ul class="dropdown-menu">
                            @if (in_array('admin', $rolesname))
                                <li><a href="#">قطع دسترسی ادمین</a></li>
                            @else
                                <li><a href="#">دادن دسترسی ادمین</a></li>
                            @endif

                            @if (in_array('writer', $rolesname))
                                <li><a href="#">قطع دسترسی نویسنده</a></li>
                            @else
                                <li><a href="#">دادن دسترسی نویسنده</a></li>
                            @endif
                            @if (count($rolesname) > 0)
                                <li><a href="#">قطع تمامی دسترسی ها</a></li>
                            @endif

                        </ul>
                    </div>
                </td>

                    {{-- change $rolesname to string to show roles --}}
                    @if (count($rolesname) !== 0)
                        <td>
                            {{ implode(',', $rolesname) }}

                        </td>
                    @else
                        {{-- if $rolesname is null so its user --}}
                        <td>User</td>
                    @endif


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
            @endif

        @endforeach
    </tbody>
</table>
@endsection
