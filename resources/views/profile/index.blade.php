@extends('layouts.master',['title' => 'Daftar Pegawai'])
@section('content')
<section class="wraper">
    <section class="product-list mb-4">
        <div class="container">
            <h4>Profile </h4>
            <hr>
            <div class="row justify-content-start">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('profile.update',Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nama Lengkap</label>
                                    <input required type="text" value="{{Auth::user()->name}}" placeholder="Enter Username" name="name" class="form-control">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input required type="email" value="{{Auth::user()->email}}" placeholder="Enter Email" name="email" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Password</label>
                                    <input type="password" placeholder="Enter Password" name="password" class="form-control">
                                    <small class="text-info">Kosongkan Jika Tidak Ingin Mengubah Password</small>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Konfirmasi Password</label>
                                    <input type="password" placeholder="Konfrimasi Password" name="confirm" class="form-control">
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