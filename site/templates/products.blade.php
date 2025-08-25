@php
    /**
     * @var Kirby\Cms\App $kirby
     * @var Kirby\Cms\Page $page
     * @var Kirby\Cms\Site $site
     */

    $blockTemplates = ['cover'];
@endphp
<x-layout>
@foreach($page->children()->listed()->filter(function($child) use ($blockTemplates) {
    return in_array($child->intendedTemplate(), $blockTemplates);
}) as $part)
    @include('blocks.' . $part->intendedTemplate(), ['page' => $part])
@endforeach
<section class="max-w-6xl mx-auto py-20 px-5 text-center md:space-y-10 grid grid-cols-2 md:grid-cols-4 gap-10">
    @foreach ($page->children()->listed()->filterBy('intendedTemplate', 'product') as $product)
        <div class="relative group">
            <a href="{{ $product->url() }}" aria-label="{{ $product->title() }}">
                @if ($image = $product->gallery()->toFiles()->first())
                    <picture class="relative z-0">
                        <source srcset="{{ $image->thumb(['format' => 'webp', 'width' => 600, 'height' => 600, 'crop' => 'center'])->url() }}" type="image/webp">
                        <img src="{{ $image->url() }}" alt="{{ $product->title() }}">
                    </picture>                
                @endif
                <div class="absolute inset-0 flex items-center justify-center bg-red-600/0 md:group-hover:bg-red-600/60 transition duration-300 ease-in-out z-10">
                    <h2 
                        class="text-white text-xl opacity-0 translate-y-3 md:group-hover:opacity-100 md:group-hover:translate-y-0 transition duration-500 ease-out"
                    >
                        {{ $product->title() }}
                    </h2>
                </div>
            </a>
            <h2 class="text-white text-lg md:hidden block mt-3">{{ $product->title() }}</h2>
        </div>
    @endforeach
</section>
</x-layout>
