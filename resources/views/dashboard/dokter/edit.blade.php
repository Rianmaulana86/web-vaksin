@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h3>Edit Data Dokter</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('dokter/' . $dokter->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Method spoofing for PUT request -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_dokter" class="form-control-label">Nama Dokter/Asisten</label>
                                    <input class="form-control" type="text" name="nama_dokter" value="{{ $dokter->nama_dokter }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomor_izin_praktik" class="form-control-label">Nomor Izin Praktik</label>
                                    <input class="form-control" type="text" name="nomor_izin_praktik" value="{{ $dokter->nomor_izin_praktik }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kontak" class="form-control-label">No.Handphone</label>
                                    <input class="form-control" type="text" name="kontak" value="{{ $dokter->kontak }}" placeholder="Nomer Telepon/Wa Aktif">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat" class="form-control-label">Alamat</label>
                                    <input class="form-control" type="text" name="alamat" value="{{ $dokter->alamat }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="posisi" class="form-control-label">Posisi</label>
                                    <select class="form-control" name="posisi" required>
                                        <option value="Dokter" {{ $dokter->posisi == 'Dokter' ? 'selected' : '' }}>Dokter</option>
                                        <option value="Asisten" {{ $dokter->posisi == 'Asisten' ? 'selected' : '' }}>Asisten</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="form-control-label">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="aktif" {{ $dokter->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="non_aktif" {{ $dokter->status == 'non_aktif' ? 'selected' : '' }}>Non Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
