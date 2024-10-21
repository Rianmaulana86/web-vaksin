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
                        <h3>Pembayaran</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('kasir.store') }}" method="POST">
                        @csrf
                        <div class="row">

                        <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="travelagent" class="form-control-label">Cara Bayar</label>
                                        <select class="form-control" name="cara_bayar" required>
                                            <option value="">Pilih Pembayaran</option> 
                                                <option value="cash">Cash</option>
                                                <option value="transfer">Transfer</option>
                                        </select>
                                    </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                <button type="button" class="btn btn-primary custom-button"  type="submit" onclick="submitForm()">Bayar</button>
                                </div>
                            </div>                        
                        </div>
                   
                        <div class="row">
                        <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nama_pasien" class="form-control-label">No  . Registrasi</label>
                                    <input class="form-control" type="text" name="no_registrasi"  value="{{ $vaksinRegistrasi->no_reg  ?? 'Data tidak ada' }}" disabled>

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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jumlah_tagihan" class="form-control-label">Jumlah Tagihan (Rp.)</label>
                                    <input class="form-control" type="text" name="jumlah_tagihan" value="{{ $vaksinRegistrasi->vaksinpaket->harga ?? 'Data tidak ada' }}" disabled>
                                </div>
                            </div>
                            <!-- <div class="col-md-3">
                                <div class="form-group">
                                    <label for="no_passport" class="form-control-label">Diskon</label>
                                    <input class="form-control" type="text" name="diskon" >
                                </div>
                            </div>     -->
                            <!-- <div class="col-md-3">
                                <div class="form-group">
                                    <label for="no_passport" class="form-control-label">Total Tagihan</label>
                                    <input class="form-control" type="text" name="total_tagihan" disabled>
                                </div>
                            </div>     -->
                        </div>
                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@push('scripts')

<script>
    function submitForm() {
        // Lakukan proses yang diinginkan, seperti mengirim data
        // Misalnya, menggunakan fetch atau XMLHttpRequest
        //window.close();
      
    }
</script>
@endpush
