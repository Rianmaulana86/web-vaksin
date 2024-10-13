@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h3>Tambah Data Travel</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('travel') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_travel" class="form-control-label">Nama Travel</label>
                                    <input class="form-control" type="text" name="nama_travel" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat_travel" class="form-control-label">Alamat Travel</label>
                                    <input class="form-control" type="text" name="alamat_travel" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kontak_travel" class="form-control-label">Kontak Travel</label>
                                    <input class="form-control" type="text" name="kontak_travel" placeholder="Telepon atau Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website_travel" class="form-control-label">Website Travel</label>
                                    <input class="form-control" type="text" name="website_travel" placeholder="https://example.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_travel" class="form-control-label">Jenis Travel</label>
                                    <input class="form-control" type="text" name="jenis_travel" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_berangkat" class="form-control-label">Tanggal Berangkat</label>
                                    <input class="form-control" type="date" name="tgl_berangkat">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="negara_tujuan" class="form-control-label">Negara Tujuan</label>
                                    <input class="form-control" type="text" name="negara_tujuan" required>
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
