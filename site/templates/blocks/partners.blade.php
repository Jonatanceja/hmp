<section class="mx-auto py-20 px-5 text-center md:space-y-10"
role="region" 
aria-labelledby="carousel">
    <x-text.h2 id="carousel-heading" class="text-center mx-auto">{{ $page->headline() }}</x-text.h2>
    <div class="splide splide-auto py-20" aria-labelledby="carousel-heading">
        <div class="splide__track">
                <ul class="splide__list items-center">
                    @foreach ($page->logos()->toFiles() as $logo)
                        <li class="splide__slide">
                            <img 
                            class="h-20 px-5 mx-auto"
                            loading="lazy"
                            src="{{ $logo->url() }}" alt="{{ $logo->alt() }}">    
                        </li>                    
                    @endforeach
                </ul>
        </div>
    </div>
</section>

