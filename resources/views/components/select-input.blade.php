
@props(['options' => [],'name'=>'selectOption'])

<select
    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
    name="{{$name}}">
    <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" >
        Select Option
    </option>
    @foreach ($options as $item)
        <option value="{{$item['value']}}" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
            {{$item['label']}}
        </option>
    @endforeach
</select>
