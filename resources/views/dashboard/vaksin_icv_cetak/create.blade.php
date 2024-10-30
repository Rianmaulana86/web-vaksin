@extends('layouts.master')
@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <h3>Cetak Buku ICV</h3>
          
          </div>
        </div>

        

        <div class="card-body">
            <form action="{{ route('buku.inputCetakBuku', $vaksinRegistrasi->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Pasien</label>
                    <label for="nama_pasien" class="form-control-label">Nama Pasien</label>
                                    <input class="form-control" type="text" name="nama_pasien" value="{{ $vaksinRegistrasi->pasien->nama_pasien ?? 'Data tidak ada' }}" disabled>
                                    <input class="form-control" type="text" name="no_reg" value="{{ $vaksinRegistrasi->no_reg ?? 'Data tidak ada' }}" hidden >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">No.Passport</label>
                    <input class="form-control" type="text" name="no_passport" value="{{ $vaksinRegistrasi->pasien->no_passport ?? 'Data tidak ada' }}" disabled>
                  </div>
                </div>
               
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="valid_date" class="form-control-label">Valid Date</label>
                    <input id="valid_date" class="form-control" type="date" name="valid_date" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="until_date" class="form-control-label">Until Date</label>
                    <input id="until_date" class="form-control" type="date" name="until_date" readonly>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary btn-large ms-auto" type="submit">Cetak ICV</button>
             
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@push('scripts')
<script>
  // Mendapatkan tanggal hari ini
  const today = new Date();
  
  // Mengatur valid_date ke tanggal hari ini
  const validDateInput = document.getElementById('valid_date');
  validDateInput.value = today.toISOString().split('T')[0];

  // Mengatur until_date ke tanggal hari ini ditambah 3 tahun
  const untilDateInput = document.getElementById('until_date');
  const untilDate = new Date(today);
  untilDate.setFullYear(untilDate.getFullYear() + 3);
  untilDateInput.value = untilDate.toISOString().split('T')[0];
</script>
@endpush
