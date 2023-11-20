@extends('layouts.master',['title' => 'Dashboard'])
@section('content')
<section class="wraper">
    <div class="container">
        <div class="alert alert-info border-0 text-start">
            <h4>Selamat Datang, <strong class="fw-bold"> {{Auth::user()->name}}</strong></h4>
        </div>       
        <div class="row">
            <div class="col-lg-3 col-6 mb-3">
                <div class="card text-light border-0 shadow bg-orange">
                    <div class="card-body">
                        <h3>Total Karyawan</h3>
                        <h3  class="fw-bold"> <i class="fa fa-user fa-1x"> </i>
                           {{$totalPegawai}} +</h3>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6 mb-3">
                <div class="card text-light border-0 shadow bg-success">
                    <div class="card-body">
                        <h3>Total Karyawan Aktif</h3>
                        <h3  class="fw-bold"> <i class="fa fa-user fa-1x"> </i>
                           {{$totalPegawaiAktif}} +</h3>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6 mb-3">
                <div class="card text-light border-0 shadow bg-danger">
                    <div class="card-body">
                        <h3>Total Karyawan Tidak Aktif</h3>
                        <h3  class="fw-bold"> <i class="fa fa-user fa-1x"> </i>
                           {{$totalPegawaiNonaktif}} +</h3>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection