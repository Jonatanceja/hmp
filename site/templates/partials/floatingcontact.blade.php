<div 
    x-data="{ open: false }" 
    class="fixed bottom-0 right-0 p-2 flex items-end justify-end w-24 h-24"
>
    <!-- Botón principal -->
    <button 
        @click="open = !open"
        class="text-white shadow-xl flex items-center justify-center p-3 rounded-full bg-gradient-to-r from-red-700 to-red-900 z-50 absolute cursor-pointer"
        aria-label="menu rápido"
    >
        <!-- Ícono original (visible cuando está cerrado) -->
        <svg x-show="!open" class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1266 22.1995C16.7081 22.5979 17.4463 23.0228 18.3121 23.3511C19.9903 23.9874 21.244 24.0245 21.8236 23.9917C23.1167 23.9184 23.2907 23.0987 22.5972 22.0816C21.8054 20.9202 21.0425 19.6077 21.1179 18.1551C22.306 16.3983 23 14.2788 23 12C23 5.92487 18.0751 1 12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C13.4578 23 14.8513 22.7159 16.1266 22.1995ZM12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C13.3697 21 14.6654 20.6947 15.825 20.1494C16.1635 19.9902 16.5626 20.0332 16.8594 20.261C17.3824 20.6624 18.1239 21.1407 19.0212 21.481C19.4111 21.6288 19.7674 21.7356 20.0856 21.8123C19.7532 21.2051 19.4167 20.4818 19.2616 19.8011C19.1018 19.0998 18.8622 17.8782 19.328 17.2262C20.3808 15.7531 21 13.9503 21 12C21 7.02944 16.9706 3 12 3ZM10 11C10 10.4477 10.4477 10 11 10H12C12.5523 10 13 10.4477 13 11V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V12C10.4477 12 10 11.5523 10 11ZM12 8.5C12.6904 8.5 13.25 7.94036 13.25 7.25C13.25 6.55964 12.6904 6 12 6C11.3096 6 10.75 6.55964 10.75 7.25C10.75 7.94036 11.3096 8.5 12 8.5Z" fill="currentColor"></path>
            </g>
        </svg>

        <!-- Ícono X (visible cuando está abierto) -->
        <svg x-show="open" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>

    <!-- Sub: WhatsApp -->
    <a 
        href="https://wa.me/52{{ site()->whatsapp() }}" 
        target="_blank"
        aria-label="whatsapp"
        class="absolute rounded-full transition-all duration-200 ease-out flex p-2 hover:p-3 bg-green-300 hover:bg-green-400 text-white"
        :class="open ? 'scale-100 -translate-x-16' : 'scale-0'"
    >
        <svg class="w-5 h-5 text-white" fill="currentColor" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.667 30.667"><path d="M30.667,14.939c0,8.25-6.74,14.938-15.056,14.938c-2.639,0-5.118-0.675-7.276-1.857L0,30.667l2.717-8.017 c-1.37-2.25-2.159-4.892-2.159-7.712C0.559,6.688,7.297,0,15.613,0C23.928,0.002,30.667,6.689,30.667,14.939z M15.61,2.382 c-6.979,0-12.656,5.634-12.656,12.56c0,2.748,0.896,5.292,2.411,7.362l-1.58,4.663l4.862-1.545c2,1.312,4.393,2.076,6.963,2.076 c6.979,0,12.658-5.633,12.658-12.559C28.27,8.016,22.59,2.382,15.61,2.382z M23.214,18.38c-0.094-0.151-0.34-0.243-0.708-0.427 c-0.367-0.184-2.184-1.069-2.521-1.189c-0.34-0.123-0.586-0.185-0.832,0.182c-0.243,0.367-0.951,1.191-1.168,1.437 c-0.215,0.245-0.43,0.276-0.799,0.095c-0.369-0.186-1.559-0.57-2.969-1.817c-1.097-0.972-1.838-2.169-2.052-2.536 c-0.217-0.366-0.022-0.564,0.161-0.746c0.165-0.165,0.369-0.428,0.554-0.643c0.185-0.213,0.246-0.364,0.369-0.609 c0.121-0.245,0.06-0.458-0.031-0.643c-0.092-0.184-0.829-1.984-1.138-2.717c-0.307-0.732-0.614-0.611-0.83-0.611 c-0.215,0-0.461-0.03-0.707-0.03S9.897,8.215,9.56,8.582s-1.291,1.252-1.291,3.054c0,1.804,1.321,3.543,1.506,3.787 c0.186,0.243,2.554,4.062,6.305,5.528c3.753,1.465,3.753,0.976,4.429,0.914c0.678-0.062,2.184-0.885,2.49-1.739 C23.307,19.268,23.307,18.533,23.214,18.38z"></path></svg>
    </a>

    <!-- Sub: Email -->
    <a 
        href="mailto:{{ site()->email() }}" 
        target="_blank"
        aria-label="email"
        class="absolute rounded-full transition-all duration-200 ease-out flex p-2 hover:p-3 bg-blue-300 hover:bg-blue-400 text-white"
        :class="open ? 'scale-100 -translate-y-16' : 'scale-0'"
    >
        <x-icons.mail class="text-white h-5 w-5" />
    </a>

    <!-- Sub: Phone -->
    <a 
        href="tel:{{ site()->phone() }}" 
        target="_blank"
        aria-label="phone"
        class="absolute rounded-full transition-all duration-200 ease-out flex p-2 hover:p-3 bg-yellow-300 hover:bg-yellow-400 text-white"
        :class="open ? 'scale-100 -translate-y-14 -translate-x-14' : 'scale-0'"
    >
        <x-icons.phone class="text-white h-5 w-5" />
    </a>
</div>
