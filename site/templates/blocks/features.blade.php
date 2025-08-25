<section class="max-w-6xl mx-auto px-5 py-20 text-center space-y-10">
    @if ($page->headline()->isNotEmpty())
    <x-text.h2>{{ $page->headline() }}</x-text.h2>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 text-left">
        @foreach ($page->features()->toStructure() as $item)        
            <div class="space-y-5 flex flex-row gap-5 items-start"
            data-aos="fade-up" 
                data-aos-delay="{{ 200 + ($loop->index * 200) }}"
                data-aos-duration="500">
            @if ($icon = $item->icon()->toFile())
                <img class="w-12" src="{{ $icon->url() }}" alt="{{ $item->headline() }}">
            @endif
            <div class="space-y-3">
                <h3 class="text-2xl font-bold text-gray-700 dark:text-white">{{ $item->headline() }}</h3>
                <div class="text-gray-600 dark:text-gray-400">@kt($item->text())</div>
                @if ($item->link()->isNotEmpty())
                    <a class="flex items-center gap-2 text-gray-200 hover:text-red-600 group w-auto pt-5" 
                        href="{{ $item->link()->toUrl() }}" aria-label="{{ $item->headline() }}">
                        @if ($kirby->language()->code() == 'es')
                            Ver más
                        @else
                            Watch more
                        @endif
                        <x-icons.arrow class="text-red-600 transform group-hover:translate-x-1 transition duration-300 ease-in-out" />
                    </a>
                @endif
            </div>
            </div>
        @endforeach
    </div>
</section>
