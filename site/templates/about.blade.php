@php
    /**
     * @var Kirby\Cms\App $kirby
     * @var Kirby\Cms\Page $page
     * @var Kirby\Cms\Site $site
     */
@endphp
<x-layout>
@foreach($page->children()->listed() as $part)
@include('blocks.' . $part->intendedTemplate(), ['page' => $part])
@endforeach

<!-- Socios comerciales -->
@php
$logos = page('home')->children()->find('socios-comerciales');
@endphp
<section class="mx-auto py-20 px-5 text-center md:space-y-10">
    <x-text.h2 id="carousel-heading" class="text-center mx-auto">{{ $logos->headline() }}</x-text.h2>
    <div class="splide splide-auto py-20" aria-labelledby="carousel-heading">
        <div class="splide__track">
                <ul class="splide__list items-center">
                    @foreach ($logos->logos()->toFiles() as $logo)
                        <li class="splide__slide">
                            <img class="h-20 px-5 mx-auto" src="{{ $logo->url() }}" alt="{{ $logo->alt() }}">    
                        </li>                    
                    @endforeach
                </ul>
        </div>
    </div>
</section>

<!-- Llamado a la accion -->
@php
$item = page('home')->children()->find('llamado-a-la-accion');
@endphp
<section class="bg-red-600 py-20 transform text-white text-center hover:bg-red-500 transition duration-300 ease-in-out hover:scale-110">
    <div class="max-w-4xl mx-auto space-y-5">
        <x-text.h2>{{ $item->headline() }}</x-text.h2>
        <p class="text-lg text-white" 
        data-aos="fade-up"
        data-aos-duration="500">
        @kt($item->text())
        </p>
        <div class="pt-10" 
        data-aos="fade-up"
        data-aos-duration="700">
            <a href="{{ $item->buttonLink() }}" class="bg-white py-3 px-5 rounded-md hover:bg-gray-100 transition duration-300 ease-in-out text-red-600">{{ $item->buttonText() }}</a>
        </div>
    </div>
</section>

</x-layout>
