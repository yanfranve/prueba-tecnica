<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $document->title }}</title>
</head>
<body>
    <h1>{{ $document->title }}</h1>
    <p>{{ $document->content }}</p>
    <img src="{{ public_path($document->qr_code_path) }}" alt="QR Code">
</body>
</html>
