<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Persetujuan/Izin Tindakan Vaksinasi</title>
    <style>
        body {
            font-family: Cambria, serif;
            font-size:11px;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        .signature {
            margin-top: 40px;
            display: flex;
            justify-content: space-between; /* Menyusun elemen di sepanjang garis horizontal */
        }
        .note {
            font-size: 12px;
            color: gray;
        }
        button {
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
        }
        .indent {
            margin-left: 40px; /* Menambahkan indentasi */
        }
        
        @media print {
            button {
                display: none; /* Sembunyikan tombol saat dicetak */
            }
            h1 {
                display: none; /* Sembunyikan judul saat dicetak */
            }
            @page {
                margin-left: 2cm; /* Margin kiri 2cm untuk hasil cetak */
                margin-right: 1cm; /* Margin kanan (opsional) */
                margin-top: 1cm; /* Margin atas (opsional) */
                margin-bottom: 1cm; /* Margin bawah (opsional) */
                margin: 0; /* Remove header/footer */
            }
          
        }
         
        
    </style>
    <style>
    .indented-table {
        margin-left: 30px; /* Menjorok ke dalam halaman */
        margin-right: 20px; /* Opsional: memberi jarak di sebelah kanan */
        border-collapse: collapse; /* Memastikan border tabel tidak double */
    }
    .indented-table td {
        padding: 8px; /* Jarak antara isi sel dan border */
    }
</style>
    <script>
        function printForm() {
            window.print();
        }
    </script>
</head>
<body>
<center><h4>FORMULIR PERSETUJUAN / IZIN TINDAKAN VAKSINASI</h4></center>

    <p>Saya yang bertanda tangan dibawah ini,</p>
    


    <table class="indented-table">
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{ $pasien->nama_pasien }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $pasien->alamat }}</td>
    </tr>
    <tr>
        <td>No. Telepon</td>
        <td>:</td>
        <td>{{ $pasien->telp }}</td>
    </tr>
</table>

    <p>Dengan ini menyatakan dengan sesungguhnya telah memberikan,</p>
    <p><center>PERSETUJUAN / IZIN *)</center></p>
    <p>Untuk diberikan vaksinasi:</p>
    <p>Terhadap diri saya sendiri / suami / istri / anak / ayah / ibu *) saya:</p>

    <table class="indented-table">
    <tr>
        <td>No. Register</td>
        <td>:</td>
        <td>{{ $pasien->no_rm }}</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{ $pasien->nama_pasien }}</td>
    </tr>
    <tr>
        <td>No. Paspor</td>
        <td>:</td>
        <td>{{ $pasien->no_passport }}</td>
    </tr>
    <tr>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td>{{ $pasien->tempat_lahir }}</td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $pasien->tgl_lahir }}</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $pasien->kelamin }}</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{ $pasien->pekerjaan }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $pasien->alamat }}</td>
    </tr>
    <tr>
        <td>No. Telp</td>
        <td>:</td>
        <td>{{ $pasien->telp }}</td>
    </tr>
</table>
    <p>Yang bertujuan, sifat dan perlunya tindakan vaksinasi tersebut diatas, serta resiko yang dapat ditimbulkan.</p>
    <p>Demikian pernyataan persetujuan/izin ini saya buat dengan penuh kesadaran tanpa paksaan.</p>

    <p>{{ $setting->kota }}, _______________</p>
    <div class="signature">
        <div>
            <p>Yang membuat pernyataan,</p>
            <br>
            <br>
            <br>
            <p>______________________________</p>
            <p>{{ $pasien->nama_pasien }}</p>
        </div>  
        <div>
            <p>Dokter,</p>
            <br>
            <br>
            <br> 
            <p>______________________________</p>
            <p>Nama dokter</p>
        </div>
    </div>

    <p class="note">Ket: “Persetujuan” dibuat oleh orang dewasa, kata “Izin” dicoret.</p>
    <p class="note">“Izin buat anak-anak, kata “Persetujuan” dicoret.</p>

    <button onclick="printForm()">Print Formulir</button>
</body>
</html>


