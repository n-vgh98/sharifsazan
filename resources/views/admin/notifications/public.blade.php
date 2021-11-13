@extends('admin.layouts.master')
@section('sitetitle')
     پیام های عمومی
@endsection
@section('pagetitle')
    پیام های عمومی
@endsection
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>

            {{-- make number for rows --}}
            @php
                $number = 1;
            @endphp

            @foreach ($notifications as $notification)
                <tr>
                    <td>@mdo</td>
                    <td>Otto</td>
                    <td>Mark</td>
                    <th scope="row">{{ $number }}</th>
                </tr>

                {{-- make number for rows --}}
                @php
                    $number++;
                @endphp
            @endforeach

        </tbody>
    </table>
@endsection
