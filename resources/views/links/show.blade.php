<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-zinc-200">
        <div class="h-screen">
            <div class="min-h-full">
                <div class="text-center flex flex-col max-w-2xl p-4 sm:p-6 lg:p-8 mx-auto">
                    <p class="my-3 font-bold text-7xl italic text-center">
                        kurangin!
                    </p>
                    <p class="text-sm text-center font-thin mb-3 italic">Link Shortener</p>
                    <input
                        name="original"
                        placeholder="{{ __('Long Original Link') }}"
                        class="w-full rounded-md shadow-sm"
                        value="https:\\prabupamungkas.site\b\{{ $link->short }}"
                        readonly="readonly"
                    />
                    <div class="flex flex-row gap-2 justify-center">
                        <a href="{{ route('links.besarin', ['short'=> $link->short]) }}"><x-secondary-button class="mt-4">{{ __('Besarin!') }}</x-primary-button></a>
                        <a href="{{ route('home') }}"><x-primary-button class="mt-4" href>{{ __('Back to Home') }}</x-primary-button></a>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
