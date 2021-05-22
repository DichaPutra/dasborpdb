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
            <a class="collapse-item" href="{{route('KategoriSektorLP')}}">Kategori Sektor</a>
            <a class="collapse-item active" href="{{route('WilayahProvinsiLP')}}">Wilayah Provinsi</a>
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

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-lg-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <form method="GET" enctype="multipart/form-data" action="{{ route('viewProvinsiLP') }}">
                    @csrf
                    <div class="row align-items-center">
                        <!-- Form View Pilih Wilayah -->
                        <div class="form-group col-lg-6">
                            <label>Pilih Wilayah Provinsi</label>
                            <select name="wilayah" class="form-control" onchange='this.form.submit()'>
                                @foreach ($wilayah as $wilayah)
                                <option value="{{$wilayah->idWilayah}}" @if($wilayah->idWilayah == $wil) selected @endif>{{$wilayah->nama_wilayah}}</option>
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
                    <div class="text-gray-800">
                        @if($basis != NULL)
                            @foreach ($basis as $basis)
                            <div class="btn-light btn-sm">
                                 {{ $basis }}
                            </div>                              
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

<!-- Line Chart -->
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
    toFixedFix = function(n, prec) {
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

// Area Chart Example
var ctx = document.getElementById("lajuPDRB");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?php echo json_encode($tahunlc); ?>,
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      fill: false,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?php echo json_encode($datalc); ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 10
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
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
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
</script>

<!-- Pie Chart -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("sektorBasis");
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
    toFixedFix = function(n, prec) {
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
          callback: function(value, index, values) {
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
        label: function(tooltipItem, chart) {
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
    toFixedFix = function(n, prec) {
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
          callback: function(value, index, values) {
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
        label: function(tooltipItem, chart) {
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
    toFixedFix = function(n, prec) {
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
          callback: function(value, index, values) {
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
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});
</script>

@endsection
