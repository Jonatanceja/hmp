<section class="bg-red-600 py-16 md:py-34 items-center justify-center flex relative">
    <div class="max-w-6xl mx-auto space-y-10 mt-20 relative z-10">
        <h1 class="text-4xl md:text-8xl font-bold text-white uppercase text-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">{{ $page->parent()->title() }}</h1>
    </div>
    <div class="absolute inset-0 overflow-hidden">
        @if ($image = $page->cover()->toFile())
            <picture>
                <source srcset="{{ $image->thumb(['format' => 'webp'])->url() }}" type="image/webp">
                <img class="w-full h-full object-cover opacity-50 mix-blend-lighten" src="{{ $image->url() }}" alt="Portada">
            </picture>
        @endif
    </div>
</section>