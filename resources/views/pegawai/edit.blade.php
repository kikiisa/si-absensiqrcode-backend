@extends('layouts.master',['title' => 'Daftar Pegawai'])
@section('content')
<section class="wraper">
    <section class="product-list mb-4">
        <div class="container">
            <h4>Edit Pegawai</h4>
            <hr>
            <div class="row justify-content-start">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('pegawai.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nip</label>
                                    <input required type="text" value="{{$data->nomor}}" placeholder="Enter Nip" name="nomor" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Username</label>
                                    <input required type="text" value="{{$data->username}}" placeholder="Enter Username" name="username" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nama Lengkap</label>
                                    <input required type="text" value="{{$data->name}}" placeholder="Enter Nama Lengkap" name="name" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input required type="email" value="{{$data->email}}" placeholder="Enter Email" name="email" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nomor HP</label>
                                    <input required type="text" value="{{$data->immei}}" placeholder="Enter Immei HP" name="immei" class="form-control">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="" selected disabled>Pilih Status</option>
                                        <option value="1" {{$data->status == 1 ? 'selected' : ''}}>Aktif</option>
                                        <option value="0" {{$data->status == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                                    </select>
                                </div>
                                
                                <button class="btn btn-dark">simpan</button>
                            </form>
                        </div>
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