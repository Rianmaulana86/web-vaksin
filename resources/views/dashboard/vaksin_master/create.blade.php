@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h3>Tambah Data Vaksin</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('vaksinmaster') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_jenis_paket_vaksin" class="form-control-label">Nama Vaksin</label>
                                    <input class="form-control" type="text" name="nama_vaksin" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_vaksin" class="form-control-label">Distributor</label>
                                    <select class="form-control" id="id_distributor" name="id_distributor" required>
                                            <option value="">Pilih Distributor</option> 
                                            @foreach($distributor_pbfs as $t)
                                            <option value="{{ $t->id }}" >{{ $t->nama }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga" class="form-control-label">Jenis Vaksin</label>
                                    <input class="form-control" type="text" name="jenis_vaksin" required>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga" class="form-control-label">Manfaat</label>
                                    <input class="form-control" type="text" name="manfaat" required>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm ms-auto" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
