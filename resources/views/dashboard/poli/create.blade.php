@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h3>Tambah Data Poli</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('poli') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_poli" class="form-control-label">Nama Poli</label>
                                    <input class="form-control" type="text" name="nama_poli" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi" class="form-control-label">Lokasi</label>
                                    <input class="form-control" type="text" name="lokasi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomor_telepon" class="form-control-label">Nomor Telepon</label>
                                    <input class="form-control" type="text" name="nomor_telepon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="form-control-label">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="aktif">Aktif</option>
                                        <option value="non_aktif">Non Aktif</option>
                                    </select>
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
