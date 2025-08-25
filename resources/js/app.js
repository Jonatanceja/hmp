import './bootstrap';

// Uncomment if you need Alpine.js
import Alpine from 'alpinejs'
import example from './components/AlpineExample'
Alpine.data('example', example)
window.Alpine = Alpine
Alpine.start()

// Uncomment if you need Vue
// window.Vue = require('vue');
// Vue.component('example', require('./components/Example.vue').default);
// new Vue({
//     el: '#app'
// });

import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles
// ..
AOS.init({
  once: true // la animación solo ocurre una vez
});


import Splide from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

window.Splide = Splide;
window.AutoScroll = AutoScroll;

document.addEventListener('DOMContentLoaded', () => {

    // ===== Sliders AutoScroll =====
    document.querySelectorAll('.splide-auto').forEach(slider => {
        new Splide(slider, {
            type: 'loop',
            drag: 'free',
            focus: 'center',
            perPage: 4,
            autoScroll: { speed: 1 },
            breakpoints: { 640: { perPage: 2 } },
        }).mount({ AutoScroll });
    });

    // ===== Sliders con thumbnails =====
    document.querySelectorAll('.splide-gallery').forEach(gallery => {
        const mainSlider = gallery.querySelector('#main-slider');
        const thumbSlider = gallery.querySelector('#thumbnail-slider');

        if (mainSlider && thumbSlider) {
            const main = new Splide(mainSlider, {
                type: 'fade',
                rewind: true,
                pagination: false,
                arrows: true,
                cover: true,
            });

            const thumbs = new Splide(thumbSlider, {
                fixedWidth: 104,
                fixedHeight: 58,
                gap: 10,
                rewind: true,
                pagination: false,
                isNavigation: true,
                focus: 'center',
                cover: true,
                breakpoints: { 640: { fixedWidth: 66, fixedHeight: 38 } },
            });

            main.sync(thumbs);
            main.mount();
            thumbs.mount();
        }
    });

});
