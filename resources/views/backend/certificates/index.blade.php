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
        height: 380px;
        margin: 0 auto;
        margin-top: 150px;
        /* background-color: green; */

    }

    .signature-container {

        text-align: center;
        padding: 10px;
        width: 750px;
        margin: 0 auto;
        /* background-color: yellow; */
        position: absolute;

        /* border: 1px solid #000; */
        /* padding: 20px;
        width: 700px;
        margin-right: 400px;
        margin-left: 20px; */
    }

    .signature {
        /* background-color: green; */
        margin-top: 100px;
        display: inline-block;
        padding: 2px;
        max-height: 100px;
        /* text-align: center; */
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

    .image-container img {
        /* background-color: yellow; */
        /* position: absolute;
        top: 200px;
        z-index: -1; */
    }

    .signatory {
        /* background-color: blue; */
    }

    .graduate-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200vh;
        /* background-color: blue; */
    }

    .graduate {
        /* border: 1px solid #000; */
        padding: 20px;
        width: 900px;
        height: 380px;
        margin: 0 auto;
        margin-top: 150px;
        /* background-color: green; */

    }


    .picture {
        display: inline-block;
        width: 420px;
        height: 470px;
        background-color: yellow;
        transform: rotate(-8deg);
        overflow: hidden !important;
        margin-right: 50px;
    }
    .picture img {
        position: absolute;
        width: 420px !important;
    }

    .graduate-name {

        display: inline-block;
        width: 280px;
        height: 340px;
        /* background-color: orange; */
        padding: 20px;
        /* transform: rotate(-8deg); */
    }

    .graduate-name h1 {
        font-size: 60px;
    }
</style>

<body>
    @if ($template->title == 'GRADUATES')
        <div class="graduate-container">
            @foreach ($members as $item => $value)
                <div class="graduate">
                    <div class="picture">
                        {{-- @php
                                dd($value->getFirstMediaUrl('profile_picture', 'thumbnail'))
                            @endphp --}}
                        <img src="{{ $value->getFirstMediaUrl('profile_picture', 'thumbnail') }}"
                            alt="Selected Profile Picture">
                    </div>

                    <div class="graduate-name">
                        <h1>{{ mb_strtoupper($value->first_name) }} <br>
                            {{ mb_strtoupper($value->last_name) }} {{ mb_strtoupper($value->ext_name) }}</h1>

                    </div>

                </div>

                @if ($item < count($members) - 1)
                    <div class="page-break"></div>
                @endif
            @endforeach
        </div>
    @else
        <div class="certificate-container">
            @foreach ($members as $item => $value)
                <div class="certificate">
                    @php
                        mb_internal_encoding('UTF-8'); // before calling the function
                        mb_regex_encoding('UTF-8');
                        if (!function_exists('mb_ucwords') && function_exists('mb_convert_case')) {
                            function mb_ucwords($string)
                            {
                                return mb_convert_case($string, MB_CASE_TITLE, 'UTF-8');
                            }
                        }
                        $variableValue = mb_ucwords($value->first_name) . ' ' . mb_ucwords($value->last_name) . ' ' . mb_ucwords($value->ext_name); // Replace with your actual variable value
                        $modifiedContent = str_replace('{name}', $variableValue, $template->content);
                    @endphp
                    {!! $modifiedContent !!}

                    {{-- <p>Date: August 11, 2023</p> --}}
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
                                <img width="200px" src="{{ $sig->e_signature ?? '' }}"
                                    alt="Image with white background">

                            </div>
                            <div class="signatory">
                                <u><span>{{ mb_strtoupper($sig->title) ?? '' }} {{ mb_strtoupper($sig->first_name) }}
                                        {{ mb_strtoupper($sig->last_name) }}</span></u>
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
    @endif

</body>

</html>
