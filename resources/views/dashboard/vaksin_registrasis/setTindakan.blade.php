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
                        <h3>Set Tindakan</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                <button type="button" class="btn btn-primary custom-button"  type="submit" onclick="submitForm()">Tindakan Selesai</button>
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
                           
                          
                        </div>
                   
                     
                        <div class="row">
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="jenisvaksinasi" class="form-control-label">Jenis Vaksinasi</label>
                                                    <select class="form-control" id='jenis_vaksinasi' name="jenis_vaksinasi" required>
                                                        <option value="">Pilih Vaksin</option> 
                                                            @foreach($vaksin as $vaksin)
                                                                <option value="{{ $vaksin->id }}">{{ $vaksin->nama_jenis_paket_vaksin }}</option>
                                                            @endforeach
                                                    </select>
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="vaksin_wajib" class="form-control-label">Vaksin Wajib</label>
                                        <input class="form-control" type="text" name="vaksin_wajib" id="vaksin_wajib" disabled>
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="vaksin_tambahan" class="form-control-label">Vaksin Tambahan</label>
                                        <input class="form-control" type="text" name="vaksin_tambahan" id="vaksin_tambahan" disabled>
                                    </div>
                            </div>
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="telp" class="form-control-label">WUS/Non-WUS</label>
                                        <input class="form-control" type="text" name="status" required>
                                    </div>
                            </div>
                            <div class="col-md-2">
                                    <label for="tgl_lahir" class="form-control-label">Status</label>
                                    <input class="form-control" type="text" name="statuspp" disabled>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="kelamin" class="form-control-label">PP Test</label>
                                    <input class="form-control" type="text" name="kelamin" disabled>
                                </div>
                            </div>

                         
                        </div>
                        <div class="row">
                        <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="travelagent" class="form-control-label">Nama Travel / Agen</label>
                                        <select class="form-control" id="travel" name="travel" required>
                                            <option value="">Pilih Travel</option> 
                                            @foreach($travel as $t)
                                                <option value="{{ $t->id }}" data-alamat="{{ $t->alamat }}" data-kontak="{{ $t->no_telp }}">{{ $t->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="alamattravel" class="form-control-label">Alamat Travel</label>
                                        <input class="form-control" type="text" id="alamattravel" name="alamattravel" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="notelptravel" class="form-control-label">No.Telp</label>
                                        <input class="form-control" type="text" id="kontaktravel" name="kontaktravel" disabled>
                                    </div>
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
