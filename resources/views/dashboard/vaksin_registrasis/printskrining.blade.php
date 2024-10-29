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
        table {
            width: 100%; /* Ubah ukuran sesuai kebutuhan */
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000; /* Garis kotak */
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2; /* Warna latar belakang header */
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
<center><h4>DAFTAR TILIK PENAMPISAN KONTRAINDIKASI</h4></center>
<center><h4>UNTUK VAKSINASI DEWASA</h4></center>
   
    

    <table class="indented-table">
        <tr>
            <td>Nama Pelaku Perjalanan</td>
            <td>:</td>
            <td>{{ $pasien->nama_pasien }}</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $pasien->tgl_lahir }}</td>
        </tr>
    </table>


    <table>
        <tr>
            <th>No.</th>
            <th>Pertanyaan</th>
            <th>Ya</th>
            <th>Tidak</th>
            <th>Ket</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Apakah anda sedang sakit hari ini?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Apakah anda memiliki alergi terhadap obat-obatan, makanan, komponen vaksin atau lateks?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Apakah anda pernah mengalami reaksi alergi berat setelah menerima vaksinasi?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Apakah anda memiliki penyakit kronis terkait jantung, paru-paru, asma, ginjal, penyakit metabolik (diabetes), anemia atau penyakit kelainan darah?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Apakah anda menderita kanker, leukimia, HIV/AIDS atau gangguan sistem daya tahan tubuh?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6</td>
            <td>Dalam 3 bulan terakhir, apakah Anda mendapatkan pengobatan yang melemahkan daya tahan tubuh, seperti kortison, prednison, steroid lainnya atau obat anti kanker, atau dalam terapi radiasi?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>7</td>
            <td>Apakah anda pernah mengalami kejang atau gangguan sistem syaraf lainnya?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>8</td>
            <td>Apakah anda menerima transfusi darah atau produk darah, atau mendapat terapi Imun (gamma) globulin, atau obat antiviral dalam satu tahun terakhir?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>9</td>
            <td>Apakah anda sedang hamil atau berencana untuk hamil dalam 1 bulan ke depan?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>10</td>
            <td>Apakah anda mendapatkan vaksinasi dalam 4 minggu terakhir?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>11</td>
            <td>Apakah anda membawa kartu vaksinasi?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <p>Dengan ini memohon kepada <b>{{ $setting->nama_klinik }}</b> agar dapat memberikan vaksinasi (( $vaksin->vaksinasi )) kepada saya,  </p>
    <p>Dengan ini saya juga menyatakan bahwa semua informasi yang berhubungan dengan vaksinasi ini telah saya ketahui termasuk</p>
    <p> efek samping ataupun Kejadian Ikutan Paska Vaksinasi (KIPI).</p>
    <p>Demikian permohonan ini dibuat agar dapat dipergunakan sebagaimana mestinya.</p>

    <p>{{ $setting->kota }}, _______________</p>
    <div class="signature">
        <div>
            <p>Pemohon,</p>
            <br>    
            <br>
            <br>
            <p>______________________________</p>
            <p>{{ $pasien->nama_pasien }}</p>
        </div>  
    </div>  
    <button onclick="printForm()">Print Formulir</button>
</body>
</html>


