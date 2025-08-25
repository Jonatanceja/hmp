<section class="max-w-4xl mx-auto px-5 py-20 space-y-5 text-center">
    <x-text.h2>{{ $page->headline() }}</x-text.h2>
    <div data-aos="fade-up"
    data-aos-duration="500">
        <x-text.lg>@kt($page->text())</x-text.lg>
    </div>
    <div class="pt-10" data-aos="fade-up"
    data-aos-duration="700">
        <x-buttons.principal
        :href="$page->buttonLink()->toUrl()" 
        :text="$page->buttonText()" 
        :aria-label="$page->buttonText()"
        />
    </div>
</section>