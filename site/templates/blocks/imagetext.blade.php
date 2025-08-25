<section class="py-20">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center px-5 md:px-0">

        <!-- Texto -->
        <div class="{{ $page->disposition()->toBool() ? 'md:order-1' : 'md:order-2' }} space-y-5">
            <x-text.h2>{{ $page->headline() }}</x-text.h2>
            <x-text.lg data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                @kt($page->text())
            </x-text.lg>
        </div>

        <!-- Imagen -->
        <div class="{{ $page->disposition()->toBool() ? 'md:order-2' : 'md:order-1' }}">
            @if ($image = $page->pic()->toFile())
            <picture>
                <source srcset="{{ $image->thumb(['format' => 'webp', 'width' => 600, 'height' => 600, 'crop' => 'center'])->url() }}" type="image/webp">
                <img src="{{ $image->crop(600, 600)->url() }}" alt="{{ $page->headline() }}" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" alt="{{ $page->headline() }}">
            </picture>
            @endif
        </div>

    </div>
</section>