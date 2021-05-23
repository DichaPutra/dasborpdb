@extends('layouts.app2')


@section('menu')
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDashboard"
       aria-expanded="true" aria-controls="collapseDashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
    <div id="collapseDashboard" class="collapse" aria-labelledby="headingDashboard" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('KategoriSektorLP')}}">Kategori Sektor</a>
            <a class="collapse-item" href="{{route('WilayahProvinsiLP')}}">Wilayah Provinsi</a>
        </div>
    </div>
</li>

<!-- Nav Item - Master Data -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
       aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-database"></i>
        <span>Master Data</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('DataPdb')}}">Data PDRB</a>
        </div>
    </div>
</li>

<!-- Nav Item - Panduan -->
<li class="nav-item active">
    <a class="nav-link" href="{{route('panduan')}}">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Panduan</span></a>
</li>

<!-- Nav Item - Tentang -->
<li class="nav-item">
    <a class="nav-link" href="{{route('tentang')}}">
        <i class="fas fa-fw fa-info-circle"></i>
        <span>Tentang</span></a>
</li>
@endsection


@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panduan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Pilihan Kategori Sektor -->
        <div class="col-lg-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <h5><b>Panduan Input Data</b></h5>
                    1. Menuju halaman input data pada menu Master data -> Data PDRB <br>
                    <img src="{{ asset('img/1.PNG') }}" class="img-fluid rounded d-block img-thumbnail" alt="img">
                    2. Generate format input file excel (pilih wilayah -> pilih tahun -> generate format), file akan terunduh otomatis <br>
                    <img src="{{ asset('img/2.PNG') }}" class="img-fluid rounded d-block img-thumbnail" alt="img">
                    3. Buka file excel yang telah terunduh tadi, kemudian inputkan data PDRB ke dalam kolom PDRB sesuai ID Sektor lapangan usaha <br>
                    <img src="{{ asset('img/3.PNG') }}" class="img-fluid rounded d-block img-thumbnail" alt="img">
                    Berikut adalah rincian penjelasan ID Sektor yang diisikan (ID Sektor 18 merupakan ID untuk PDRB total)<br>
                    <img src="{{ asset('img/4.PNG') }}" class="img-fluid rounded d-block img-thumbnail" alt="img">
                    4. Pilih file format excel yang diisi dengan menekan Browse, kemudian tekan Tambah<br>
                    <img src="{{ asset('img/5.PNG') }}" class="img-fluid rounded d-block img-thumbnail" alt="img">
                    5. Data berhasil ditambahkan<br><br><br>
                    <h5><b>Panduan Hapus Data</b></h5>
                    1. Menuju halaman yang sama dengan input data<br>
                    <img src="{{ asset('img/1.PNG') }}" class="img-fluid rounded d-block img-thumbnail" alt="img">
                    2. Pada card "Tabel Data PDRB", pilih wilayah dan pilih tahun data yang akan dihapus<br>
                    <img src="{{ asset('img/6.PNG') }}" class="img-fluid rounded d-block img-thumbnail" alt="img">
                    3. Data akan ditampilkan dengan view tabel<br>
                    <img src="{{ asset('img/7.PNG') }}" class="img-fluid rounded d-block img-thumbnail" alt="img">
                    4. Tekan Hapus Data jika ingin menghapus data tersebut<br>
                    <img src="{{ asset('img/8.PNG') }}" class="img-fluid rounded d-block img-thumbnail" alt="img">
                    5. Data berhasil terhapus<br>
                </div>
            </div>
        </div>
    </div>

@endsection


