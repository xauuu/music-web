@extends('layout')
@section('content')
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card mt-1">
                <div class="card-header">
                    <h2 class="mt-3">Sửa Album</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ URL::to('/update-album/' . $album->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label class="form-label">Tên album</label>
                            <input type="text" class="form-control" name="name" value="{{ $album->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Năm phát hành</label>
                            <input type="text" class="form-control" name="year" value="{{ $album->year }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ảnh</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="desc" rows="3">{{ $album->desc }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật album</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
