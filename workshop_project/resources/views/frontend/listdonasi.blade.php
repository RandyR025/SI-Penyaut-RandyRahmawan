@extends('frontend/layouts.template')
@section('content')
<div class="popular_causes_area pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">List Donasi</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Donasi</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donasi as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nama_donasi }}</td>
                                        <td>Rp.{{number_format($item->nominal,2) }}</td>
                                        <td>
                                            @if ($item->konfirmasi == 0)
                                                <a href="{{ route('donasiuser.upload',$item->id) }}">Upload Bukti</a>
                                            @else
                                                {{ $item->konfirmasi == 1 ? 'Konfirmasi' : 'Belum' }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection