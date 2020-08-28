<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> ini adalah halaman tes</h1>
    <br>
    <h2>Welcome to laravel</h2>
    @if ($pesan):
    <h3>{{'hello'.$pesan}}</h3>
    @endif
</body>
</html>