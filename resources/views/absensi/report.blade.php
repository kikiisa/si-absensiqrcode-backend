<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekap Data</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style type="text/css">
    @media print {
        @page {
            size: landscape;
        }
    }
</style>
<body>
    <div class="container">
        <h4 class="text-center mt-4 py-4">REKAP DATA ABSENSI PEGAWAI</h4>
        <hr>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $x)
                        <tr>
                            <th scope="row">{{ $loop->index += 1 }}</th>
                            <td>{{ $x->pegawai->nomor }}</td>
                            <td>{{ $x->pegawai->name }}</td>
                            <td>{{ $x->tgl_absen }}</td>
                            <td>{{ $x->masuk }}</td>
                            <td>{{ $x->keluar }}</td>
                            <td>
                                @if ($x->status == 'terlambat')
                                   Terlambat
                                @else
                                    Hadir
                                @endif

                            </td>
                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        window.print()
    </script>
</body>

</html>
