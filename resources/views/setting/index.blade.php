@extends('layouts.master', ['title' => 'Pengaturan'])
@section('content')
    <section class="wraper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mb-3">
                    <div class="card border-0">
                       
                        <div class="card-body">
                            <form action="{{ Route('pengaturan.update', $data->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="mb-2 mt-2 fw-bold" for="">Qr Kode Pulang</label>
                                    <input type="text" name="qrcode_pulang" value="{{ $data->qrcode_pulang }}"
                                        placeholder="Kode Qr Kode Pulang" class="qrcode_in form-control">
                                        <button type="button" onclick="return qrcodein()" class="mt-3 btn btn-dark fw-bold mb-3" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Lihat Qrocde
                                    </button>
                                    {{-- <button  class="btn btn-outline-dark mt-2"><i class="fa fa-random"></i> random key</button> --}}
                                </div>
                                <div class="form-group">
                                    <label class="mb-2 mt-2 fw-bold" for="">Qr Kode Masuk</label>
                                    <input type="text" name="qrcode_masuk" value="{{ $data->qrcode_masuk }}"
                                        placeholder="Kode Qr Kode Masuk" class="qrcode_out form-control">
                                        <button type="button" onclick="return qrcodeout()" class="mt-3 btn btn-dark fw-bold mb-3" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Lihat Qrocde
                                    </button>
                                    {{-- <button class="btn btn-outline-dark mt-2"><i class="fa fa-random"></i> random key</button> --}}
                                </div>
                                <div class="form-group">
                                    <label class="mb-2 mt-2 fw-bold" for="">Longitude</label>
                                    <input type="text" class="form-control" value="{{ $data->longitude }}"
                                        name="longitude" placeholder="Longitude">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2 mt-2 fw-bold" for="">Latitude</label>
                                    <input type="text" class="form-control" name="latitude" value="{{ $data->latitude }}"
                                        placeholder="Latitude">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2 mt-2 fw-bold" for="">Jam Masuk</label>
                                    <input type="time" class="form-control" value="{{ $data->jam_masuk }}"
                                        name="jam_masuk">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2 mt-2 fw-bold" for="">Jam Keluar</label>
                                    <input type="time" class="form-control" value="{{ $data->jam_keluar }}"
                                        name="jam_keluar">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2 mt-2 fw-bold" for="">Ketentuan Radius Jarak Absensi
                                        (Meter)</label>
                                    <input type="text" placeholder="Radius Meter" name="radius"
                                        value="{{ $data->radius }}" class="form-control">
                                </div>
                                <button class="btn btn-dark fw-bold mt-3">simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Qrcode</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <canvas id="qrcode"></canvas>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('theme/qrious.min.js') }}"></script>
    <script>
        const qrcode_in = document.querySelector(".qrcode_in").value
        const qrcode_out = document.querySelector(".qrcode_out").value
        const qrcodein = () => {
            (function() {
                var qr = new QRious({
                    element: document.getElementById('qrcode'),
                    value: qrcode_in
                });
            })();
        }

        const qrcodeout = () => {
            (function() {
                var qr = new QRious({
                    element: document.getElementById('qrcode'),
                    value: qrcode_out
                });
            })();
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
@endsection
