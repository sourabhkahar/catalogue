<x-app-layout>
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <div class="grid grid-cols-1">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Create Catalog
                    </h3>
                </div>
                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <form action="{{ route('catalog.store') }}" method="POST">
                        @csrf
                        <div class="grid md:grid-cols-2 grid-cols-1 gap-y-4 gap-x-4">
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
        
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-y-4 gap-x-4">
                                <div>
                                    <x-input-label for="layout_type" :value="__('Layout Type')" />
                                    <div class="flex">
                                        <x-radio-input id="layout_grid"  name="layout_type" label="Grid" class="mr-4" value="grid" />
                                        <x-radio-input id="layout_list"  name="layout_type" label="List" class="mr-4" value="list"/>
                                        <x-radio-input id="layout_magazine"  name="layout_type" label="Magazine" class="mr-4" value="magazine"/>
                                    </div>
                                    <x-input-error :messages="$errors->get('layout_type')" class="mt-2" />
                                </div>
                            </div>
                            
                        </div>

                        <div class="grid md:grid-cols-2 grid-cols-1 gap-y-4 gap-x-4">
                            <div class="">
                                <x-color-picker name="brand_color" label="Brand Color" />
                                <x-input-error :messages="$errors->get('brand_color')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-textarea-input id="description" name="description" rows="6" type="text" />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>
                         <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>