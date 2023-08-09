<!DOCTYPE html>
<html>

<head>
    <title>{{ $template->title }}</title>
    <!-- Add other CSS styles for your certificate design -->
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('{{ $template->getFirstMediaUrl('background', 'thumbnail') }}');
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
        /* background-color: blue; */
    }

    .certificate {
        text-align: center;
        /* border: 1px solid #000; */
        padding: 20px;
        width: 900px;
        margin: 0 auto;
        margin-top: 150px;
        /* background-color: green; */

    }

    .signature-container {

        text-align: center;
        /* border: 1px solid #000; */
        padding: 20px;
        width: 700px;
        margin-right: 400px;
        margin-left: 20px;
        margin-top: 120px;
    }

    .signature {
        /* background-color: green; */
        display: inline-block;
        text-align: center;
        background-color: white;
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

    .image-container img{
        /* background-color: yellow; */
        position: absolute;
        top: 490px;
        z-index: -1;
    }

    .signatory{
        /* background-color: blue; */
    }

</style>

<body>
    <div class="certificate-container">
        @foreach ($members as $item => $value)
            <div class="certificate">
                @php
                    $variableValue = strtoupper($value->first_name) . ' ' . strtoupper($value->last_name); // Replace with your actual variable value
                    $modifiedContent = str_replace('{name}', $variableValue, $template->content);
                @endphp
                {!! $modifiedContent !!}

                <p>Issued on: {{ date('F j, Y') }}</p>
                <br>

            </div>
            <div class="signature-container">
                @php
                    $count = 1;
                @endphp
                @foreach ($signatories as $sig)
                    <div class="signature">
                        {{-- <img width="200px" src="{{ $sig->e_signature ?? "" }}" alt=""> --}}
                        <div class="image-container">
                            <img width="200px" src="{{ $sig->e_signature ?? '' }}" alt="Image with white background">

                        </div>
                        <div class="signatory">
                            <u><span>{{ $sig->position ?? '' }} {{ strtoupper($sig->first_name) }}
                                {{ strtoupper($sig->last_name) }}</span></u>
                        </div>
                        <div class="label">
                            <span><i>{{ $sig->position ?? '' }}</i></span>
                        </div>
                    </div>
                    {{-- @if ($count >= 3)
                        <br>
                    @endif --}}
                    @php
                        $count++;
                    @endphp
                @endforeach
            </div>
            @if ($item < count($members) - 1)
                <div class="page-break"></div>
            @endif
        @endforeach
    </div>
</body>

</html>
