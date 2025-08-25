@php
    /**
     * @var Kirby\Cms\Page $page
     */
@endphp

<x-layout>
<section class="max-w-6xl mx-auto py-20 px-5 grid grid-cols-1 md:grid-cols-2 gap-20 mt-20">
  <div class="splide-gallery">
    <!-- Slider principal -->
    <div id="main-slider" class="splide" aria-label="Galería principal" aria-labelledby="carousel-heading">
      <div class="splide__track">
        <ul class="splide__list">
          @foreach ($page->gallery()->toFiles() as $image)
            <li class="splide__slide">
              <picture>
                <source srcset="{{ $image->thumb(['format' => 'webp', 'width' => 600, 'height' => 600, 'crop' => 'center'])->url() }}" type="image/webp">
                <img src="{{ $image->crop(600, 600)->url() }}" alt="{{ $page->title() }}">
              </picture>
              <div class="bg-red-600 text-white text-center p-2 item font-semibold">{{ $image->alt() }}</div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    <!-- Thumbnails -->
    <div id="thumbnail-slider" class="splide mt-4" aria-label="Miniaturas">
      <div class="splide__track">
        <ul class="splide__list">
          @foreach ($page->gallery()->toFiles() as $image)
            <li class="splide__slide">
              <picture>
                <source srcset="{{ $image->thumb(['format' => 'webp', 'width' => 104, 'height' => 58, 'crop' => 'center'])->url() }}" type="image/webp">
                <img src="{{ $image->thumb(['width' => 104, 'height' => 58, 'crop' => 'center'])->url() }}" alt="{{ $page->title() }}">
              </picture>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <div class="space-y-5">
    <h1 class="text-2xl md:text-5xl font-bold mb-5 text-gray-700 dark:text-white" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">{{ $page->title() }}</h1>
    <x-text.lg class="pb-5" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">@kt($page->description())</x-text.lg>
    {{-- Botón dinámico según método de contacto --}}
    @if ($page->contact_method()->isNotEmpty())
        @if ($page->contact_method()->value() === 'email' && $page->contact_email()->isNotEmpty())
            <x-buttons.principal 
                :href="'mailto:' . $page->contact_email() . '?subject=' . urlencode($kirby->language()->code() === 'es' ? 'Solicitud de información sobre ' . $page->title() : 'Information request about ' . $page->title())" 
                :text="$kirby->language()->code() === 'es' ? 'Solicitar información' : 'Inquire Information'" 
                target="_blank" 
                rel="noopener noreferrer"
                data-aos="fade-up" data-aos-duration="500" data-aos-delay="700" 
            />
        @elseif ($page->contact_method()->value() === 'whatsapp' && $page->contact_whatsapp()->isNotEmpty())
            <x-buttons.principal 
                :href="'https://wa.me/' . preg_replace('/\D/', '', $page->contact_whatsapp()) . '?text=' . urlencode($kirby->language()->code() === 'es' ? 'Hola, quiero más información sobre este producto: ' . $page->title() : 'Hello, I would like more information about this product: ' . $page->title())" 
                :text="$kirby->language()->code() === 'es' ? 'Solicitar información por WhatsApp' : 'Request via WhatsApp'" 
                :aria-label="$kirby->language()->code() === 'es' ? 'Solicitar información por WhatsApp' : 'Request via WhatsApp'"
                target="_blank" 
                rel="noopener noreferrer"
                data-aos="fade-up" data-aos-duration="500" data-aos-delay="700" 
            />
        @endif
    @endif
        <div class="py-3"></div>
    @foreach ($page->extra()->toStructure() as $item)
        <div x-data="{ open: false }" class="border-b border-gray-200 dark:border-gray-700" data-aos="fade-up" data-aos-duration="500" data-aos-delay="1000">
            <!-- Título -->
            <button 
                @click="open = !open" 
                x-cloak
                class="flex justify-between items-center w-full py-4 text-left"
                data-aos="fade-up" 
                data-aos-duration="500" 
                data-aos-delay="100"
            >
                <h2 class="text-xl font-bold text-gray-700 dark:text-white">
                    {{ $item->title() }}
                </h2>
                <!-- Icono chevron -->
                <svg 
                    :class="{ 'rotate-180': open }" 
                    class="w-5 h-5 text-gray-500 transition-transform duration-300" 
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24" 
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Contenido -->
            <div 
                x-show="open" 
                x-collapse 
                class="pb-5"
                data-aos="fade-up" 
                data-aos-duration="500" 
                data-aos-delay="500"
            >
                <x-text.lg>
                    @kt($item->text())
                </x-text.lg>
            </div>
        </div>
    @endforeach
  </div>
</section>

</x-layout>
