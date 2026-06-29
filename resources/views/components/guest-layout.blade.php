<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Rental Mobil</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 flex items-center justify-center p-6">

    <div class="w-full max-w-md">

        <div class="bg-white/90 backdrop-blur-xl shadow-2xl rounded-3xl p-10">

            {{ $slot }}

        </div>

    </div>

</body>

</html>