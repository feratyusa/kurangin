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
    <body class="font-sans antialiased">
        <div class="h-screen">
            <div class="min-h-full">
                <div class="text-center flex flex-col max-w-2xl p-4 sm:p-6 lg:p-8 mx-auto">
                    <p class="my-3 font-bold text-7xl italic text-center">
                        kurangin!
                    </p>
                    <p class="text-sm text-center font-thin mb-3 italic">Link Shortener</p>
                    <form
                        action="{{ route('links.store') }}" 
                        method="post">
                        @csrf
                        <input
                            name="original"
                            placeholder="{{ __('Long Original Link') }}"
                            class="w-full rounded-md shadow-sm"
                            value="{{ old('original') }}"
                        />
                        <x-input-error :messages="$errors->get('original')" class="mt-2" />
                        <p class="text-center font-bold text-lg my-5">
                            Custom Link
                        </p>
                        <div class="flex flex-row items-center max-w-xl text-center my-3">
                            <p class="text-medium mx-2 font-bold">prabupamungkas.site/b/</p>
                            <input
                                name="short"
                                placeholder="{{ __('Custom Short Link') }}"
                                class="w-full rounded-md shadow-sm"
                                value="{{ old('short') }}"
                            />
                        </div>
                        <x-input-error :messages="$errors->get('short')" class="mt-2" />
                        <x-primary-button class="mt-4">{{ __('kurangin!') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
