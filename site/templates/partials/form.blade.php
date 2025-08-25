            {{-- Mensajes de éxito --}}
            @if ($success)
                <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                    ¡Gracias! Tu mensaje ha sido enviado con éxito.
                </div>
            @endif

            {{-- Mensajes de error --}}
            @if ($alert)
                <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                    <ul class="list-disc pl-5">
                        @foreach ($alert as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario --}}
            <form class="bg-gray-100 dark:bg-gray-900 shadow-2xl p-10 rounded-lg" method="POST" action="{{ $page->url() }}" class="space-y-5">
                <div class="pb-5 text-sm text-gray-700 dark:text-gray-400">@kt($page->advice())</div>
                <div class="">
                    @if ($kirby->language()->code() == 'es')
                        <x-form.input 
                            name="name" 
                            label="Nombre*" 
                            :value="$data['name'] ?? ''"
                        />                           
                    @else
                        <x-form.input 
                            name="name" 
                            label="Name*" 
                            :value="$data['name'] ?? ''"
                        /> 
                    @endif
                </div>

                <div>
                    @if ($kirby->language()->code() == 'es')
                    <x-form.input 
                        type="email" 
                        name="email" 
                        label="Correo*" 
                        :value="$data['email'] ?? ''"
                    />
                    @else
                    <x-form.input 
                        type="email" 
                        name="email" 
                        label="Email*" 
                        :value="$data['email'] ?? ''"
                    />
                    @endif
                </div>

                <div>
                    @if ($kirby->language()->code() == 'es')
                    <x-form.input 
                        type="tel" 
                        name="telefono" 
                        label="Teléfono*" 
                        :value="$data['telefono'] ?? ''"
                    />
                    @else
                    <x-form.input 
                        type="tel" 
                        name="telefono" 
                        label="Phone*" 
                        :value="$data['telefono'] ?? ''"
                    />
                    @endif
                </div>

                <div>
                    @if ($kirby->language()->code() == 'es')
                    <x-form.input 
                        type="text" 
                        name="empresa" 
                        label="Empresa*" 
                        :value="$data['empresa'] ?? ''"
                    />
                    @else
                    <x-form.input 
                        type="text" 
                        name="empresa" 
                        label="Company*" 
                        :value="$data['empresa'] ?? ''"
                    />
                    @endif
                </div>

                <div>
                    @if ($kirby->language()->code() == 'es')
                    <x-form.label>Deseo que me contacten a través de:*</x-form.label>
                    @else
                    <x-form.label>Contact me through:*</x-form.label>
                    @endif
                    <select name="contact" id="contact" class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 mb-4 bg-white dark:bg-gray-100 text-gray-500">
                        @if ($kirby->language()->code() == 'es')
                        <option value="email">Correo electrónico</option>
                        <option value="telefono">Teléfono</option>
                        <option value="whatsapp">WhatsApp</option>
                        @else
                        <option value="email">Email</option>
                        <option value="telefono">Phone</option>
                        <option value="whatsapp">WhatsApp</option>
                        @endif
                    </select>
                </div>
                @if ($page->terms()->isNotEmpty())
                    @if ($kirby->language()->code() == 'es')
                    <p class="text-sm text-gray-700 dark:text-gray-400 py-3">Al enviar este formulario aceptas que tus datos serán tratados de acuerdo con nuestras <a href="{{ $page->terms()->toUrl() }}" class="text-red-600">políticas de privacidad</a> </p>
                    @else
                    <p class="text-sm text-gray-700 dark:text-gray-400 py-3">By submitting this form you agree to our <a href="{{ $page->terms()->toUrl() }}" class="text-red-600">privacy policies</a> </p>
                    @endif                   
                @endif
                <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                @if ($kirby->language()->code() == 'es')
                <button 
                    type="submit"
                    class="bg-red-600 py-3 px-5 rounded-md hover:bg-red-700 transition duration-300 ease-in-out text-white mt-5 cursor-pointer"
                >
                    Enviar
                </button>
                @else
                <button 
                    type="submit"
                    class="bg-red-600 py-3 px-5 rounded-md hover:bg-red-700 transition duration-300 ease-in-out text-white mt-5 cursor-pointer"
                >
                    Send
                </button>
                @endif
            </form>
