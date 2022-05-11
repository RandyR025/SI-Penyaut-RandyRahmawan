@extends('frontend/layouts.template')
@section('content')
<div class="popular_causes_area pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Rekening Bank</h3>
                    </div>
                    <div class="card-body">
                        <center>
                        <table width="600px" height="300px">
                            <tr>
                                <td><img src="{{asset('images')}}/BRI.png" alt="Rekening BRI" style="max-width: 150px; max-height: 200px"></td>
                                <td><h3>122283746</h3></td>
                            </tr>
                            <tr>
                                <td><img src="{{asset('images')}}/BCA.png" alt="Rekening BRI" style="max-width: 150px; max-height: 100px"></td>
                                <td><h3>122283746</h3></td>
                            </tr>
                            <tr>
                                <td><img src="{{asset('images')}}/Mandiri.png" alt="Rekening BRI" style="max-width: 150px; max-height: 100px"></td>
                                <td><h3>122283746</h3></td>
                            </tr>
                            <tr>
                                <td><img src="{{asset('images')}}/gopay.png" alt="Rekening BRI" style="max-width: 150px; max-height: 200px"></td>
                                <td><h3>0895350401618</h3></td>
                            </tr>
                        </table>
                        </center>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection