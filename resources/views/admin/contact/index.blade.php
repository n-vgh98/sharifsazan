@extends('admin.layouts.master')
@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">فایل ارسالی</th>
                <th scope="col">خلاصه متن</th>
                <th scope="col">ایمیل یا شماره تلفن</th>
                <th scope="col">نام ارسال کننده</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            {{-- make number for rows --}}
            @php
                $number = 1;
            @endphp

            {{-- get each contact_us message datas --}}
            @foreach ($contacts as $contact)
                <tr>
                    <td>

                    </td>

                    <td>
                        <a href="{{ route('admin.contact.download.file', $contact->id) }}" class="btn btn-primary">دانلود
                            فایل</a>
                    </td>

                    <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#text{{ $contact->id }}">
                            متن کامل
                        </button>{{ substr($contact->text, 0, 25) }}</td>

                    <td>{{ $contact->email }}</td>

                    <td>{{ $contact->name }}</td>

                    <th scope="row">{{ $number }}</th>
                </tr>

                {{-- modal for show full messsage --}}
                <div class="modal fade" id="text{{ $contact->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">متن پیام</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $contact->text }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- make number for rows --}}
                @php
                    $number++;
                @endphp
            @endforeach

        </tbody>
    </table>
@endsection
