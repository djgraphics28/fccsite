<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <!-- Add other CSS styles for your certificate design -->
</head>
<style>
    body {
        padding: 0;
        margin: 0;
    }

    @page {
        margin: 0;
        size: A4 landscape;
    }

    /* Specify the Old English font face */
    @font-face {
        font-family: 'OldEnglish';
        src: url('/fonts/OldeEnglish.ttf') format('truetype');
        /* Update the font path and format if necessary */
    }

    /* Apply the Old English font to specific elements */
    h1,
    p {
        font-family: 'OldEnglish';
        /* Use a fallback font (in this case, sans-serif) in case the custom font fails to load */
    }
</style>

<body>
    <center><h1>{{ $title }}</h1></center>
    <p>This certificate is awarded to <strong>{{ $name }}</strong> for completing the course
        <strong>{{ $title }}</strong>.</p>
    <!-- Add other certificate design elements here -->
</body>

</html>
