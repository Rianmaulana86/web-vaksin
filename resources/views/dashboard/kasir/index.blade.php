@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                    <h3>&nbsp;</h3>
                    <h3>K&nbsp;A&nbsp;S&nbsp;I&nbsp;R</h3>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                <div class="col-md-6">
                     <form action="{{ url('vaksin_registrasis') }}" method="GET">
                <input type="text" id="searchInput" name="search" class="form-control" placeholder="CARI DATA BERDASARKAN NO.REGISTRASI, NAMA ATAU NO. RM" value="{{ request('search') }}">
            </form>
</div>

<div class="table-responsive p-0">
    <table class="table align-items-center mb-0" id="vaksinTable">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">No. Registrasi</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Tanggal Registrasi</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">No. RM</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">No. Passport</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Jenis Vaksin</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Tanggal Keberangkatan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Pembayaran Kasir</th>
            </tr>
        </thead>
        <tbody>
            @if ($vaksin_registrasis->count() > 0)
                @php
                    $no = ($vaksin_registrasis->currentPage() - 1) * $vaksin_registrasis->perPage() + 1;
                @endphp

                @foreach ($vaksin_registrasis as $vaksin)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $vaksin->no_reg }}</td>
                        <td class="text-center">{{ $vaksin->tanggal }}</td>
                        <td>{{ $vaksin->pasien->nama_pasien }}</td>
                        <td class="text-center">{{ $vaksin->pasien->no_rm }}</td>
                        <td class="text-center">{{ $vaksin->pasien->no_passport }}</td>
                        <td class="text-center">{{ $vaksin->jenisVaksin->nama_jenis_paket_vaksin ?? 'N/A' }}</td>
                        <td class="text-center">{{ $vaksin->tanggal_berangkat }}</td>
                        <td class="text-center">
                            <center>
                            <!-- onsubmit="return openInNewWindow(event, this);" -->
                            <form action="{{ route('kasir.pembayaran', $vaksin->id) }}" method="POST" style="display:inline;"  target="_blank">   
                                @csrf
                                <button class="btn {{ $vaksin->pembayaran_kasir === 'Selesai' ? 'btn-success' : 'btn-danger' }}" 
                                        type="submit" 
                                        {{ $vaksin->pembayaran_kasir === 'Selesai' ? 'disabled' : '' }}>
                                    {{ $vaksin->pembayaran_kasir }}
                                </button>
                            </form>
                            </center>
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
