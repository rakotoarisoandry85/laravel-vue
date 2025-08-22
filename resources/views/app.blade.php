<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div
        class="mt-2 container mx-auto"
        id="app"
    >
        @yield('content')
    </div>

   {{-- <footer>
    <p class="text-center text-gray-600 mt-4">© {{ date('Y') }} Mon Application. Tous droits réservés.</p>
   </footer> --}}

   <!-- Footer -->
    <footer class="glass-effect mt-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <p class="text-blue-700 text-sm">
                    ©  {{ date('Y') }}  My Application. Made with <i class="fas fa-heart text-red-400"></i> for anyone.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
