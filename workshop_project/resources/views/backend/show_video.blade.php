@extends('backend/layouts.template')
@section('titlepage')
    Video
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Show Video</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" value="{{ $video->judul }}" disabled>
        </div>
        <div class="form-group">
            <label for="judul">Tanggal</label>
            <input type="text" class="form-control" value="{{ $video->tanggal }}" disabled>
        </div>
        <div class="form-group">
            <label for="judul">Deskripsi</label>
            <textarea class="form-control" cols="30"  disabled>{{ $video->deskripsi }}</textarea>
        </div>
        <div class="form-group">   
            <video width="320" height="240" controls>
                <source src="{{ asset('videos/'.$video->video) }}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
        </div>
        <a href="{{ route('video.index') }}" class="btn  btn-primary">Kembali</a>
    </div>
</div>
@endsection
