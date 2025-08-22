@props(['value'])

<label {{ $attributes->merge(['class' => 'mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400']) }}>
    {{ $value ?? $slot }}
</label>
