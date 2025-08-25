<section class="bg-gray-800 text-white">
    <div class="mx-auto md:flex py-10 md:py-0 dark:border-b dark:border-t dark:border-gray-700">
        @foreach ($page->squares()->toStructure() as $item)
            <div class="w-full py-12 space-y-5 px-5 md:px-10 {{ $loop->last ? '' : 'border-r border-gray-700' }}"
                data-aos="fade-up" 
                data-aos-delay="{{ 200 + ($loop->index * 200) }}"
                data-aos-duration="500">
                @if ( $image = $item->icon()->toFile() )
                    <img class="h-8" src="{{ $image->url() }}" alt="{{ $item->title() }}">
                @endif
                <h3 class="uppercase text-xl">{{ $item->title() }}</h3>
                <div class="text-gray-400">@kt($item->text())</div>
            </div>
        @endforeach
    </div>
</section>