@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="mt-3">Danh sách Album</h2>
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
            <a href="{{ URL::to('admin/add-album') }}" class="btn btn-outline-primary">Thêm album</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr class="text-nowrap">
                    <th scope="col">#</th>
                    <th scope="col">Tên album</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($album as $item => $value1)
                    <tr>
                        <th scope="row">{{ $value1->id }}</th>
                        <td>{{ $value1->name }}</td>
                        <td><img src="{{config('global.url-image').$value1->imageUrl}}" alt=""></td>
                        <td>{{ $value1->desc }}</td>
                        <td>
                            <a class="btn btn-outline-danger" onclick="return confirm('Xoá bài hát này')" href="{{ URL::to('/admin/delete-song/' . $value1->id) }}">
                                <i class="align-middle" data-feather="trash-2"></i></a>
                            <a class="btn btn-outline-warning" href="{{ URL::to('/admin/edit-song/' . $value1->id) }}">
                                <i class="align-middle" data-feather="edit"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection

