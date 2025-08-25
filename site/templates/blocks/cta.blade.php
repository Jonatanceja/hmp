<section class="bg-red-600 py-20 transform text-white text-center hover:bg-red-500 transition duration-300 ease-in-out md:hover:scale-110 px-10">
    <div class="max-w-4xl mx-auto space-y-5">
        <x-text.h2>{{ $page->headline() }}</x-text.h2>
        <p class="text-lg text-white" 
        data-aos="fade-up"
        data-aos-duration="500">
        @kt($page->text())
        </p>
        <div class="pt-10" 
        data-aos="fade-up"
        data-aos-duration="700"
        aria-label="{{ $page->buttonText() }}">
            <a href="{{ $page->buttonLink()->toUrl() }}" class="bg-white py-3 px-5 rounded-md hover:bg-gray-100 transition duration-300 ease-in-out text-red-600">{{ $page->buttonText() }}</a>
        </div>
    </div>
</section>