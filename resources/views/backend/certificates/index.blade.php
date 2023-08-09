<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <!-- Add other CSS styles for your certificate design -->
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('assets/cert_templates/vbs.png');
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0;
        padding: 0;
    }

    .certificate-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200vh;
    }

    .certificate {
        text-align: center;
        /* border: 1px solid #000; */
        padding: 20px;
        width: 1000px;
        margin: 0 auto;
        margin-top: 150px;
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
                @php
                    $variableValue = strtoupper($value->first_name)." ".strtoupper($value->last_name); // Replace with your actual variable value
                    $modifiedContent = str_replace('{name}', $variableValue, $content);
                @endphp
                {!! $modifiedContent !!}

                <p>Issued on: {{ date('F j, Y') }}</p>
                <br>
                @foreach ($signatories as $sig)
                    <u><span>{{ $sig }}</span></u>
                @endforeach
            </div>
            @if ($item < count($members) - 1)
                <div class="page-break"></div>
            @endif
        @endforeach
    </div>
</body>

</html>
