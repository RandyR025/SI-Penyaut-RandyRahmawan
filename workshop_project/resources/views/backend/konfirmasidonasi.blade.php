@extends('backend/layouts.template')
@section('titlepage')
    Donasi
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Konfirmasi Donasi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nominal</th>
                    <th>Bukti</th>
                    <th>Konfirmasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detail as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>Rp.{{number_format($item->nominal,2) }}</td>
                    <td><a href="{{ url('images/buktitransfer',$item->bukti_transfer) }}" target="_blank">Lihat</a></td>
                    <td>
                        @if ($item->konfirmasi == 2)
                            <div class="row">
                                <form action="{{ route('detail.approve',$item->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary"
                                        onclick="return confirm('Pakah Anda Yakin Ingin Konfirmasi Data Ini?')" >
                                        <i class="fa fa-check"></i></button>
                                </form>
                                <form action="{{ route('detail.disapprove',$item->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Pakah Anda Yakin Ingin Menolak Data Ini?')">
                                        <i class="fa fa-exclamation"></i></button>
                                </form>
                            </div>
                        @else
                            {{ $item->konfirmasi == 1 ? 'Konfirmasi' : 'Bukti Salah' }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@push('js')
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endpush