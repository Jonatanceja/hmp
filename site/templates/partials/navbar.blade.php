@php
    $site = site();
@endphp
<nav x-data="{ mobileMenuIsOpen: false, isVisible: true, lastScrollY: 0 }"
  @scroll.window="if (window.scrollY > lastScrollY && window.scrollY > 100) { isVisible = false } else { isVisible = true; } lastScrollY = window.scrollY"
  :class="{'translate-y-0': isVisible, '-translate-y-full': !isVisible}"
  class="nightwind-prevent-block fixed top-0 left-0 right-0 z-20 flex items-center justify-between w-full p-4 transition-transform duration-300 ease-in-out bg-white shadow-sm"
  aria-label="main menu">

  <!-- Brand Logo -->
  <a href="{{ site()->url() }}" class="text-2xl font-bold text-neutral-900 nightwind-prevent" aria-label="{{ site()->title() }}">
    <img class="w-56" src="{{ url('/images/hmp-logo.svg') }}" alt="{{ site()->title() }}">
  </a>
  <!-- End Brand Logo -->

  <div id="items" class="flex items-center">
    <!-- === Idioma Escritorio === -->
    <div class="pr-4 md:pr-8">
        @foreach (kirby()->languages() as $language)
            @if ($language->code() != kirby()->language()->code())
                <a href="{{ page()->url($language->code()) }}" 
                   class="text-red-600 border-2 border-red-600 rounded-md px-3 py-1 text-sm transition-colors bg-white hover:bg-red-600 hover:text-white"
                   aria-label="Cambiar idioma">
                    {{ strtoupper($language->code()) }}
                </a>
            @endif
        @endforeach
    </div>
    <!-- === End Idioma Escritorio === -->

    <!-- Mobile Menu Button -->
    <button @click="mobileMenuIsOpen = !mobileMenuIsOpen"
          :aria-expanded="mobileMenuIsOpen"
          type="button"
          class="border-2 border-red-600 rounded-full text-red-600 p-2 cursor-pointer bg-white hover:bg-red-50 transition duration-300 ease-in-out flex"
          aria-label="mobile menu"
          aria-controls="mobileMenu">
          <svg 
              x-show="!mobileMenuIsOpen"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              aria-hidden="true"
              viewBox="0 0 24 24"
              stroke-width="2"
              stroke="currentColor"
              class="size-8">
              <path d="M12 17H19M5 12H19M5 7H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <svg x-cloak
              x-show="mobileMenuIsOpen"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              aria-hidden="true"
              viewBox="0 0 24 24"
              stroke-width="2"
              stroke="currentColor"
              class="size-8">
              <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18 18 6M6 6l12 12" />
          </svg>
      </button>
  </div>

  <!-- Mobile Menu -->
  <template x-teleport="body">
    <div x-show="mobileMenuIsOpen" @keydown.window.escape="mobileMenuIsOpen=false" class="relative z-[99]">
      <div x-show="mobileMenuIsOpen" x-transition.opacity.duration.600ms @click="mobileMenuIsOpen = false"
        class="fixed inset-0 bg-gray-800/80"></div>
      <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
          <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
            <div x-show="mobileMenuIsOpen" @click.away="mobileMenuIsOpen = false"
              x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
              x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
              x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
              x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
              class="w-screen max-w-md">
              <div class="flex flex-col h-full py-5 overflow-y-scroll bg-gray-800 shadow-lg">
                <div class="px-4 sm:px-5">
                  <div class="flex items-start justify-between pb-1">
                    <div class="flex items-center h-auto ml-3">
                      <button @click="mobileMenuIsOpen=false"
                            class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 text-white cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                aria-hidden="true"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                class="size-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                  </div>
                </div>

                <div class="relative flex-row px-4 mt-5 sm:px-5 h-screen">
                    <div class="h-full flex flex-row items-center justify-center">
                        <div class="space-y-10">
                            <ul class="space-y-5">
                              @foreach ($site->children()->listed() as $item)
                                  <li>
                                      <a href="{{ $item->url() }}" class="text-white font-bold uppercase text-lg block py-2 item hover:text-red-400 transition duration-300 ease-in-out" aria-label="{{ $item->title() }}">
                                          {{ $item->title() }}
                                      </a>

                                      {{-- Submenú solo si es la página "products" y muestra solo hijos con template "product" --}}
                                      @if ($item->intendedTemplate()->name() === 'products' && $item->children()->listed()->filterBy('intendedTemplate', 'product')->isNotEmpty())
                                          <ul class="ml-4 mt-2 space-y-2">
                                              @foreach ($item->children()->listed()->filterBy('intendedTemplate', 'product') as $child)
                                                  <li>
                                                      <a href="{{ $child->url() }}" class="text-white uppercase text-sm block py-1 hover:text-red-400 item">
                                                          {{ $child->title() }}
                                                      </a>
                                                  </li>
                                              @endforeach
                                          </ul>
                                      @endif
                                  </li>
                              @endforeach
                          </ul>

                            <div class="flex space-x-5">
                                <a class="text-white text-4xl hover:text-red-400 transition duration-300 ease-in-out" href="{{ site()->facebook() }}"><i class="lni lni-facebook-square"></i></a>
                                <a class="text-white text-4xl hover:text-red-400 transition duration-300 ease-in-out" href="{{ site()->linkedin() }}"><i class="lni lni-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
</nav>
