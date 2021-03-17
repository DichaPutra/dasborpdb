@extends('layouts.app2')


@section('menu1')
<div id="collapseDashboard" class="collapse show" aria-labelledby="headingDashboard" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('KategoriSektor')}}">Kategori Sektor</a>
        <a class="collapse-item active" href="{{route('WilayahProvinsi')}}">Wilayah Provinsi</a>
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
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-lg-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Form View Pilih Wilayah -->
                    <div class="form-group col-lg-6">
                        <label>Pilih Wilayah Provinsi</label>
                        <select class="form-control">
                            <option>Indonesia</option>
                            <option>Aceh</option>
                            <option>Sumatera Utara</option>
                            <option>Sumatera Barat</option>
                            <option>Riau</option>
                            <option>Jambi</option>
                            <option>Sumatera Selatan</option>
                        </select>
                    </div>
                    <!-- Form View Pilih Tahun Analisis -->
                    <div class="form-group col-lg-3">
                        <label>Tahun Analisis</label>
                        <select class="form-control">
                            <option>2020</option>
                            <option>2019</option>
                            <option>2018</option>
                            <option>2017</option>
                            <option>2016</option>
                        </select>
                    </div>
                    <!-- Form View Pilih Tahun Dasar -->
                    <div class="form-group col-lg-3">
                        <label>Tahun Dasar</label>
                        <select class="form-control">
                            <option>2020</option>
                            <option>2019</option>
                            <option>2018</option>
                            <option>2017</option>
                            <option>2016</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Content Row -->
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7 mb-4">
        <div class="card shadow h-100">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Laju PDRB Provinsi</h6>
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
                <div class="chart-area h-100">
                    <canvas id="lajuPDRB"></canvas>
                </div>
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
                    <canvas id="sektorBasis"></canvas>
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
                    <div class="font-weight-bold text-success mb-2">Sektor Basis</div>
                    <div class="text-gray-800">Industri Pengolahan; Pengadaan Listrik dan Gas; Pengadaan Air, Pengelolaan Sampah, Limbah dan Daur Ulang</div>
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
                        <div class="h2 font-weight-bold text-gray-800">30,5</div>
                        <div class="text-primary">Industri Pengolahan</div>
                        <hr>
                        <div class="text-gray-800">Terendah</div>
                        <div class="h2 font-weight-bold text-gray-800">-2,3</div>
                        <div class="text-primary">Konstruksi</div>
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
                        <div class="text-success">Industri Pengolahan</div>
                        <hr>
                        <div class="text-gray-800">Terendah</div>
                        <div class="h2 font-weight-bold text-gray-800">8,8</div>
                        <div class="text-success">Konstruksi</div>
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
                        <div class="text-info">Industri Pengolahan</div>
                        <hr>
                        <div class="text-gray-800">Terendah</div>
                        <div class="h2 font-weight-bold text-gray-800">-1,3</div>
                        <div class="text-info">Konstruksi</div>
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
                        <div class="text-warning">Industri Pengolahan</div>
                        <hr>
                        <div class="text-gray-800">Terendah</div>
                        <div class="h2 font-weight-bold text-gray-800">-7,3</div>
                        <div class="text-warning">Konstruksi</div>
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
                    <canvas id="nationalShare2"></canvas>
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
                    <canvas id="proportionalShift2"></canvas>
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
                    <canvas id="differentialShift2"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Server Migration <span
                        class="float-right">20%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Sales Tracking <span
                        class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database <span
                        class="float-right">60%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%"
                         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details <span
                        class="float-right">80%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                         aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Account Setup <span
                        class="float-right">Complete!</span></h4>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                         aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <!-- Color System -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                        Primary
                        <div class="text-white-50 small">#4e73df</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        Success
                        <div class="text-white-50 small">#1cc88a</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        Info
                        <div class="text-white-50 small">#36b9cc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        Warning
                        <div class="text-white-50 small">#f6c23e</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        Danger
                        <div class="text-white-50 small">#e74a3b</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                        Secondary
                        <div class="text-white-50 small">#858796</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-light text-black shadow">
                    <div class="card-body">
                        Light
                        <div class="text-black-50 small">#f8f9fc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-dark text-white shadow">
                    <div class="card-body">
                        Dark
                        <div class="text-white-50 small">#5a5c69</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                         src="img/undraw_posting_photo.svg" alt="">
                </div>
                <p>Add some quality, svg illustrations to your project courtesy of <a
                        target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                    constantly updated collection of beautiful svg images that you can use
                    completely free and without attribution!</p>
                <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                    unDraw &rarr;</a>
            </div>
        </div>

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
            </div>
            <div class="card-body">
                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                    CSS bloat and poor page performance. Custom CSS classes are used to create
                    custom components and custom utility classes.</p>
                <p class="mb-0">Before working with this theme, you should become familiar with the
                    Bootstrap framework, especially the utility classes.</p>
            </div>
        </div>

    </div>
</div>


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
