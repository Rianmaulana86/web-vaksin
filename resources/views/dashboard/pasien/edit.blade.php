@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h3>Edit Data Pasien</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('pasien/' . $pasien->id_rm) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_pasien" class="form-control-label">No. RM</label>
                                    <input class="form-control" type="text" name="nama_pasien" value="{{ $pasien->no_rm }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_pasien" class="form-control-label">Nama Pasien</label>
                                    <input class="form-control" type="text" name="nama_pasien" value="{{ $pasien->nama_pasien }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_passport" class="form-control-label">No Passport</label>
                                    <input class="form-control" type="text" name="no_passport" value="{{ $pasien->no_passport }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                                    <input class="form-control" type="text" name="tempat_lahir" value="{{ $pasien->tempat_lahir }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
                                    <input class="form-control" type="date" name="tgl_lahir" value="{{ $pasien->tgl_lahir }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kelamin" class="form-control-label">Kelamin</label>
                                    <select class="form-control" name="kelamin" required>
                                        <option value="Laki-laki" {{ $pasien->kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ $pasien->kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                                    <input class="form-control" type="text" name="pekerjaan" value="{{ $pasien->pekerjaan }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat" class="form-control-label">Alamat</label>
                                    <input class="form-control" type="text" name="alamat" value="{{ $pasien->alamat }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telp" class="form-control-label">Telepon</label>
                                    <input class="form-control" type="text" name="telp" value="{{ $pasien->telp }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="warga_negara" class="form-control-label">Warga Negara</label>
                                    <input class="form-control" type="text" name="warga_negara" value="{{ $pasien->warga_negara }}" readonly>
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
