@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Input Excel</div>

                <div class="card-body">
                    <form name="postexcel" method="POST" enctype="multipart/form-data" action="{{ route('importExcel') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-outline-secondary" type="button" >Submit</button>
                            </div>
                            <div class="custom-file">
                                <input name="import_file"type="file" accept=".xls,.xlsx,.csv" class="custom-file-input" aria-describedby="inputGroupFileAddon03">
                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div><br>

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
