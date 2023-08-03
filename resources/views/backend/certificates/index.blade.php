<!DOCTYPE html>
<html>

<head>
    <title>Member Certificate</title>
    <!-- Add other CSS styles for your certificate design -->
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('assets/cert_templates/baptism_cert.png');
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0;
        padding: 0;
    }

    .certificate-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .certificate {
        text-align: center;
        border: 1px solid #000;
        padding: 20px;
        width: 700px;
        margin: 0 auto;
        margin-top: 200px;
    }

    h1 {
        font-size: 24px;
    }

    p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .certificate:last-child .page-break {
        display: none;
    }

    .page-break {
        page-break-after: always;
    }

    @page {
        margin: 0;
        size: A4 landscape;
    }
</style>

<body>
    <div class="certificate-container">
        @foreach ($members as $item => $value)
            <div class="certificate">
                <h1>Member Certificate</h1>
                <p>This is to certify that {{ $value->first_name }} has been a valued member of our community.</p>
                <p>Issued on: {{ date('Y-m-d') }}</p>
            </div>
            @if ($item < count($members) - 1)
                <div class="page-break"></div>
            @endif
        @endforeach
    </div>
</body>

</html>
