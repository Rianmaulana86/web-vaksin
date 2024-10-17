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
                    <form action="" method="POST">
                        @csrf
                
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                <button type="button" class="btn btn-primary custom-button"  type="submit" onclick="submitForm()">Bayar</button>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="nama_pasien" class="form-control-label">Nama Pasien</label>
                                    <input class="form-control" type="text" name="nama_pasien" disabled>
                                    <input class="form-control" type="text" name="id_pasien" hidden>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="no_passport" class="form-control-label">No. Passport</label>
                                    <input class="form-control" type="text" name="no_passport" disabled>
                                </div>
                            </div>    
                        </div>
                   
                     
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="nama_pasien" class="form-control-label">Jumlah Tagihan</label>
                                    <input class="form-control" type="text" name="nama_pasien" disabled>
                                    <input class="form-control" type="text" name="id_pasien" hidden>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="no_passport" class="form-control-label">Diskon</label>
                                    <input class="form-control" type="text" name="no_passport" disabled>
                                </div>
                            </div>    
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="no_passport" class="form-control-label">Total Tagihan</label>
                                    <input class="form-control" type="text" name="no_passport" disabled>
                                </div>
                            </div>    
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="travelagent" class="form-control-label">Cara Bayar</label>
                                        <select class="form-control" id="travel" name="travel" required>
                                            <option value="">Pilih Pembayaran</option> 
                                                <option value="cash">Cash</option>
                                                <option value="transfer">Transfer</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                     
                               
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cari Pasien -->
<div class="modal fade" id="cariPasienModal" name="cariPasienModal" tabindex="-1" role="dialog" aria-labelledby="cariPasienModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cariPasienModalLabel">Cari Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="searchPatientForm">
                    <div class="form-group">
                        <label for="search_input">Nama atau No. Passport</label>
                        <input type="text" class="form-control" id="search_input" placeholder="Masukkan Nama atau No. Passport">
                    </div>
                    <button type="button" class="btn btn-primary" id="search_button">Cari</button>
                </form>
                <div id="search_results" class="mt-3"></div>
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

        // Contoh menggunakan fetch untuk mengirim form
        fetch('{{ url('vaksin_registrasis') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Jangan lupa tambahkan token CSRF
            },
            body: JSON.stringify({
                // Tambahkan data yang ingin dikirim
                // 'nama_pasien': document.querySelector('input[name="nama_pasien"]').value,
                // 'id_pasien': document.querySelector('input[name="id_pasien"]').value,
                // dan seterusnya...
            })
        })
        .then(response => {
            window.close();
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endpush
