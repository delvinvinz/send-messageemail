<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email</title>
</head>
<body>
    <h3>Hallo {{ $data['recipient_name'] }}</h3>
    <p>{{ $data['message'] }}</p>

</body>
</html>
