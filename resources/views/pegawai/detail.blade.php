@extends('layouts.master',['title' => 'Daftar Absensi Pegawai'])
@section('content')
<section class="wraper">
    <section class="product-list">
        <div class="container">
            <h4>Daftar Absensi Pegawai <strong>{{$pegawai->name}}</strong></h4>
            <hr>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <form method="get">
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label for="year">Select Year:</label>
                                    <select class="form-control" id="year" name="year">
                                        @for ($i = date('Y'); $i >= 2010; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            
                                <div class="form-group col-lg-3">
                                    <label for="month">Select Month:</label>
                                    <select class="form-control" id="month" name="month">
                                        @for ($m = 1; $m <= 12; $m++)
                                            <option value="{{ $m }}">{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-outline-dark mt-2" type="submit" name="rekap" value="cetak">
                                <i class="fa fa-print"></i> Rekap Data
                            </button>
                            <button class="btn btn-outline-dark mt-2" type="submit" name="cetak" value="cetak">
                                <i class="fa fa-print"></i> Cetak
                            </button>
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
                                                @elseif($x->status == 'hadir')
                                                    <div class="badge bg-success text-white">Hadir</div>    
                                                @elseif ($x->status == 'sakit')
                                                    <div class="badge bg-warning text-white">Sakit</div>
                                                @elseif ($x->status == 'perjalanan_dinas')
                                                    <div class="badge bg-dark text-white">Perjalanan Dinas</div>
                                                @else
                                                    <div class="badge bg-info text-white">Izin</div>
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