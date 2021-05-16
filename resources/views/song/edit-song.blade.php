@extends('layout')
@section('content')
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card mt-1">
                <div class="card-header">
                    <h2 class="mt-3">Cập Nhật Bài hát</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ URL::to('/update-song/' . $song->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label class="form-label">Tên bài hát</label>
                            <input type="text" class="form-control" name="name" value="{{ $song->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Album</label>
                            <select class="form-control mb-3" name="album_id" required>
                                <option value="">Chọn album</option>
                                @foreach ($album as $item => $value)
                                    @if ($value->id == $song->album_id)
                                        <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                                    @else
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ca sỹ</label>
                            <input type="text" class="form-control" value="{{ $song->artist }}" name="artist" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ảnh</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">File mp3</label>
                            <input type="file" class="form-control" name="song" accept="audio/mp3">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật bài hát</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
