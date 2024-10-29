@extends('layouts.master')
@section('content')
<style>
    .custom-button {
        padding: 20px 30px; /* Atur padding sesuai kebutuhan */
        font-size: 1.2em; /* Atur ukuran font */
    }
</style>

<div class="container-fluid py-4">
    <div class="row">   
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h3>Tindakan Suntik Vaksin</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('vaksin.updatesuntik', $vaksinRegistrasi->id) }}" method="POST">
                        <div class="row">
                        @csrf
                      
                            <div class="col-md-2">
                                <div class="form-group"> 
                                    <button class="btn btn-primary custom-button"  type="submit" onclick="">Tindakan Suntik</button>
                                </div>
                            </div>    
                            <div class="col-md-4">
                                <div class="form-group"> 
                                    <label for="nama_pasien" class="form-control-label">Vaksin</label>
                                    <input class="form-control" type="text" name="vaksin_wajib" value="{{ $vaksinRegistrasi->vaksinpaket->nama_jenis_paket_vaksin}}" readonly>
                                </div>
                            </div>     
                   
                        <div class="row">
                        <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nama_pasien" class="form-control-label">No.Registrasi</label>
                                    <input class="form-control" type="text" name="no_reg" value="{{ $vaksinRegistrasi->no_reg}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nama_pasien" class="form-control-label">Nama Pasien</label>
                                    <input class="form-control" type="text" name="nama_pasien" value="{{ $vaksinRegistrasi->pasien->nama_pasien ?? 'Data tidak ada' }}" disabled>
                                    <input class="form-control" type="text" name="id_pasien" value="{{ $vaksinRegistrasi->pasien->id_rm ?? 'Data tidak ada' }}" hidden >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="no_passport" class="form-control-label">No. Passport</label>
                                    <input class="form-control" type="text" name="no_passport" value="{{ $vaksinRegistrasi->pasien->no_passport ?? 'Data tidak ada' }}" disabled>
                                </div>
                            </div>      
                        </div>  
                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function closeTab() {
            window.close();
        }
</script>
@endsection
