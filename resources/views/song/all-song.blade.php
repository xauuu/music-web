@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mt-3">Danh sách Bài hát</h2>
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
                <a href="{{ URL::to('add-song') }}" class="btn btn-outline-primary">Thêm bài hát</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr class="text-nowrap">
                        <th scope="col">#</th>
                        <th scope="col">Tên bài hát</th>
                        <th scope="col">Album</th>
                        <th scope="col">Ca sỹ</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($song as $item => $value1)
                        <tr>
                            <td>{{ $value1->id }}</td>
                            <td>{{ $value1->name }}</td>
                            <td>{{ $value1->album->name }}</td>
                            <td>{{ $value1->artist }}</td>
                            <td><img src="{{ config('global.url-image') . $value1->imageUrl }}" width="100"></td>
                            <td>
                                <a class="btn btn-outline-danger" onclick="return confirm('Xoá bài hát này')"
                                    href="{{ URL::to('destroy-song/' . $value1->id) }}">
                                    <i class="align-middle" data-feather="trash-2"></i></a>
                                <a class="btn btn-outline-warning" href="{{ URL::to('edit-song/' . $value1->id) }}">
                                    <i class="align-middle" data-feather="edit"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="float-right mt-2">
            </div>

        </div>
    </div>
@endsection
