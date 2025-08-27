<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="@csrf()">

    {{-- Título y descripción SEO --}}
    <title>{{ page()->meta_title()->or(page()->title()) }} | {{ site()->title() }}</title>
    <meta name="description" content="{{ page()->meta_description()->or('') }}">
    <meta name="keywords" content="{{ page()->meta_keywords()->join(', ') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="/images/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/images/favicon.svg" />
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="High Manufacturing Products" />
    <link rel="manifest" href="/images/site.webmanifest" />

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ page()->meta_title()->or(page()->title()) }}" />
    <meta property="og:description" content="{{ page()->meta_description()->or('') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ page()->url() }}" />
    @if($ogImage = page()->og_image()->toFile())
        <meta property="og:image" content="{{ $ogImage->url() }}" />
    @endif

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ page()->meta_title()->or(page()->title()) }}">
    <meta name="twitter:description" content="{{ page()->meta_description()->or('') }}">
    @if($ogImage = page()->og_image()->toFile())
        <meta name="twitter:image" content="{{ $ogImage->url() }}">
    @endif

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/lineicons/lineicons.css">
</head>


<body class="bg-gray-50 dark:bg-gray-800">
    @include('partials.navbar')

    {{ $slot }}
    @include('partials.floatingcontact')
    @include('partials.footer')
    @stack('scripts')
</body>

</html>
