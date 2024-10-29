<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Passbook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        @media print {
            body {
            visibility: hidden;
            font-family: Cambria, serif; /* Use Cambria font */
            }
            .page-passbook, .page-passbook * {
                visibility: visible;
                font-family: Cambria, serif; /* Use Cambria font */
            }
            .print {
                display: none; /* Sembunyikan tombol print saat mencetak */
            }
            @page {
                margin: 0; /* Mengatur margin untuk menghilangkan header/footer */
            }
            .name-position, .passport-position, .sex-position, .birthdate-position, .country-position, .passport-position, .vaksin-position, .vaksinmerk-position, .datevaksin-position, .dokter-position, .valid-start-vaksin-position, .jabatan-dokter-position,  .valid-until-vaksin-position {
                font-size: 7pt; /* Ukuran font */
                font-weight: bold; /* Gaya teks bold */
                font-family: Cambria, serif; 
            }
            .name-position {
                position: absolute;
                left: 4.5cm; /* Posisi x */
                top: 1.4cm; /* Posisi y */
            }  
            .birthdate-position {
                position: absolute;
                left: 2.7cm; /* Posisi x */
                top: 2cm; /* Posisi y */
            }
            .country-position {
                position: absolute;
                left: 2.4cm; /* Posisi x */
                top: 2.6cm; /* Posisi y */
            }  
            .sex-position {
                position: absolute;
                left: 5.6cm; /* Posisi x */
                top: 2cm; /* Posisi y */
            }
            .passport-position {
                position: absolute;
                left: 6.5cm; /* Posisi x */
                top: 3.1cm; /* Posisi y */
            }
            .vaksin-position {
                position: absolute;
                left: 1cm; /* Posisi x */
                top: 5.1cm; /* Posisi y */
            }  
            .vaksinmerk-position {
                position: absolute;
                left: 1cm; /* Posisi x */
                top: 9cm; /* Posisi y */
            }
            .datevaksin-position {
                position: absolute;
                left: 3.5cm; /* Posisi x */
                top: 9cm; /* Posisi y */
            }
            .dokter-position {
                position: absolute;
                left: 5.3cm; /* Posisi x */
                top: 9cm; /* Posisi y */
            }
            .valid-start-vaksin-position {
                position: absolute;
                left: 12.2cm; /* Posisi x */
                top: 9cm; /* Posisi y */
            }
            .jabatan-dokter-position {
                position: absolute;
                left: 5.2cm; /* Posisi x */
                top: 10cm; /* Posisi y */
            }
            .valid-until-vaksin-position {
                position: absolute;
                left: 12.2cm; /* Posisi x */
                top: 10cm; /* Posisi y */
            }
        }
    </style>
</head>
<body>

<div class="container">
    <section class="passbook">
        <div class="page-passbook">
            <div class="table">
                <table class="table table-sm ">
                    <tr>
                        <td class="name-position">{{ $pasien->nama_pasien }}</td> <!-- Tambahkan kelas untuk posisi -->
                    </tr>
                    <tr>
                        <td class="birthdate-position">{{ $pasien->nama_pasien }}</td> <!-- Tambahkan kelas untuk posisi -->
                    </tr>
                    <tr>
                        <td class="sex-position">{{ $pasien->kelamin }}</td> <!-- Tambahkan kelas untuk posisi -->
                    </tr>
                    <tr>
                        <td class="country-position">INDONESIA</td> <!-- Tambahkan kelas untuk posisi -->
                    </tr>
                    <tr>
                        <td class="passport-position">PASSPORT</td> <!-- Tambahkan kelas untuk posisi -->
                    </tr>
                    <tr>
                        <td class="vaksin-position">MENINGITIS</td> <!-- Tambahkan kelas untuk posisi -->
                    </tr>
                    <tr>
                        <td class="vaksinmerk-position">FORMENING</td> <!-- Tambahkan kelas untuk posisi -->
                    </tr>
                    <tr>
                        <td class="datevaksin-position">{{ ucfirst(\Carbon\Carbon::now()->format('d-M-Y')) }}</td> <!-- Tambahkan kelas untuk posisi -->
                    </tr>

                    <tr>
                        <td class="dokter-position">Dr. NANANG SUNANANG</td> <!-- Tambahkan kelas untuk posisi -->
                    </tr>
                    <tr>
                        <td class="valid-start-vaksin-position">Valid {{ ucfirst(\Carbon\Carbon::now()->format('d-M-Y')) }}</td> <!-- Tambahkan kelas untuk posisi -->
                    </tr>
                    <tr>
                        <td class="jabatan-dokter-position">CLINIK MEDICAL DOCTOR</td> <!-- Tambahkan kelas untuk posisi -->
                    </tr>
                    <tr>
                        <td class="valid-until-vaksin-position">Until {{ ucfirst(\Carbon\Carbon::now()->addYears(3)->format('d-M-Y')) }}</td> <!-- Tambahkan kelas untuk posisi -->
                    </tr>
                </table>
            </div>
        </div>
        <div class="print">
            <input type="button" class="btn btn-primary" onclick="window.print()" value="Print" />
        </div>
    </section>
</div>

</body>
</html>
