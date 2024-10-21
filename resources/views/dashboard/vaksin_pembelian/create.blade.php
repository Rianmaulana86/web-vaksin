@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h3>PEMBELIAN VAKSIN</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('vaksinpembelian') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_jenis_paket_vaksin" class="form-control-label">Nomer Faktur</label>
                                    <input class="form-control" type="text" name="no_faktur" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_vaksin" class="form-control-label">Tanggal Pembelian</label>
                                    <input class="form-control" type="date" name="tgl_pembelian" required>
                                </div>
                            </div>                          
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_vaksin" class="form-control-label">Nama Vaksin</label>
                                    <select class="form-control" id="vaksin" name="vaksin_id" required>
                                            <option value="">Pilih Vaksin</option> 
                                            @foreach($vaksin_master as $t)
                                            <option value="{{ $t->id }}" data-supplier="{{ $t->distributor_pbfs->nama }}" data-supplier-id="{{ $t->distributor_pbfs->id }}">{{ $t->nama_vaksin }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga" class="form-control-label">Supplier</label>
                                   
                                    <input type="text" id="supplier_nama" class="form-control" readonly>
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_vaksin" class="form-control-label">Jumlah Vaksin</label>
                                    <input class="form-control" name="jumlah_pembelian" type="number" min="0" step="0.01" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_vaksin" class="form-control-label">No.Batch</label>
                                    <input class="form-control" type="text" name="no_batch" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_vaksin" class="form-control-label">Harga Beli (satuan)</label>
                                    <input class="form-control" name="harga_beli" required type="number" min="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_vaksin" class="form-control-label">Total Tagihan</label>
                                    <input class="form-control" name="jumlah_tagihan" type="number" min="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_vaksin" class="form-control-label">Expired Date</label>
                                    <input class="form-control" type="date" name="exp_date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_vaksin" class="form-control-label">Satuan</label>
                                    <input class="form-control" type="text" name="satuan"  required>
                                </div>
                            </div>
                            <input type="text" id="supplier_id" name="supplier_id" class="form-control" hidden>
                        </div>
                        <button class="btn btn-primary btn-sm ms-auto" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    document.getElementById('vaksin').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const supplier_nama = selectedOption.getAttribute('data-supplier');
        document.getElementById('supplier_nama').value = supplier_nama || '';
        const supplier_id = selectedOption.getAttribute('data-supplier-id');
        document.getElementById('supplier_id').value = supplier_id|| '';
    });
</script>
@endpush
