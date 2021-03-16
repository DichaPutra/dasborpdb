@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- ===== FORM INPUT ===== -->
            <div class="card">
                <div class="card-header">Form Input Excel</div>

                <div class="card-body">
                    <form name="postexcel" method="POST" enctype="multipart/form-data" action="{{ route('importExcel') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-primary" type="button" >Submit</button>
                            </div>
                            <div class="custom-file">
                                <input name="import_file"type="file" accept=".xls,.xlsx,.csv" class="custom-file-input" aria-describedby="inputGroupFileAddon03">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                        @if (session('error'))
                        <div style="color: red;">{{Session::pull('error')}}</div>
                        @endif
                    </form>
                </div>
            </div><br>

            <!-- ===== DATA TABLE ===== -->
            <div class="card">
                <div class="card-header">
                    Data Table
                    <a href="{{route('emptyExcel')}}">
                        <button style="margin-left: 85%;"type="submit" class="btn btn-danger btn-sm" type="button" >Empty</button>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Komoditi</th>
                                <th scope="col">Output</th>
                                <th scope="col">Konsumsi Antara</th>
                                <th scope="col">Pajak kurang Subsidi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataimport as $dataimport)
                            <tr>
                                <th scope="row">{{$dataimport->komoditi}}</th>
                                <td>{{$dataimport->output}}</td>
                                <td>{{$dataimport->konsumsiantara}}</td>
                                <td>{{$dataimport->pajakkurangsubsidi}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><br>

            <!-- =====  ===== -->
            <div class="card">
                <div class="card-header">Data Visual</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div><br>
        </div>
    </div>
</div>
@endsection
