<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      x-init="$watch('darkMode', value => {
            localStorage.setItem('darkMode', value);
            document.documentElement.classList.toggle('dark', value);
      });
      document.documentElement.classList.toggle('dark', darkMode);">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sistem Informasi Rental Mobil')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

   

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>
        body{
            font-family:'Inter',sans-serif;
        }
    </style>

</head>

<body class="bg-slate-100 dark:bg-slate-900">

<div class="flex min-h-screen">

   @include('partials.sidebar')

<div class="flex-1 flex flex-col">

    @include('partials.navbar')

    <main class="p-6">
        @yield('content')
    </main>

</div>

</div>

</body>
</html>