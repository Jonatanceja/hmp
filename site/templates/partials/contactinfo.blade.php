<x-text.h2>{{ $page->headline() }}</x-text.h2>
            <x-text.lg data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                @kt($page->text())
            </x-text.lg>
            <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                <a href="tel:{{ site()->phone() }}">
                    <div class="flex gap-2 py-2">
                        <x-icons.phone class="text-red-600 h-5" />
                        <p class="text-gray-700 dark:text-gray-400 hover:text-white">{{ site()->phone() }}</p>
                    </div>
                </a>
                <a href="mailto:{{ site()->email() }}">
                    <div class="flex gap-2 py-2">
                        <x-icons.mail class="text-red-600 h-5" />
                        <p class="text-gray-700 dark:text-gray-400 hover:text-white">{{ site()->email() }}</p>
                    </div>
                </a>
                <div class="flex gap-2 py-2">
                    <x-icons.mapmarker class="text-red-600 h-5" />
                    <p class="text-gray-700 dark:text-gray-400">{{ site()->address() }}</p>
                </div>
            </div>