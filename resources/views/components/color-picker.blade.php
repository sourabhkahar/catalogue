@props([
    'id' => 'color-'.uniqid(),
    'label' => 'Choose Color',
    'name' => 'color',
    'value' => '#000000',
    'colors' => [] // default palette '#000000','#FFFFFF','#FF0000','#00FF00','#0000FF','#FFD700','#FF69B4','#4B0082'
])

<div class="mb-4">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
        {{ $label }}
    </label>

    <div class="flex items-center gap-3">
        <!-- Manual input -->
        <input
            type="text"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            placeholder="#FFFFFF"
            oninput="this.nextElementSibling.value=this.value"
        />

        <!-- Native color input -->
        <input
            type="color"
            value="{{ $value }}"
            class="h-10 w-10 p-0 border border-gray-300 rounded cursor-pointer"
            oninput="this.previousElementSibling.value=this.value"
        />
    </div>

    <!-- Custom palette -->
    <div class="flex flex-wrap gap-2 mt-3">
        @foreach($colors as $c)
            <button
                type="button"
                class="h-8 w-8 rounded border border-gray-300"
                style="background-color: {{ $c }}"
                onclick="document.getElementById('{{ $id }}').value='{{ $c }}'; this.closest('div').querySelector('input[type=color]').value='{{ $c }}';"
            ></button>
        @endforeach
    </div>
</div>
