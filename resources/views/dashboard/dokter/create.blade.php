@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h3>Tambah Data Dokter</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('dokter') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_dokter" class="form-control-label">Nama Dokter</label>
                                    <input class="form-control" type="text" name="nama_dokter" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="spesialisasi" class="form-control-label">Spesialisasi</label>
                                    <input class="form-control" type="text" name="spesialisasi" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomor_izin_praktik" class="form-control-label">Nomor Izin Praktik</label>
                                    <input class="form-control" type="text" name="nomor_izin_praktik" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kontak" class="form-control-label">Kontak</label>
                                    <input class="form-control" type="text" name="kontak" placeholder="Telepon atau Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat" class="form-control-label">Alamat</label>
                                    <input class="form-control" type="text" name="alamat" required>
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
