@extends('layouts.app2')


@section('menu')
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDashboard"
       aria-expanded="true" aria-controls="collapseDashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
    <div id="collapseDashboard" class="collapse show" aria-labelledby="headingDashboard" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item active" href="{{route('KategoriSektorLP')}}">Kategori Sektor</a>
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

<!-- Nav Item - Tentang -->
<li class="nav-item">
    <a class="nav-link" href="panduan.php">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Tentang</span></a>
</li>
@endsection


@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Guest Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Pilihan Kategori Sektor -->
        <div class="col-lg-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <form method="GET" enctype="multipart/form-data" action="{{ route('viewSektorLP') }}">
                        @csrf
                        <div class="row align-items-center">
                            <!-- Form View Pilih Wilayah -->
                            <div class="form-group col-lg-6">
                                <label>Pilih Kategori Sektor</label>
                                <select name="sektor" class="form-control" onchange='this.form.submit()'>
                                    @foreach ($sektor as $sektor)
                                    <option value="{{$sektor->idSektor}}" @if($sektor->idSektor == $sekt) selected @endif>{{$sektor->nama_sektor}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Form View Pilih Tahun Analisis -->
                            <div class="form-group col-lg-3">
                                <label>Tahun Analisis</label>
                                <select name="tahuna" class="form-control" onchange='this.form.submit()'>
                                    @foreach ($tahun as $tahuna)
                                    <option value="{{$tahuna->tahun}}" @if($tahuna->tahun == $tha) selected @endif>{{$tahuna->tahun}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Form View Pilih Tahun Dasar -->
                            <div class="form-group col-lg-3">
                                <label>Tahun Dasar</label>
                                <select name="tahund" class="form-control" onchange='this.form.submit()'>
                                    @foreach ($tahun as $tahund)
                                    <option value="{{$tahund->tahun}}" @if($tahund->tahun == $thd) selected @endif>{{$tahund->tahun}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if (session('error'))
                            <div style="color: red;">{{Session::pull('error')}}</div>
                            @endif
                        </div>
                    </form>
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
                        <div class="text-gray-800">
                            @if($basis != NULL)
                            @foreach ($basis as $basis)
                            {{ $basis }};
                            @endforeach
                            @endif
                        </div>
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
                            <div class="font-weight-bold text-primary text-uppercase">Location Quotient</div>
                            @if($maxns and $minns != NULL)
                            <hr>
                            <div class="text-gray-800">Tertinggi</div>
                            <div class="h2 font-weight-bold text-gray-800">{{round($maxlq,4)}}</div>
                            <div class="text-primary">{{$smaxlq}}</div>
                            <hr>
                            <div class="text-gray-800">Terendah</div>
                            <div class="h2 font-weight-bold text-gray-800">{{round($minlq,4)}}</div>
                            <div class="text-primary">{{$sminlq}}</div>
                            @endif
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
                            @if($maxns and $minns != NULL)
                            <hr>
                            <div class="text-gray-800">Tertinggi</div>
                            <div class="h2 font-weight-bold text-gray-800">{{round($maxns,2)}}</div>
                            <div class="text-success">{{$smaxns}}</div>
                            <hr>
                            <div class="text-gray-800">Terendah</div>
                            <div class="h2 font-weight-bold text-gray-800">{{round($minns,2)}}</div>
                            <div class="text-success">{{$sminns}}</div>
                            @endif
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
                            @if($maxps and $minps != NULL)
                            <hr>
                            <div class="text-gray-800">Tertinggi</div>
                            <div class="h2 font-weight-bold text-gray-800">{{round($maxps,2)}}</div>
                            <div class="text-info">{{$smaxps}}</div>
                            <hr>
                            <div class="text-gray-800">Terendah</div>
                            <div class="h2 font-weight-bold text-gray-800">{{round($minps,2)}}</div>
                            <div class="text-info">{{$sminps}}</div>
                            @endif
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
                            @if($maxds and $minds != NULL)
                            <hr>
                            <div class="text-gray-800">Tertinggi</div>
                            <div class="h2 font-weight-bold text-gray-800">{{round($maxds,2)}}</div>
                            <div class="text-warning">{{$smaxds}}</div>
                            <hr>
                            <div class="text-gray-800">Terendah</div>
                            <div class="h2 font-weight-bold text-gray-800">{{round($minds,2)}}</div>
                            <div class="text-warning">{{$sminds}}</div>
                            @endif
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

        <!-- Sankey Diagram -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Sankey Diagram</h6>
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
                    <div id="sankeycon">
                    </div>
                </div>
            </div>
        </div>

        <!-- Sankey Diagram -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tree Map</h6>
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
                    <div id="treemap">
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

if ($jpie != NULL) {
    $map;
    foreach ($array_kode_iso as $key => $val) {
        $data = NULL;
        foreach ($jpie as $i) {
            if ($i->idWilayah == $val['code']) {
                $data = round($i->lq, 4);
            }
        }
        $map[] = ['hc-key' => strtolower($val['iso']), 'name' => $val['name'], 'value' => $data];
    }
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
            text: "TAHUN <?php echo $tha; ?>"
        },
        mapNavigation: {
            enabled: true
        },
        colorAxis: {
            minColor: '#FFFFFF',
            maxColor: '#0275d8'
        },
        series: [{
                data: <?php echo json_encode($map); ?>,
                mapData: Highcharts.maps['countries/id/id-all'],
                joinBy: 'hc-key',
                name: 'Location Quotient',
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

<!-- Pie Chart -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
    var ctx = document.getElementById("wilayahBasis");
    var wilayahBasis = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Basis", "Non-Basis"],
            datasets: [{
                    data: [<?php echo $cbasis; ?>, <?php echo $cnonbasis; ?>],
                    backgroundColor: ['#1cc88a', '#f0f1f5'],
                    hoverBackgroundColor: ['#17a673', '#dedfe3'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>

<!-- National Share -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

// Bar Chart Example
    var ctx = document.getElementById("nationalShare");
    var nationalShare = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($nswilayah); ?>,
            datasets: [{
                    label: "National Share",
                    backgroundColor: "#1cc88a",
                    hoverBackgroundColor: "#17a673",
                    borderColor: "#1cc88a",
                    data: <?php echo json_encode($nss); ?>,
                }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },

                        maxBarThickness: 25,
                    }],
                yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function (value, index, values) {
                                return '' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            },
        }
    });
</script>

<!-- Proportional Shift -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

// Bar Chart Example
    var ctx = document.getElementById("proportionalShift");
    var proportionalShift = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($pswilayah); ?>,
            datasets: [{
                    label: "Proportional Shift",
                    backgroundColor: "#36b9cc",
                    hoverBackgroundColor: "#2c9faf",
                    borderColor: "#36b9cc",
                    data: <?php echo json_encode($pss); ?>,
                }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },

                        maxBarThickness: 25,
                    }],
                yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function (value, index, values) {
                                return '' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            },
        }
    });
