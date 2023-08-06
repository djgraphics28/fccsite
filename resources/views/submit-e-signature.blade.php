<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Submit E-Signature</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet" />
    <link href="{{ asset('signature/css/jquery.signature.css') }}" rel="stylesheet" />
    <style>
        .kbw-signature {
            width: 400px;
            height: 200px;
        }

    </style>
    <!--[if IE]>
            <script src="excanvas.js"></script>
        <![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('signature/js/jquery.signature.js') }}"></script>
    <script>
        $(function() {
            var sig = $("#sig").signature();
            $("#disable").click(function() {
                var disable = $(this).text() === "Disable";
                $(this).text(disable ? "Enable" : "Disable");
                sig.signature(disable ? "disable" : "enable");
            });
            $("#clear").click(function() {
                sig.signature("clear");
            });
            $("#json").click(function() {
                alert(sig.signature("toJSON"));
            });
            $("#svg").click(function() {
                alert(sig.signature("toSVG"));
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <h1>FCC E-Signature</h1>

        <p>Write your Signature:</p>
        <form action="{{ route('signature.store') }}" method="POST">
            @csrf
        <div id="sig"></div>
        <p style="clear: both">
            {{-- <button id="disable">Disable</button> --}}

            <button type="submit" class="btn btn-primary">Submit</button>
            {{-- <button id="json">To JSON</button>
                <button id="svg">To SVG</button> --}}
        </p>
        </form>
        <button class="btn btn-secondary" id="clear">Clear</button>
    </div>


</body>

</html>
