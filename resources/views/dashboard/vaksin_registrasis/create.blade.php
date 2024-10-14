@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h3>Tambah Pendaftaran Vaksinasi</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('vaksin_registrasis') }}" method="POST">
                        @csrf
                
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="no_reg" class="form-control-label">No. Registrasi</label>
                                    <input class="form-control" type="text" name="no_reg">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="tempat_lahir" class="form-control-label">Nama Pasien</label>
                                    <input class="form-control" type="text" name="tempat_lahir" required>
                                </div>
                            </div>
                           
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                                    <input class="form-control" type="text" name="tempat_lahir" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
                                    <input class="form-control" type="date" name="tgl_lahir">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="kelamin" class="form-control-label">Jenis Kelamin</label>
                                    <select class="form-control" name="kelamin" required>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="no_passport" class="form-control-label">No. Passport</label>
                                    <input class="form-control" type="text" name="no_passport" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                                    <input class="form-control" type="text" name="pekerjaan" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="alamat" class="form-control-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="2" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="telp" class="form-control-label">No.Telp/Whatsapp</label>
                                    <input class="form-control" type="text" name="telp" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="warga_negara" class="form-control-label">Warga Negara</label>
                                    <input class="form-control" type="text" name="warga_negara" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-md-2">
                                            <div class="form-group">
                                                    <label for="dokter" class="form-control-label">Dokter</label>
                                                    <select class="form-control" name="dokter" required>
                                                        <option value="">Pilih Dokter</option>
                                                        @foreach($dokters as $dokter)
                                                            <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="asisten" class="form-control-label">Asisten</label>
                                                    <select class="form-control" name="asisten" required>
                                                        <option value="">Pilih Asisten</option>
                                                        @foreach($asistens as $asisten)
                                                            <option value="{{ $asisten->id }}">{{ $asisten->nama_dokter }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                            </div>
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="telp" class="form-control-label">Negara Tujuan</label>
                                        <input class="form-control" type="text" name="telp" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="warga_negara" class="form-control-label">Tanggal Berangkat</label>
                                        <input class="form-control" type="text" name="warga_negara" required>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="telp" class="form-control-label">Jenis Vaksinasi</label>
                                        <input class="form-control" type="text" name="telp" required>
                                    </div>
                            </div>
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="warga_negara" class="form-control-label">Vaksin Wajib</label>
                                        <input class="form-control" type="text" name="warga_negara" required>
                                    </div>
                            </div>
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="warga_negara" class="form-control-label">Vaksin Tambahan</label>
                                        <input class="form-control" type="text" name="warga_negara" required>
                                    </div>
                            </div>
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="telp" class="form-control-label">Wanita Usia Subur(Usia 15-49 Tahun)</label>
                                        <input class="form-control" type="text" name="telp" required>
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telp" class="form-control-label">Nama Travel / Agen</label>
                                        <input class="form-control" type="text" name="telp" required>
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="warga_negara" class="form-control-label">Alamat Travel</label>
                                        <input class="form-control" type="text" name="warga_negara" required>
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="warga_negara" class="form-control-label">No.Telp</label>
                                        <input class="form-control" type="text" name="warga_negara" required>
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
