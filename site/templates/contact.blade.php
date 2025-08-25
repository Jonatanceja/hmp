@php
    /**
     * @var Kirby\Cms\App $kirby
     * @var Kirby\Cms\Page $page
     * @var Kirby\Cms\Site $site
     */
@endphp
<x-layout>
    @foreach($page->children()->listed() as $part)
    @include('blocks.' . $part->intendedTemplate(), ['page' => $part])
    @endforeach
    <section class="max-w-6xl mx-auto px-5 py-20 space-y-10 grid grid-cols-1 md:grid-cols-2 gap-20">
        <div class="space-y-5">
            @include('partials.contactinfo')
        </div>
        <div class="">
            @include('partials.form')
        </div>
    </section>
</x-layout>
<script src="https://www.google.com/recaptcha/api.js?render=<?= env('RECAPTCHA_SITE_KEY') ?>"></script>
<script>
grecaptcha.ready(function() {
  grecaptcha.execute("<?= env('RECAPTCHA_SITE_KEY') ?>", {action: "contact_form"})
    .then(function(token) {
      document.getElementById("recaptcha_token").value = token;
    });
});
</script>
