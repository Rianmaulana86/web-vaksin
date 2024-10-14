@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h3>Tambah Data Registrasi</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('registrasi.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_reg" class="form-control-label">No Registrasi</label>
                                    <input class="form-control" type="text" name="no_reg" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rm_pasien" class="form-control-label">Rekam Medis Pasien</label>
                                    <input class="form-control" type="number" name="rm_pasien" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dokter" class="form-control-label">Dokter</label>
                                    <input class="form-control" type="text" name="dokter" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="assisten" class="form-control-label">Asisten</label>
                                    <input class="form-control" type="text" name="assisten">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_berangkat" class="form-control-label">Tanggal Berangkat</label>
                                    <input class="form-control" type="date" name="tgl_berangkat" required>
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
                                    <label for="jenis_vaksinasi" class="form-control-label">Jenis Vaksinasi</label>
                                    <input class="form-control" type="text" name="jenis_vaksinasi" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="form-control-label">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="wus">WUS</option>
                                        <option value="non wus">Non WUS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vaksin_wajib" class="form-control-label">Vaksin Wajib</label>
                                    <input class="form-control" type="text" name="vaksin_wajib" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vaksin_tambahan" class="form-control-label">Vaksin Tambahan</label>
                                    <input class="form-control" type="text" name="vaksin_tambahan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_travel" class="form-control-label">Nama Travel</label>
                                    <input class="form-control" type="text" name="nama_travel">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat_travel" class="form-control-label">Alamat Travel</label>
                                    <input class="form-control" type="text" name="alamat_travel">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tindakan" class="form-control-label">Tindakan</label>
                                    <select class="form-control" name="tindakan">
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apotek_status" class="form-control-label">Apotek Status</label>
                                    <select class="form-control" name="apotek_status">
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kasir_status" class="form-control-label">Kasir Status</label>
                                    <select class="form-control" name="kasir_status">
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="buku_icv" class="form-control-label">Buku ICV</label>
                                    <select class="form-control" name="buku_icv">
                                        <option value="sudah">Sudah</option>
                                        <option value="belum">Belum</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pp_test" class="form-control-label">PP Test</label>
                                    <select class="form-control" name="pp_test">
                                        <option value="iya">Iya</option>
                                        <option value="tidak">Tidak</option>
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
