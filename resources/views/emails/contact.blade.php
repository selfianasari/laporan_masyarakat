<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>Pesan Baru Dari Kontak</h1>
    <p><strong>Nama:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Subjek:</strong> {{ $subject }}</p>
    <p><strong>Pesan:</strong></p>
    <p>{{ $contactMessage }}</p> 
</body>
</html>