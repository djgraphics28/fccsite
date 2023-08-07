{{-- <!DOCTYPE html>
<html>

<head>
    <title>PHP Signature Pad Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="{{ asset('signature/js/jquery.signature.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('signature/css/jquery.signature.css') }}">

    <style>
        .kbw-signature {
            width: 400px;
            height: 200px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }
    </style>

</head>

<body>

    <div class="container">

        <form id="myForm">
            @csrf
            <h1>FCC E-Signature</h1>

            <div class="col-md-12">
                <label class="" for="">Signature:</label>
                <br />
                <div id="sig"></div>
                <input type="hidden" value="{{ $id }}" id="memberId">
                <br />
                <button id="clear">Clear Signature</button>
                <textarea id="signature64" name="signed" style="display: none"></textarea>
            </div>

            <br />
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

    </div>

    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'json'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });

        $(document).ready(function() {
            $('#myForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Get individual input values by their IDs
                var signature = $('#signature64').val();
                var memberId = $('#memberId').val();
                // Add other input values as needed

                // Create an object to hold the form data
                var formData = {
                    signature: signature,
                    memberId: memberId
                    // Add other form fields as needed
                };

                // Get the CSRF token from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Add the CSRF token to the headers
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                $.ajax({
                    url: '/signature-store',
                    type: 'POST',
                    data: formData, // Serialize the form data
                    dataType: 'json',
                    success: function(response) {
                        // Handle the success response here
                        alert(response.message);
                    },
                    error: function(xhr) {
                        // Handle the error response here
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>

</body>

</html> --}}
@extends('layouts.registration')

@push('header')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="{{ asset('signature/js/jquery.signature.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('signature/css/jquery.signature.css') }}">

    <style>
        .kbw-signature {
            width: 100%;
            height: 200px;
        }

        #sig canvas {
            width: 100%;
            height: auto;
        }
    </style>
@endpush

@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="container">
                <div class="p-0">
                    <h1>FCC E-Signature</h1>
                    <form id="myForm">
                        @csrf
                        <label class="" for="">Signature:</label>
                        <div class="form-group">

                            <div class="form-control" id="sig"></div>
                            <input type="hidden" value="{{ $id }}" id="memberId">
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                            <br />

                        </div>
                        <div class="form-group row">
                            <button class="btn btn-secondary ml-3 mr-3" id="clear">Clear Signature</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>

            <script type="text/javascript">
                var sig = $('#sig').signature({
                    syncField: '#signature64',
                    syncFormat: 'json'
                });
                $('#clear').click(function(e) {
                    e.preventDefault();
                    sig.signature('clear');
                    $("#signature64").val('');
                });

                $(document).ready(function() {
                    $('#myForm').submit(function(e) {
                        e.preventDefault(); // Prevent the default form submission

                        // Get individual input values by their IDs
                        var signature = $('#signature64').val();
                        var memberId = $('#memberId').val();
                        // Add other input values as needed

                        // Create an object to hold the form data
                        var formData = {
                            signature: signature,
                            memberId: memberId
                            // Add other form fields as needed
                        };

                        // Get the CSRF token from the meta tag
                        var csrfToken = $('meta[name="csrf-token"]').attr('content');

                        // Add the CSRF token to the headers
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        });

                        $.ajax({
                            url: '/signature-store',
                            type: 'POST',
                            data: formData, // Serialize the form data
                            dataType: 'json',
                            success: function(response) {
                                // Handle the success response here
                                alert(response.message);
                            },
                            error: function(xhr) {
                                // Handle the error response here
                                alert('Error: ' + xhr.responseText);
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
@endsection
