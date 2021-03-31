@extends('layouts.app2')


@section('menu1')
<div id="collapseDashboard" class="collapse show" aria-labelledby="headingDashboard" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item active" href="{{route('KategoriSektor')}}">Kategori Sektor</a>
        <a class="collapse-item" href="{{route('WilayahProvinsi')}}">Wilayah Provinsi</a>
    </div>
</div>
@endsection


@section('menu2')
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('DataKomoditi')}}">Data Komoditi</a>
        <a class="collapse-item" href="{{route('DataPdb')}}">Data PDB</a>
    </div>
</div>
@endsection


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Pilihan Kategori Sektor -->
        <div class="col-lg-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <form method="GET" enctype="multipart/form-data" action="{{ route('viewSektor') }}">
                        @csrf
                        <div class="row align-items-center">
                            <!-- Form View Pilih Wilayah -->
                            <div class="form-group col-lg-6">
                                <label>Pilih Kategori Sektor</label>
                                <select name="sektor" class="form-control" onchange='this.form.submit()'>
                                    @foreach ($sektor as $sektor)
                                    <option value="{{$sektor->idSektor}}">{{$sektor->nama_sektor}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Form View Pilih Tahun Analisis -->
                            <div class="form-group col-lg-3">
                                <label>Tahun Analisis</label>
                                <select name="tahuna" class="form-control">
                                    {{ $last= date('2010') }}
                                    {{ $now = date('Y') }}

                                    @for ($i = $now; $i >= $last; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <!-- Form View Pilih Tahun Dasar -->
                            <div class="form-group col-lg-3">
                                <label>Tahun Dasar</label>
                                <select name="tahund" class="form-control">
                                    @for ($i = $now; $i >= $last; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Map Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Geografis</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="grafik" style="width:100%; height:30rem;"></div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card shadow h-100">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Basis vs Non-Basis</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-2 pb-2">
                        <canvas id="wilayahBasis"></canvas>
                    </div>
                    <div class="mt-2 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Basis
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-secondary"></i> Non-Basis
                        </span>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="font-weight-bold text-success mb-2">Wilayah Basis</div>
                        <div class="text-gray-800">Jawa Timur, Jawa Tengah, Jawa Barat, Aceh, Bali, Banten, Papua, Riau, Kalimantan Tengah</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Laju Pertumbuhan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col text-center">
                            <div class="font-weight-bold text-primary text-uppercase">Laju Pertumbuhan</div>
                            <hr>
                            <div class="text-gray-800">Tertinggi</div>
                            <div class="h2 font-weight-bold text-gray-800">30</div>
                            <div class="text-primary">Jawa Timur</div>
                            <hr>
                            <div class="text-gray-800">Terendah</div>
                            <div class="h2 font-weight-bold text-gray-800">-2,3</div>
                            <div class="text-primary">Nusa Tenggara Timur</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- National Share -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col text-center">
                            <div class="font-weight-bold text-success text-uppercase">National Share</div>
                            <hr>
                            <div class="text-gray-800">Tertinggi</div>
                            <div class="h2 font-weight-bold text-gray-800">20,5</div>
                            <div class="text-success">Jawa Tengah</div>
                            <hr>
                            <div class="text-gray-800">Terendah</div>
                            <div class="h2 font-weight-bold text-gray-800">8,8</div>
                            <div class="text-success">Kalimantan Selatan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Proportional Share -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col text-center">
                            <div class="font-weight-bold text-info text-uppercase">Proportional Shift</div>
                            <hr>
                            <div class="text-gray-800">Tertinggi</div>
                            <div class="h2 font-weight-bold text-gray-800">8,5</div>
                            <div class="text-info">Papua</div>
                            <hr>
                            <div class="text-gray-800">Terendah</div>
                            <div class="h2 font-weight-bold text-gray-800">-1,3</div>
                            <div class="text-info">Sumatera Barat</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Differential Share -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col text-center">
                            <div class="font-weight-bold text-warning text-uppercase">Differential Shift</div>
                            <hr>
                            <div class="text-gray-800">Tertinggi</div>
                            <div class="h2 font-weight-bold text-gray-800">15,5</div>
                            <div class="text-warning">Jawa Barat</div>
                            <hr>
                            <div class="text-gray-800">Terendah</div>
                            <div class="h2 font-weight-bold text-gray-800">-7,3</div>
                            <div class="text-warning">Nusa Tenggara Barat</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">                            
            <!-- Grafik National Share -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">National Share</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="nationalShare"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafik Proportional Shift -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Proportional Shift</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="proportionalShift"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafik Differential Shift -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Differential Shift</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="differentialShift"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Basis vs Non-Basis</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Laju PDB Nasional</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
$array_kode_iso = array(
    array('iso' => 'ID-AC', 'name' => 'Aceh', 'code' => 11),
    array('iso' => 'ID-SU', 'name' => 'Sumatera Utara', 'code' => 12),
    array('iso' => 'ID-SB', 'name' => 'Sumatera Barat', 'code' => 13),
    array('iso' => 'ID-RI', 'name' => 'Riau', 'code' => 14),
    array('iso' => 'ID-JA', 'name' => 'Jambi', 'code' => 15),
    array('iso' => 'ID-SL', 'name' => 'Sumatera Selatan', 'code' => 16),
    array('iso' => 'ID-BE', 'name' => 'Bengkulu', 'code' => 17),
    array('iso' => 'ID-1024', 'name' => 'Lampung', 'code' => 18),
    array('iso' => 'ID-BB', 'name' => 'Kepulauan Bangka Belitung', 'code' => 19),
    array('iso' => 'ID-KR', 'name' => 'Kepulauan Riau', 'code' => 21),
    array('iso' => 'ID-JK', 'name' => 'Daerah Khusus Ibukota Jakarta', 'code' => 31),
    array('iso' => 'ID-JR', 'name' => 'Jawa Barat', 'code' => 32),
    array('iso' => 'ID-JT', 'name' => 'Jawa Tengah', 'code' => 33),
    array('iso' => 'ID-YO', 'name' => 'Daerah Istimewa Yogyakarta', 'code' => 34),
    array('iso' => 'ID-JI', 'name' => 'Jawa Timur', 'code' => 35),
    array('iso' => 'ID-BT', 'name' => 'Banten', 'code' => 36),
    array('iso' => 'ID-BA', 'name' => 'Bali', 'code' => 51),
    array('iso' => 'ID-NB', 'name' => 'Nusa Tenggara Barat', 'code' => 52),
    array('iso' => 'ID-NT', 'name' => 'Nusa Tenggara Timur', 'code' => 53),
    array('iso' => 'ID-KB', 'name' => 'Kalimantan Barat', 'code' => 61),
    array('iso' => 'ID-KT', 'name' => 'Kalimantan Tengah', 'code' => 62),
    array('iso' => 'ID-KS', 'name' => 'Kalimantan Selatan', 'code' => 63),
    array('iso' => 'ID-KI', 'name' => 'Kalimantan Timur', 'code' => 64),
    array('iso' => 'ID-KU', 'name' => 'Kalimantan Utara', 'code' => 65),
    array('iso' => 'ID-SW', 'name' => 'Sulawesi Utara', 'code' => 71),
    array('iso' => 'ID-ST', 'name' => 'Sulawesi Tengah', 'code' => 72),
    array('iso' => 'ID-SE', 'name' => 'Sulawesi Selatan', 'code' => 73),
    array('iso' => 'ID-SG', 'name' => 'Sulawesi Tenggara', 'code' => 74),
    array('iso' => 'ID-GO', 'name' => 'Gorontalo', 'code' => 75),
    array('iso' => 'ID-SR', 'name' => 'Sulawesi Barat', 'code' => 76),
    array('iso' => 'ID-MA', 'name' => 'Maluku', 'code' => 81),
    array('iso' => 'ID-LA', 'name' => 'Maluku Utara', 'code' => 82),
    array('iso' => 'ID-IB', 'name' => 'Papua Barat', 'code' => 91),
    array('iso' => 'ID-PA', 'name' => 'Papua', 'code' => 94)
);

$array_datas = array();
foreach ($array_kode_iso as $key => $val)
{
    array_push($array_datas, array('hc-key' => strtolower($val['iso']), 'name' => $val['name'], 'value' => rand(1, 100)));
}
?>
@endsection

@section('script')
<script type="text/javascript">
    $('.grafik').highcharts('Map', {
        credits: {
            enabled: false
        },
        title: {
            text: 'LOCATION QUOTIENT'
        },
        subtitle: {
            text: 'TAHUN 2019'
        },
        mapNavigation: {
            enabled: true,
        },
        colorAxis: {
            minColor: '#FFFFFF',
            maxColor: '#0275d8'
        },
        series: [{
                data: <?php echo json_encode($array_datas); ?>,
                mapData: Highcharts.maps['countries/id/id-all'],
                joinBy: 'hc-key',
                name: 'Value',
                animation: true,
                states: {
                    hover: {
                        color: '#4679BD'
                    }
                },
                dataLabels: {
                    format: '{point.name}'
                }
            }]
    });
</script>
@endsection

