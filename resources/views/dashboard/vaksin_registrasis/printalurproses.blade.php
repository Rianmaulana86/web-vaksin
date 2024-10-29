<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>International Certificate of Vaccination</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        @media print {
            body {
                visibility: hidden;
            }
            .certificate, .certificate * {
                visibility: visible;
            }
            .print-btn {
                display: none;
            }
            @page {
                margin: 1.5cm;
            }
        }
        
        /* Certificate Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }
        .certificate {
            max-width: 21cm;
            height: auto;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border: 2px solid #333;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .header h5 {
            font-size: 14px;
            margin-bottom: 20px;
            color: #555;
        }
        .section {
            margin-bottom: 15px;
            font-size: 14px;
        }
        .field-label {
            font-weight: bold;
            margin-right: 10px;
            font-size: 15px;
        }
        .value {
            text-decoration: underline;
            margin-left: 5px;
            font-size: 15px;
        }
        .static {
            font-weight: bold;
            font-size: 14px;
            display: block;
            margin-top: 30px;
            text-align: center;
        }
        /* Optional Footer or Signature Section */
        .signature {
            margin-top: 30px;
            text-align: center;
        }
        .signature .line {
            width: 50%;
            margin: 10px auto;
            border-top: 1px solid #000;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="certificate">
        <div class="header">
            <h2>International Certificate of Vaccination or Prophylaxis</h2>
            <h5>(World Health Organization)</h5>
        </div>

        <!-- Personal Information Section -->
        <div class="section">
            <span class="field-label">Full Name:</span>
            <span class="value">{{ $nama ?? 'ANDI MALARANGENG' }}</span>
        </div>
        
        <div class="section">
            <span class="field-label">Passport Number:</span>
            <span class="value">{{ $passport ?? 'JKT123123' }}</span>
        </div>

        <!-- Vaccination Information Section -->
        <div class="section">
            <span class="field-label">Vaccine Name:</span>
            <span class="value">{{ $vaccine_name ?? 'Meningitis' }}</span>
        </div>
        
        <div class="section">
            <span class="field-label">Vaccine Brand:</span>
            <span class="value">{{ $vaccine_brand ?? 'Formening' }}</span>
        </div>
        
        <div class="section">
            <span class="field-label">Date of Vaccination:</span>
            <span class="value">{{ $vaccination_date ?? '14/08/2022' }}</span>
        </div>

        <!-- Doctor and Clinic Section -->
        <div class="section">
            <span class="field-label">Administered By (Doctor):</span>
            <span class="value">{{ $doctor_name ?? 'Dr. NANANG SUNANANG' }}</span>
        </div>

        <div class="section">
            <span class="field-label">Clinic or Hospital:</span>
            <span class="value">{{ $clinic ?? 'CLINIK MEDICAL DOCTOR' }}</span>
        </div>

        <!-- Vaccine Validity Section -->
        <div class="section">
            <span class="field-label">Valid From:</span>
            <span class="value">{{ $valid_from ?? '22/02/2020' }}</span>
        </div>

        <div class="section">
            <span class="field-label">Valid Until:</span>
            <span class="value">{{ $valid_until ?? '22/02/2023' }}</span>
        </div>

        <!-- Signature and Stamp Section -->
        <div class="signature">
            <div class="line"></div>
            <span class="static">Authorized Signature/Stamp</span>
        </div>
    </div>

    <div class="text-center print-btn">
        <button class="btn btn-primary mt-3" onclick="window.print()">Print Certificate</button>
    </div>
</div>

</body>
</html>
