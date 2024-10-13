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
                    <form action="{{ url('vaksin') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_vaksin" class="form-control-label">Nama Vaksin</label>
                                    <input class="form-control" type="text" name="nama_vaksin" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_vaksin" class="form-control-label">Jenis Vaksin</label>
                                    <input class="form-control" type="text" name="jenis_vaksin" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="produsen" class="form-control-label">Produsen</label>
                                    <input class="form-control" type="text" name="produsen" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_expired" class="form-control-label">Tanggal Kadaluarsa</label>
                                    <input class="form-control" type="date" name="tgl_expired">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="manfaat" class="form-control-label">Manfaat</label>
                                    <textarea class="form-control" name="manfaat" rows="3" placeholder="Manfaat vaksin"></textarea>
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
