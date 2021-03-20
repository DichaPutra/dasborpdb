@extends('layouts.app2')


@section('menu1')
<div id="collapseDashboard" class="collapse" aria-labelledby="headingDashboard" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('KategoriSektor')}}">Kategori Sektor</a>
        <a class="collapse-item" href="{{route('WilayahProvinsi')}}">Wilayah Provinsi</a>
    </div>
</div>
@endsection


@section('menu2')
<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('DataKomoditi')}}">Data Komoditi</a>
        <a class="collapse-item active" href="{{route('DataPdb')}}">Data PDB</a>
    </div>
</div>
@endsection

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data PDRB</h1>
<p class="mb-4">Data PDRB yang dipakai adalah data PDRB atas dasar harga konstan menurut lapangan usaha (Milyar Rupiah). Data bisa di 
    dapat dari website BPS tiap wilayah. Sebelum melakukan melakukan input file excel, data harap 
    diolah terlebih dahulu ke dalam format tabel yang telah ditentukan.</p>


<!-- Export Excel Data Format -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Generate Format Data Excel</h6>
    </div>
    <div class="card-body">
        <form name="postexcel" method="POST" enctype="multipart/form-data" action="{{ route('GenerateFormat') }}">
            @csrf
            <div class="form-group">
                <label>Pilih Wilayah</label>
                <select name="wilayah" class="form-control" style="width: 100%;">
                    @foreach ($wilayah as $wilayah)
                    <option value="{{$wilayah->idWilayah}}">{{$wilayah->nama_wilayah}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Form Pilih Tahun -->
            <div class="form-group">
                <label>Tahun</label>
                <select name="tahun[]" id="choices-multiple-remove-button" placeholder="Pilih max hingga 5" multiple>
                    {{ $last= date('Y')-11 }}
                    {{ $now = date('Y') }}

                    @for ($i = $now; $i >= $last; $i--)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select> 
            </div>

            <div class="form-group pt-3 float-right">
                <input type="submit" href="{{route('GenerateFormat')}}" class="btn btn-primary" value="Generate Format">
            </div>
        </form>
    </div>
</div>

<!-- Input Data PDRB -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input Data PDRB</h6>
    </div>
    <div class="card-body">

        <!-- Form Pilih Wilayah -->
        <form name="inputdata" method="POST" enctype="multipart/form-data" action="{{ route('ImportData') }}">
            @csrf
            <!-- Form Pilih Excel -->
            <div class="form-group">
                <label for="exampleInputFile">Pilih file excel</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input accept=".xls,.xlsx,.csv" name="import_file"type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
                @if (session('error'))
                <div style="color: red;">{{Session::pull('error')}}</div>
                @endif
            </div>

            <!-- Button -->
            <div class="form-group pt-3 float-right">
                <input type="submit" href="#" class="btn btn-primary" value="Tambah">
                <!--                            <a href="#" class="btn btn-info">
                                                <span class="text">Perbarui</span>
                                            </a>                           
                                <a href="{{asset('formatexcel/formatinput.xlsx')}}" class="btn btn-secondary">
                                    <span class="text">Generate Format</span>
                                </a>-->
            </div>
        </form>
    </div>
</div>

<!-- Tabel Data PDRB -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data PDRB</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Form View Pilih Wilayah -->
            <div class="form-group col-lg-6">
                <label>Pilih Wilayah</label>
                <select class="form-control">
                    @foreach ($wilayah2 as $wilayah2)
                    <option value="{{$wilayah2->idWilayah}}">{{$wilayah2->nama_wilayah}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Form View Pilih Tahun -->
            <div class="form-group col-lg-3">
                <label>Tahun</label>
                <select class="form-control">
                    {{ $last= date('Y')-11 }}
                    {{ $now = date('Y') }}

                    @for ($i = $now; $i >= $last; $i--)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <!-- Button Hapus Data -->
            <div class="form-group col-lg-3 text-right mt-auto">
                <a href="#" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus Data</span>
                </a>
            </div>
        </div>
        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Wilayah</th>
                        <th>Sektor</th>
                        <th>Tahun</th>
                        <th>PDRB</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pdrb as $pdrb)
                    <tr>
                        <td>{{$pdrb->nama_wilayah}}</td>
                        <td>{{$pdrb->nama_sektor}}</td>
                        <td>{{$pdrb->tahun}}</td>
                        <td>{{$pdrb->pdrb}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
    $(document).ready(function () {

        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount: 5,
            searchResultLimit: 5,
            renderChoiceLimit: 5
        });
    });
</script>
@endsection
