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

@if (Auth::id()!= NULL)
<!-- Nav Item - Panduan -->
<li class="nav-item">
    <a class="nav-link" href="{{route('panduan')}}">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Panduan</span></a>
</li>
@endif

<!-- Nav Item - Tentang -->
<li class="nav-item active">
    <a class="nav-link" href="{{route('tentang')}}">
        <i class="fas fa-fw fa-info-circle"></i>
        <span>Tentang</span></a>
</li>
@endsection


@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tentang</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Pilihan Kategori Sektor -->
        <div class="col-lg-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="container">
                        <h4 class="text-center"><b>DASBOR VISUALISASI DATA</b></h4>
                        <p class="text-center">PDRB Analisis Shift Share dan Location Quotient</p><br>


                        <p class="text-justify">Aplikasi Dasbor Visualisasi Data PDRB dengan Analisis Shift Share dan Location Quotient merupakan aplikasi berbasis web yang dibangun sebagai bagian dari penelitian
                        skripsi oleh Chafri Fajar Erwandra dengan dosen pembimbing Farid Ridho, S.S.T., M.T. di Politeknik Statistika STIS. 
                        Data yang digunakan pada aplikasi ini bersumber dari situs Badan Pusat Statistik tiap Provinsi.
                        Situs ini bertujuan untuk mempermudah pengguna dalam melakukan analisis terhadap data PDRB dengan analisis Shift Share dan Location Quotient. </p><br>
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-body">
                                <h6 class="text-center"><b>Shift Share</b></h6>
                                <p class="text-justify">
                                    Analisis Shift Share digunakan untuk mengetahui tingkat perkembangan ekonomi dan kecenderungan transformasi struktur perekonomian suatu daerah. Jika shift share-nya paling tinggi, maka dapat dikatakan bahwa lapangan usaha tersebut paling unggul. 
                                </p>
                                <div class="col-xl-6 col-lg-8 col-md-5 col-sm-6 mx-auto">
                                <img src="{{ asset('img/SS.PNG') }}" class="img-fluid rounded d-block" alt="Dij=Nij+Mij+Cij">
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-body">
                                <h6 class="text-center"><b>Location Quotient</b></h6>
                                <p class="text-justify">
                                    Analisis Location Quotient digunakan untuk menentukan kapasitas ekspor perekonomian suatu daerah dan derajat kemandirian suatu lapangan usaha. Jika LQ > 1, maka sektornya merupakan sektor basis. Jika LQ ≤ 1, maka sektornya merupakan sektor non basis.
                                </p>
                                <div class="col-xl-6 col-lg-8 col-md-5 col-sm-6 mx-auto">
                                <img src="{{ asset('img/LQ.PNG') }}" class="img-fluid rounded d-block" alt="LQ=(vi/vt)/(Vi/Vt)">
                                </div>
                                </div>
                            </div>
                            </div>
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


