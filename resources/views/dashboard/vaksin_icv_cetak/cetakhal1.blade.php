<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Passbook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
    @media print {

        body {
            visibility: hidden;
            font-family: Cambria, serif; /* Use Cambria font */
        }
        .page-passbook, .page-passbook * {
            visibility: visible;
            font-family: Cambria, serif;  /* Use Cambria font */
        }
       
        .print {
            display: none; /* Hide print button when printing */
        }
        @page {
            margin: 0; /* Remove header/footer */
        }
        .name-position, .passport-position {
            font-weight: bold; /* Bold text */
            font-size: 10pt;
            text-align: center; /* Center text */
            white-space: nowrap;
            font-weight: 900;  /* Prevent text wrapping */
            font-family: Cambria, serif;  /* Use Cambria font */
            text-decoration: none;
               
                text-decoration: none; /* Remove any underlines */
                border: none; /* Ensure no borders are affecting it */
                outline: none; /* Ensure no outlines are affecting it */
                padding: 0; /* Remove any padding */
                margin: 0; /* Remove any margin */
        }
        .name-position {
            position: absolute;
            left: 8.5cm; /* Start position */
            top: 8.8cm; /* Y position */
            width: 8.5cm; /* Adjust width for centering */
            text-align: center; /* Center the text */
        }  
        .passport-position {
            position: absolute;
            left: 12cm; /* X position */
            top: 11.2cm; /* Y position */
            text-align: center;
        }
    }
</style>

</head>
<body>

<div class="container">
    <section class="passbook">
        <div class="page-passbook">
            <div class="table">
                <table class="table table-sm">
                    <tr>
                        <td class="name-position">{{ $pasien->nama_pasien }}</td>
                    </tr>
                    <tr>
                        <td class="passport-position">{{ $pasien->no_passport }}</td>
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
