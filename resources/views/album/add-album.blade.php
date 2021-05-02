@extends('layout')
@section('content')
<div class="row">
    <div class="col-xl-8 mx-auto">
        <div class="card mt-1">
            <div class="card-header">
                <h2 class="mt-3">Thêm Album</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ URL::to('/admin/save-album')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label class="form-label">Tên album</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ảnh</label>
                        <input type="file" class="form-control" name="image" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea class="form-control" name="desc" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm thương hiệu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
