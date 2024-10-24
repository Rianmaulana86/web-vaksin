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
            <form action="{{}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Pasien</label>
                    <input class="form-control" type="text" name="nama" disabled>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">No.Passport</label>
                    <input class="form-control" type="text" name="posisi" disabled>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                    <input class="form-control" type="text" name="posisi" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Valid Date </label>
                    <input class="form-control" type="date" name="nama" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Until Date</label>
                    <input class="form-control" type="date" name="posisi">
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