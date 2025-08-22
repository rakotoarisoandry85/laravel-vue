<template>
    <div class="mt-16 w-72">
        <Combobox
            v-model="selected"
            @update:modelValue="id => emit('update:modelValue', id)"
        >
            <div class="relative mt-1">
                <div
                    class="relative w-full cursor-default overflow-hidden rounded-lg bg-white text-left shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-teal-300 sm:text-sm"
                >
                    <ComboboxInput
                        class="w-full border-none py-2 pl-3 pr-10 text-sm leading-5 text-gray-900 focus:outline-none"
                        :displayValue="() => selectedProductName"
                        @change="query = $event.target.value"
                    />
                    <ComboboxButton
                        class="absolute inset-y-0 right-0 flex items-center pr-2"
                    >
                        <ChevronUpDownIcon
                            class="h-5 w-5 text-gray-400"
                            aria-hidden="true"
                        />
                    </ComboboxButton>
                </div>
                <TransitionRoot
                    leave="transition ease-in duration-100"
                    leaveFrom="opacity-100"
                    leaveTo="opacity-0"
                    @after-leave="query = ''"
                >
                    <ComboboxOptions
                        class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                    >
                        <div
                            v-if="filteredProducts.length === 0 && query !== ''"
                            class="relative cursor-default select-none py-2 px-4 text-gray-700"
                        >
                            Nothing found.
                        </div>

                        <ComboboxOption
                            v-for="product in filteredProducts"
                            as="template"
                            :key="product.id"
                            :value="product.id"
                            v-slot="{ selected, active }"
                        >
                            <li
                                class="relative cursor-default select-none py-2 pl-10 pr-4"
                                :class="{
                  'bg-teal-600 text-white': active,
                  'text-gray-900': !active,
                }"
                            >
                <span
                    class="block truncate"
                    :class="{ 'font-medium': selected, 'font-normal': !selected }"
                >
                  {{ product.name_product }}
                </span>
                                <span
                                    v-if="selected"
                                    class="absolute inset-y-0 left-0 flex items-center pl-3"
                                    :class="{ 'text-white': active, 'text-teal-600': !active }"
                                >
                  <CheckIcon class="h-5 w-5" aria-hidden="true" />
                </span>
                            </li>
                        </ComboboxOption>
                    </ComboboxOptions>
                </TransitionRoot>
            </div>
        </Combobox>

        <input type="text" v-model="query" class="mt-2 w-full p-2 border rounded" placeholder="Search products..." />
    </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import {
    Combobox,
    ComboboxInput,
    ComboboxButton,
    ComboboxOptions,
    ComboboxOption,
    TransitionRoot,
} from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import { ProductType } from '../../types/products/ProductType';

const props = defineProps<{
    products: Array<ProductType>,
}>();



const emit = defineEmits<{
    (e: 'update:modelValue', id: number): void
}>();
console.log("props.product...........",props.products)
let selected = ref(props.products[0].id)
let query = ref('')

const selectedProductName = computed((): string => props.products.find((product: ProductType) => product.id === selected.value)?.name_product);

let filteredProducts = computed((): Array<ProductType> =>
    query.value === ''
        ? props.products
        : props.products.filter((product: ProductType): boolean =>
            product.name_product
                .toLowerCase()
                .replace(/\s+/g, '')
                .includes(query.value.toLowerCase().replace(/\s+/g, ''))
        )
)
</script>
