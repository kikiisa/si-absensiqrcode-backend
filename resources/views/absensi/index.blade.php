@extends('layouts.master',['title' => 'Daftar Absensi Pegawai'])
@section('content')
<section class="wraper">
    <section class="product-list">
        <div class="container">
            <h4>Daftar Absensi Pegawai</h4>
            <hr>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                       <form  method="get">
                           <button class="btn btn-outline-dark mb-2" name="q" value="cetak"><i class="fa fa-print"></i>Rekap Data</button>
                       </form>
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">NAMA LENGKAP</th>
                                        <th scope="col">TANGGAL ABSENSI</th>
                                        <th scope="col">WAKTU MASUK</th>
                                        <th scope="col">WAKTU KELUAR</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">FOTO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $x)
                                        <tr>
                                            <th scope="row">{{$loop->index+=1}}</th>
                                            <td>{{$x->pegawai->nomor}}</td>
                                            <td>{{$x->pegawai->name}}</td>
                                            <td>{{$x->tgl_absen}}</td>
                                            <td>{{$x->masuk}}</td>
                                            <td>{{$x->keluar}}</td>
                                            <td>
                                                @if ($x->status == 'terlambat')
                                                    <div class="badge bg-danger text-white">Terlambat</div>
                                                @else
                                                    <div class="badge bg-success text-white">Hadir</div>    
                                                @endif
                                                
                                            </td>
                                            <td>
                                                <button type="button" onclick="return showFotoMasuk('{{$x->foto_masuk}}')" class="btn btn-primary fw-bold" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Foto Masuk
                                                </button>
                                                <button type="button" onclick="return showFotoKeluar('{{$x->foto_keluar}}')" class="btn btn-warning fw-bold" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Foto Keluar
                                                </button>
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
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Absensi Pegawai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <img  alt="foto"  class="foto w-100">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const foto = document.querySelector(".foto")
        const showFotoMasuk = (files) => 
        {
            foto.src = `data-image/${files}`
        } 
        const showFotoKeluar = (files) => 
        {
            foto.src = `data-image/${files}`
        }
    </script>
    <script src="{{ asset('theme/vendor/toastify/src/toastify.js') }}"></script>
    @if (count($errors) > 0)
        <script>
            var errors = @json($errors->all());
            Toastify({
                text: errors,
                duration: 3000,
                close: true,
                backgroundColor: "#D61355",
            }).showToast();
        </script>
    @enderror
    @if (session()->has('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                backgroundColor: "#19C37D",
            }).showToast();
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                close: true,
                backgroundColor: "#D61355",
            }).showToast();
        </script>
    @endif
</section>
@endsection