<section class="bg-red-600 min-h-screen items-center justify-center flex relative">
    <div class="max-w-6xl mx-auto space-y-10 mt-20 relative z-10">
        <h1 class="text-4xl md:text-8xl font-bold text-white uppercase text-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">{{ $page->headline() }}</h1>
        <div class="flex items-center justify-center gap-10">
            @foreach ($page->buttons()->toStructure() as $button)
                <a href="{{ $button->link()->toUrl() }}" 
                class="group flex flex-col items-center transition duration-300 ease-in-out"
                aria-label="{{ $button->label() }}" 
                data-aos="fade-up" 
                data-aos-delay="{{ 200 + ($loop->index * 200) }}"
                data-aos-duration="500">
                
                    @if ($icon = $button->icon()->toFile())
                        <div class="bg-white p-5 rounded-full transform transition hover:scale-105 hover:shadow-2xl">
                            <img src="{{ $icon->url() }}" alt="{{ $button->label() }}">
                        </div>
                        <div 
                            class="md:opacity-0 translate-y-2 md:group-hover:opacity-100 md:group-hover:translate-y-0 transition-all duration-300 ease-in-out mt-2 text-white font-bold uppercase text-center">
                            {{ $button->label() }}
                        </div>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
    <div class="absolute inset-0 overflow-hidden">
        @if ($image = $page->cover()->toFile())
            <picture>
                <source srcset="{{ $image->thumb(['format' => 'webp'])->url() }}" type="image/webp">
                <img class="w-full h-full object-cover opacity-50 mix-blend-lighten" src="{{ $image->url() }}" alt="Portada" loading="lazy">
            </picture>
        @endif
    </div>
</section>