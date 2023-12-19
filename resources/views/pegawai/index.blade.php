@extends('layouts.master',['title' => 'Daftar Pegawai'])
@section('content')
<section class="wraper">
    <section class="product-list">
        <div class="container">
            <h4>Daftar Pegawai</h4>
            <hr>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-dark fw-bold mb-4" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah Pegawai
                        </button>
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">NAMA LENGKAP</th>
                                        <th scope="col">PHONE</th>
                                       
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $x)
                                        <tr>
                                            <th scope="row">{{$loop->index+=1}}</th>
                                            <td>{{$x->nomor}}</td>
                                            <td>{{$x->name}}</td>
                                            <td>{{$x->immei}}</td>
                                           
                                            <td>
                                                <form action="{{Route('pegawai.destroy', $x->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{Route('pegawai.edit', $x->uuid)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <a href="{{Route('pegawai.show',$x->uuid)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                    <button class="btn btn-danger"><i class="fa fa-trash" onclick="return confirm('apakah akan mengahpus data ini?')"></i></button>
                                                </form>
                                                
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pegawai</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ Route('pegawai.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group mb-3">
                                <label class="fw-bold">Nip</label>
                                <input required type="text" placeholder="Enter Nip" name="nomor" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="fw-bold">Username</label>
                                <input required type="text" placeholder="Enter Username" name="username" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="fw-bold">Nama Lengkap</label>
                                <input required type="text" placeholder="Enter Nama Lengkap" name="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="fw-bold">Email</label>
                                <input required type="email" placeholder="Enter Email" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="fw-bold">Nomor HP</label>
                                <input required type="text" placeholder="Pegawai HP" name="immei" class="form-control">
                            </div>
                            <button class="btn btn-dark">simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
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