@extends('layout')
@section('content')
<div class="row">
    <div class="col-xl-8 mx-auto">
        <div class="card mt-1">
            <div class="card-header">
                <h2 class="mt-3">Thêm Bài hát</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ URL::to('/save-song') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label class="form-label">Tên bài hát</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Album</label>
                        <select class="form-control mb-3" name="album_id" required>
                            <option value="">Chọn album</option>
                            @foreach ($album as $item => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ca sỹ</label>
                        <input type="text" class="form-control" name="artist" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ảnh</label>
                        <input type="file" class="form-control" name="image" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File mp3</label>
                        <input type="file" class="form-control" name="song" accept="audio/mp3" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm bài hát</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
