<!-- resources/views/pesanAdmin.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1">
    <title>Sensus Penduduk</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
</head>

<body>
    <h1>Sensus Penduduk</h1>
    <form method="post" action="{{ route('show-form') }}">
        @csrf
        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" required><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>
        <label for="provinsi">Provinsi:</label>
        <input type="provinsi" id="provinsi" name="provinsi" required><br>
        <label for="text">Kota:</label>
        <input type="kota" id="kota" name="kota" required><br>
        <label for="nomor_telpon">Nomor Telpon:</label>
        <input type="number" id="nomor_telpon" name="nomor_telpon" required><br>
        <button type="submit">Submit Formulir</button>
    </form>
</body>

</html>
