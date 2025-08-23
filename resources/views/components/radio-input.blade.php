@props(['id' => 'checkbox-'.uniqid(), 'label' => 'Default', 'name' => '','value' => '#000000'])

<label for="{{ $id }}"
    {{ $attributes->merge([
        'class' => 'flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400'
    ]) }}>
    <div class="relative">
        <input
            type="radio"
            id="{{ $id }}"
            name="{{ $name }}"
            class="peer sr-only"
            value="{{ old($name, $value) }}"
        />
        <div
            class="mr-3 flex h-5 w-5 items-center justify-center rounded-full border-[1.25px] 
                   border-gray-300 dark:border-gray-700 hover:border-brand-500 dark:hover:border-brand-500
                   peer-checked:border-brand-500 peer-checked:bg-brand-500">
            <span class="h-2 w-2 rounded-full bg-white dark:bg-[#171f2e] peer-checked:bg-white"></span>
        </div>
    </div>
    {{ $label }}
</label>
