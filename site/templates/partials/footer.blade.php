<footer class="py-20 bg-gray-900">
    <div class="max-w-6xl mx-auto px-5">
        <div class="flex md:flex-row flex-col items-start pb-10 gap-10">
            <div class="text-gray-400 md:w-2/6 text-sm">
                <h4 class="text-white font-bold text-lg">{{ site()->title() }}</h4>
                <p class="text-gray-400 text-sm">{{ site()->description() }}</p>
            </div>
            <div class="space-y-3 md:w-1/6">
                @if (kirby()->language()->code() == 'es')
                <h4 class="text-white font-bold text-lg">Navegación</h4>
                @else
                <h4 class="text-white font-bold text-lg">Navigation</h4>
                @endif
                <ul>
                    @foreach (site()->children()->listed() as $item)
                    <li><a class="text-gray-400 hover:text-white" href="{{ $item->url() }}">{{ $item->title() }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="space-y-3 md:w-1/6">
                @if (kirby()->language()->code() == 'es')
                <h4 class="text-white font-bold text-lg">Dirección</h4>
                @else
                <h4 class="text-white font-bold text-lg">Address</h4>
                @endif
                <div class="flex gap-2">
                    <x-icons.mapmarker class="text-red-600 h-5" />
                    <p class="text-gray-400">{{ site()->address() }}</p>
                </div>
            </div>
            <div class="space-y-3 md:w-2/6">
                @if (kirby()->language()->code() == 'es')
                <h4 class="text-white font-bold text-lg">Contacto</h4>
                @else
                <h4 class="text-white font-bold text-lg">Contact</h4>
                @endif
                <a href="tel:{{ site()->phone() }}">
                    <div class="flex gap-2">
                        <x-icons.phone class="text-red-600 h-5" />
                        <p class="text-gray-400 hover:text-white">{{ site()->phone() }}</p>
                    </div>
                </a>
                <a href="mailto:{{ site()->email() }}">
                    <div class="flex gap-2">
                        <x-icons.mail class="text-red-600 h-5" />
                        <p class="text-gray-400 hover:text-white">{{ site()->email() }}</p>
                    </div>
                </a>
            </div>
        </div>
        @if (kirby()->language()->code() == 'es')
        <p class="text-sm text-center text-gray-500">© {{ date('Y') }} {{ site()->title() }}. Todos los derechos reservados.</p>
        @else
        <p class="text-sm text-center text-gray-500">© {{ date('Y') }} {{ site()->title() }}. All rights reserved.</p>
        @endif
    </div>
    <?php snippet('uniform-contact/js'); ?>
</footer>