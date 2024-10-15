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
                        <h3>Tambah Pendaftaran Vaksinasi</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('vaksin_registrasis') }}" method="POST">
                        @csrf
                
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                <button type="button" class="btn btn-primary custom-button" data-toggle="modal" data-target="#cariPasienModal">Cari Pasien</button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="nama_pasien" class="form-control-label">Nama Pasien</label>
                                    <input class="form-control" type="text" name="nama_pasien" disabled>
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
                                    <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                                    <input class="form-control" type="text" name="tempat_lahir" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
                                    <input class="form-control" type="date" name="tgl_lahir" disabled>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="kelamin" class="form-control-label">Jenis Kelamin</label>
                                    <input class="form-control" type="text" name="kelamin" disabled>
                                </div>
                            </div>
                            <!-- <div class="col-md-2">
                                <div class="form-group">
                                    <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                                    <input class="form-control" type="text" name="pekerjaan" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">  
                                <div class="form-group">
                                    <label for="alamat" class="form-control-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="2" disabled></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="telp" class="form-control-label">No.Telp/Whatsapp</label>
                                    <input class="form-control" type="text" name="telp" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="warga_negara" class="form-control-label">Warga Negara</label>
                                    <input class="form-control" type="text" name="warga_negara" disabled>
                                </div>
                            </div> -->
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
                                        <label for="negaratujuan" class="form-control-label">Negara Tujuan</label>
                                                    <select class="form-control" name="negaratujuan" required>
                                                        <option value="">Pilih Negara Tujuan</option>
                                                        @foreach($country as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                    </div>
                                </div>
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="tanggal_berangkat" class="form-control-label">Tanggal Berangkat</label>
                                        <input class="form-control" type="date" name="tanggal_berangkat" required>
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
        document.getElementById('search_button').addEventListener('click', function() {
            const query = document.getElementById('search_input').value;
            fetch(`/api/pasiens?search=${query}`)
                .then(response => response.json())
                .then(data => {
                    let resultsHtml = '<ul class="list-group">';
                    data.forEach(patient => {
                        resultsHtml += `
                            <li class="list-group-item">
                                ${patient.nama_pasien} - ${patient.no_passport}
                                <button class="btn btn-primary btn-sm float-end" 
                                onclick="selectPatient('${patient.id_rm}', 
                                                        '${patient.nama_pasien}',
                                                        '${patient.no_passport}',
                                                        '${patient.tempat_lahir}',
                                                        '${patient.tgl_lahir}',
                                                        '${patient.kelamin}',
                                                        '${patient.pekerjaan}',
                                                        '${patient.alamat}',    
                                                        '${patient.telp}')">
                                                        Pilih</button>
                            </li>`;
                    });
                    resultsHtml += '</ul>';
                    document.getElementById('search_results').innerHTML = resultsHtml;
                    $('#cariPasienModal').modal('hide');
                })
                .catch(error => {
                    console.error('Error fetching patients:', error);
                });
        });

    function selectPatient(id, nama, no_passport, tempat_lahir, tanggal_lahir, jk, pekerjaan, alamat, no_telp) {
        document.querySelector('input[name="nama_pasien"]').value = nama;
        document.querySelector('input[name="no_passport"]').value = no_passport;

        document.querySelector('input[name="tempat_lahir"]').value = tempat_lahir;
        document.querySelector('input[name="tgl_lahir"]').value =   tanggal_lahir;
        document.querySelector('input[name="kelamin"]').value =     jk;
        document.querySelector('input[name="pekerjaan"]').value =   pekerjaan;
        document.querySelector('input[name="alamat"]').value =      alamat;
        document.querySelector('input[name="no_telp"]').value =     no_telp;
        document.querySelector('input[name="warga_negara"]').value = "INDONESIA";
        $('#cariPasienModal').modal('hide');
    }

    document.getElementById('jenis_vaksinasi').addEventListener('change', function() {
    const vaksinId = this.value;
    if (vaksinId) {
        fetch(`/api/vaksin-isi/${vaksinId}`)
            .then(response => { 
                return response.json();
            })
            .then(data => {
                console.log('Fetched Data:', data); // Log fetched data
                let vaksinWajib = '';
                let vaksinTambahan = '';

                data.forEach(item => {
                    if (item.status_vaksin === 'Wajib') {
                        vaksinWajib = item.nama_tindakan;
                    } else if (item.status_vaksin === 'Tambahan') {
                        vaksinTambahan = item.nama_tindakan;
                    }
                });

                document.getElementById('vaksin_wajib').value = vaksinWajib;
                document.getElementById('vaksin_tambahan').value = vaksinTambahan;
            })
            .catch(error => console.error('Error:', error));
        } else {
            document.getElementById('vaksin_wajib').value = '';
            document.getElementById('vaksin_tambahan').value = '';
        }
    });


</script>

@endpush