</script>

<!-- Differential Shift -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

// Bar Chart Example
    var ctx = document.getElementById("differentialShift");
    var differentialShift = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($dswilayah); ?>,
            datasets: [{
                    label: "Differential Shift",
                    backgroundColor: "#f6c23e",
                    hoverBackgroundColor: "#d1a638",
                    borderColor: "#f6c23e",
                    data: <?php echo json_encode($dss); ?>,
                }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },

                        maxBarThickness: 25,
                    }],
                yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function (value, index, values) {
                                return '' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            },
        }
    });
</script>

<!-- Sankey Diagram -->
<script>
    Highcharts.chart('sankeycon', {

        title: {
            text: ' '
        },
        accessibility: {
            point: {
                valueDescriptionFormat: '{index}. {point.from} to {point.to}, {point.weight}.'
            }
        },
        series: [{
                keys: ['from', 'to', 'weight'],
                data: <?php echo json_encode($sankeys); ?>,
                type: 'sankey',
                name: 'Sankey distribusi PDRB'
            }]

    });
</script>

<!-- Stream Graph -->
<script>
    var colors = Highcharts.getOptions().colors;
    Highcharts.chart('streamcon', {

        chart: {
            type: 'streamgraph',
            marginBottom: 30,
            zoomType: 'x'
        },

        // Make sure connected countries have similar colors
        colors: [
            colors[0],
            colors[1],
            colors[2],
            colors[3],
            colors[4],
            // East Germany, West Germany and Germany
            Highcharts.color(colors[5]).brighten(0.2).get(),
            Highcharts.color(colors[5]).brighten(0.1).get(),

            colors[5],
            colors[6],
            colors[7],
            colors[8],
            colors[9],
            colors[0],
            colors[1],
            colors[3],
            // Soviet Union, Russia
            Highcharts.color(colors[2]).brighten(-0.1).get(),
            Highcharts.color(colors[2]).brighten(-0.2).get(),
            Highcharts.color(colors[2]).brighten(-0.3).get()
        ],

        title: {
            floating: true,
            align: 'left',
            text: ' '
        },
        subtitle: {
            floating: true,
            align: 'left',
            y: 30,
            text: ' '
        },

        xAxis: {
            maxPadding: 0,
            type: 'category',
            crosshair: true,
            categories: <?php echo json_encode($streamc); ?>,
            labels: {
                align: 'left',
                reserveSpace: false,
                rotation: 270
            },
            lineWidth: 0,
            margin: 20,
            tickWidth: 0
        },

        yAxis: {
            visible: false,
            startOnTick: false,
            endOnTick: false
        },

        legend: {
            enabled: false
        },

        annotations: [{
                labels: [{
                        point: {
                            x: 5.5,
                            xAxis: 0,
                            y: 30,
                            yAxis: 0
                        },
                        text: 'Cancelled<br>during<br>World War II'
                    }, {
                        point: {
                            x: 18,
                            xAxis: 0,
                            y: 90,
                            yAxis: 0
                        },
                        text: 'Soviet Union fell,<br>Germany united'
                    }],
                labelOptions: {
                    backgroundColor: 'rgba(255,255,255,0.5)',
                    borderColor: 'silver'
                }
            }],

        plotOptions: {
            series: {
                label: {
                    minFontSize: 5,
                    maxFontSize: 15,
                    style: {
                        color: 'rgba(255,255,255,0.75)'
                    }
                }
            }
        },

        // Data parsed with olympic-medals.node.js
        series: <?php echo json_encode($streams); ?>,

        exporting: {
            sourceWidth: 800,
            sourceHeight: 600
        }

    });
</script>

<!-- Tree Map -->
<script>
Highcharts.chart('treemap', {
    series: [{
        type: "treemap",
        layoutAlgorithm: 'stripes',
        alternateStartingDirection: true,
        levels: [{
            level: 1,
            layoutAlgorithm: 'sliceAndDice',
            dataLabels: {
                enabled: true,
                align: 'left',
                verticalAlign: 'top',
                style: {
                    fontSize: '15px',
                    fontWeight: 'bold'
                }
            }
        }],
        data: <?php echo json_encode($treemaps); ?>
    }],
    title: {
        text: ' '
    }
});
</script>

@endsection

