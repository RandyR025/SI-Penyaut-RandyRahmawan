@extends('frontend/layouts.template')
@section('content')
<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Donate</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_causes_area_start  -->
<div class="popular_causes_area pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="single_cause">
                    <div class="thumb">
                        <img src="{{ asset('images/'.$donasi->banner)}}" alt="">
                    </div>
                    <div class="causes_content">
                        <div class="custom_progress_bar">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100"
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('donasi',$donasi->id)}}">
                            <h2>{{ $donasi->nama_donasi }}</h2>
                        </a>
                        <h4>{{ $donasi->penerima }}</h4>
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
                        <form action="{{ route('donate') }}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="donasi" value="{{ $donasi->id }}">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" value="{{ Auth::user()->name }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control " value="{{ Auth::user()->email }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="text" name="nominal" id="nominal" value="{{Request::old('nominal')}}"
                                    class="form-control  @error('nominal') is-invalid @enderror">
                                @error('nominal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="5"
                                    class="form-control  @error('keterangan') is-invalid @enderror">{{Request::old('keterangan')}}</textarea>
                                @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="metode">Metode Transfer</label>
                                <select name="metode" id="metode" class="form-control">
                                    <option value="BCA">BCA</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="BRI">BRI</option>
                                    <option value="DANA">DANA</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Donate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection