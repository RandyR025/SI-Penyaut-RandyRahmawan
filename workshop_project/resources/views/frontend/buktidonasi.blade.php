@extends('frontend/layouts.template')
@section('content')
<div class="popular_causes_area pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Upload Bukti Transfer Donasi</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger" style="margin-top: 10px">
                            <strong>Whoops!</strong> Ada Masalah dengan input anda.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('donasiuser.update', $detail->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $detail->id }}">
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input class="form-control" type="text" name="nominal" id="nominal" value="{{ $detail->nominal }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="bukti">Bukti</label>
                                <input class="form-control  @error('bukti') is-invalid @enderror" type="file" name="bukti" id="bukti">
                                @error('bukti')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button class="btn btn-success" type="submit">Sumbit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection