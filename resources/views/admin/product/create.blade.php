<x-app-layout>
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <div class="grid grid-cols-1">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Create Product
                    </h3>
                </div>
                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf
                        <div class="grid md:grid-cols-2 grid-cols-1 gap-y-4 gap-x-4 mb-4">
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>     
                            <div>
                                <x-input-label for="retail_price" :value="__('Retail price')" />
                                <x-text-input id="retail_price" class="block mt-1 w-full" type="number" name="retail_price" />
                                <x-input-error :messages="$errors->get('retail_price')" class="mt-2" />
                            </div>                        
                        </div>
                        <div class="grid md:grid-cols-2 grid-cols-1 gap-y-4 gap-x-4 mb-4">
                            <div>
                                <x-input-label for="trade_price" :value="__('Trade price')" />
                                <x-text-input id="trade_price" class="block mt-1 w-full" type="number" name="trade_price" />
                                <x-input-error :messages="$errors->get('trade_price')" class="mt-2" />
                            </div>  
                            <div>
                                <x-input-label for="saved_amount" :value="__('Saved price')" />
                                <div class="flex">
                                    <x-radio-input id="amount_virtual"  name="saved_amount" label="Virtual" class="mr-4" value="virtual" />
                                    <x-radio-input id="amount_generated"  name="saved_amount" label="Generated" class="mr-4" value="generated"/>
                                    <x-radio-input id="amount_stored"  name="saved_amount" label="Stored" class="mr-4" value="stored"/>
                                </div>
                                <x-input-error :messages="$errors->get('saved_amount')" class="mt-2" />
                            </div>                          
                        </div>
                        <div class="grid md:grid-cols-2 grid-cols-1 gap-y-4 gap-x-4 mb-4">
                            <div>
                                <x-input-label for="sku" :value="__('SKU')" />
                                <x-text-input id="sku" class="block mt-1 w-full" type="text" name="sku" />
                                <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                            </div> 
                            <div>
                                <x-input-label for="tag_id" :value="__('Tag')" />
                                <div class="flex">
                                    <x-select-input :options="$tags" name="tag_id"/>
                                </div>
                                <x-input-error :messages="$errors->get('tag_id')" class="mt-2" />
                            </div>                                
                        </div>
                          <div class="grid md:grid-cols-2 grid-cols-1 gap-y-4 gap-x-4">
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