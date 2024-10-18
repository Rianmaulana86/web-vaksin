@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h3>PROSES VAKSINASI</h3>
                    
                    <a class="btn btn-primary btn-sm" href="{{ url('vaksin_registrasis/create') }}">Pendaftaran Vaksinasi</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                <div class="mb-2">
    <form action="{{ url('vaksin_registrasis') }}" method="GET">
        <input type="text" id="searchInput" name="search" class="form-control" placeholder="Cari berdasarkan No. Registrasi, Nama, atau No. RM" value="{{ request('search') }}">
    </form>
</div>

<div class="table-responsive p-0">
    <table class="table align-items-center mb-0" id="vaksinTable">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. Registrasi</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Registrasi</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. RM</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. Passport</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Vaksin</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Keberangkatan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pembayaran Kasir</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tindakan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Buku dicetak</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Buku ICV Diterima</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><center>Aksi</center></th>
            </tr>
        </thead>
        <tbody>
            @if ($vaksin_registrasis->count() > 0)
                @php
                    $no = ($vaksin_registrasis->currentPage() - 1) * $vaksin_registrasis->perPage() + 1;
                @endphp

                @foreach ($vaksin_registrasis as $vaksin)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $vaksin->no_reg }}</td>
                        <td>{{ $vaksin->tanggal }}</td>
                        <td>{{ $vaksin->pasien->nama_pasien }}</td>
                        <td>{{ $vaksin->pasien->no_rm }}</td>
                        <td>{{ $vaksin->pasien->no_passport }}</td>
                        <td>{{ $vaksin->jenisVaksin->nama_jenis_paket_vaksin ?? 'N/A' }}</td>
                        <td>{{ $vaksin->tanggal_berangkat }}</td>
                        <!-- <td>
                            @if ($vaksin->tindakan_suntik === 'Selesai' && $vaksin->buku_icv === 'Selesai' && $vaksin->pembayaran_kasir === 'Selesai')
                                <a class="btn btn-success d-flex align-items-center justify-content-center" href="print/passbook/{{ $vaksin->pasien->id_rm }}">
                                    <i class="fa fa-print"></i> 
                                </a>
                            @else
                                {{-- <i class="text-danger">Not Complete</i> --}}
                                <a class="btn btn-success d-flex align-items-center justify-content-center" href="print/passbook/{{ $vaksin->pasien->id_rm }}">
                                    <i class="fa fa-print"></i> 
                                </a>
                            @endif
                        </td> -->
                        <td>
                            <center>
                            <form action="{{ route('kasir.pembayaran', $vaksin->id) }}" method="POST" style="display:inline;" onsubmit="return openInNewWindow(event, this);">    
                                @csrf
                             
                                <button class="btn {{ $vaksin->pembayaran_kasir === 'Selesai' ? 'btn-success' : 'btn-danger' }}" 
                                        type="submit" 
                                        {{ $vaksin->pembayaran_kasir === 'Selesai' ? 'disabled' : '' }}>
                                    {{ $vaksin->pembayaran_kasir }}
                                </button>
                            </form>
                            </center>
                        </td>
                        <td>
                            <center>
                            <form action="{{ url('/vaksin/suntik/' . $vaksin->id) }}" method="POST" style="display:inline;" onsubmit="return openInNewWindow(event, this);">    
                                @csrf
                            
                                <button class="btn {{ $vaksin->tindakan_suntik === 'Belum' ? 'btn-danger' : 'btn-success' }}" 
                                        type="submit" 
                                        {{ $vaksin->tindakan_suntik === 'Selesai' ? 'disabled' : '' }}>
                                    {{ $vaksin->tindakan_suntik }}
                                </button>
                            </form>
                            </center>
                        </td>
                        <td>
                            <center>
                            <form action="{{ route('buku.cetak', $vaksin->id) }}" method="POST" style="display:inline;" onsubmit="return openInNewWindow(event, this);"> 
                                @csrf
                            
                                <button class="btn {{ $vaksin->buku_icv === 'Selesai' ? 'btn-success' : 'btn-danger' }}" 
                                        type="submit" 
                                        {{ $vaksin->buku_icv === 'Selesai' ? 'disabled' : '' }}>
                                    {{ $vaksin->buku_icv }}
                                </button>
                            </form>
                            </center>
                        </td>
                        <td>
                            <center>
                            <form action="{{ route('buku.diterima', $vaksin->id) }}"method="POST" style="display:inline;" onsubmit="return openInNewWindow(event, this);"> 
                                @csrf
                                <button class="btn {{ $vaksin->buku_icv === 'Selesai' ? 'btn-success' : 'btn-danger' }}" 
                                        type="submit" 
                                        {{ $vaksin->buku_icv === 'Selesai' ? 'disabled' : '' }}>
                                    {{ $vaksin->buku_icv }}
                                </button>
                            </form>
                            </center>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('vaksin.edit', $vaksin->id) }}">Edit</a>
                            <!-- <form action="{{ route('vaksin_registrasis.destroy', $vaksin->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form> -->
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="12" class="text-center">Tidak ada data vaksin.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $vaksin_registrasis->links() }}
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#vaksinTable tbody tr');
        
        rows.forEach(row => {
            const cells = row.getElementsByTagName('td');
            const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');
            row.style.display = rowText.includes(searchValue) ? '' : 'none';
        });
    });

    setInterval(() => {
        location.reload();
    }, 15000);


    function openInNewWindow(event, form) {
        event.preventDefault(); // Mencegah pengiriman form secara default

        const newWindow = window.open('', '_blank', 'width=800,height=600'); // Membuka jendela baru dengan ukuran tertentu

        // Buat elemen form baru untuk mengirim data
        const newForm = newWindow.document.createElement('form');
        newForm.method = form.method;
        newForm.action = form.action;

        // Tambahkan token CSRF
        const csrfInput = newWindow.document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}'; // Token CSRF

        newForm.appendChild(csrfInput);

        // Tambahkan input ID
        const idInput = newWindow.document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'id';
        idInput.value = '{{ $vaksin->id }}'; // ID dari vaksin

        newForm.appendChild(idInput);

        // Tambahkan form ke jendela baru dan kirim
        newWindow.document.body.appendChild(newForm);
        newForm.submit(); // Kirim form

        return false; // Mencegah pengiriman form asli
    }
</script>

@endsection
