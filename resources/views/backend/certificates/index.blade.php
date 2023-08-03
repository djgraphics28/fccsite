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

    .certificate {
        text-align: center;
        border: 1px solid #000;
        padding: 20px;
        width: 600px;
        margin: 0 auto;
        margin-bottom: 20px;
    }

    h1 {
        font-size: 24px;
    }

    p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .page-break {
        page-break-after: always;
    }
</style>

<body>
    @foreach ($members as $item)
        <div class="certificate">
            <h1>Member Certificate</h1>
            <p>This is to certify that {{ $item->first_name }} has been a valued member of our community.</p>
            <p>Issued on: {{ date('Y-m-d') }}</p>
        </div>
        <div class="page-break"></div>
    @endforeach
</body>

</html>
