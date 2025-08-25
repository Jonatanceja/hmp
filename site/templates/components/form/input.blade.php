@props([
    'type' => 'text',
    'name',
    'value' => '',
    'label' => null,
])

<div class="space-y-1">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-400 uppercase mb-2">
            {{ $label }}
        </label>
    @endif

    <input 
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value }}"
        {{ $attributes->merge(['class' => 'w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 mb-4 bg-white dark:bg-gray-100']) }}
    >
</div>
