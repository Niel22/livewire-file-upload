<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="antialized">
        <div class="flex">
            <div class="w-2/4 mx-auto pt-10">
                <livewire:users-list lazy/>
            </div>
            {{-- <div class="w-2/4">
                <livewire:registration-form />
            </div> --}}
        </div>
    </body>
</html>
