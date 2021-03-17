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
Data Komoditi page
@endsection


@section('script')
@endsection
