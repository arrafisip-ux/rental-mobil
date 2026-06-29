<!DOCTYPE html>
<html lang="id"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      x-init="
      document.documentElement.classList.toggle('dark',darkMode);

      $watch('darkMode',value=>{
          localStorage.setItem('darkMode',value);
          document.documentElement.classList.toggle('dark',value);
      });
">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Rental Mobil</title>

@vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="min-h-screen

bg-gradient-to-br

from-slate-100
via-blue-100
to-white

dark:from-slate-900
dark:via-blue-900
dark:to-slate-800

transition duration-300

flex items-center justify-center p-6">

<div class="absolute top-5 right-5">

<button
@click="darkMode=!darkMode"
class="bg-white dark:bg-slate-800 px-4 py-2 rounded-xl shadow">

🌙

</button>

</div>

<div class="w-full max-w-md">

<div class="bg-white dark:bg-slate-800 rounded-3xl shadow-2xl p-10">

{{ $slot }}

</div>

</div>

</body>

</html>