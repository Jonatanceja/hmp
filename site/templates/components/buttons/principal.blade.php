@props([
    'href' => '#',
    'text' => 'Click aquí'
])

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'bg-red-600 py-3 px-5 rounded-md hover:bg-red-700 transition duration-300 ease-in-out text-white']) }}>
    {{ $text }}
</a>
