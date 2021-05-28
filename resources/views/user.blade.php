@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mt-3">Danh sách Tài khoản</h2>
            @if (session('success'))
                <div class="alert alert-primary alert-dismissible col-6" role="alert">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div>
        </div>

        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr class="text-nowrap">
                        <th scope="col">#</th>
                        <th scope="col">Tên Khách hàng</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ngày đăng ký</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item => $value1)
                        <tr>
                            <td>{{ $value1->id }}</td>
                            <td>{{ $value1->name }}</td>
                            <td>{{ $value1->email }}</td>
                            <td>{{ date_format($value1->created_at,"H:i:s \\n\g\à\y d-m-Y") }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="float-right mt-2">
            </div>

        </div>
    </div>
@endsection
