<template>

<div class="flex space-x-5">
    <!-- COMPOSANT ProductsSelect -->
        <products-select
            v-if="products.length !== 0"

            :products="products"

            @update:modelValue="(id: number) => handleUpdateId(id)"
        />
    <!-- FIN COMPOSANT -->
        <a v-if="product" href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ product.name_product }}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ product.description }}</p>
            <p class="font-normal text-gray-700 dark:text-gray-400"><span class="font-bold">Prix:</span> {{ product.detail_price }} Ar</p>
            <p class="font-normal text-gray-700 dark:text-gray-400"><span class="font-bold">Prix de gros:</span>  {{ product.wholesale_price }} Ar</p>
        </a>

</div>

  <div class="grid grid-cols-4 mt-5 gap-5">
    <div
      v-for="product in products"
      :key="product.id"
      class="card w-full p-5 rounded-md bg-white dark:bg-gray-800"
    >
      <h2 class="dark:text-gray-200">{{ product.name_product }}</h2>

      <div class="wrapper-button w-full box-border mt-4">
        <div
          class="card max-w-sm bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700"
        >
          <a href="#">
            <img
              class="rounded-t-lg"
              :src= "`https://flowbite.com/docs/images/blog/image-${product.id}.jpg`"
              alt="Image du produit"
            />
          </a>
          <div class="p-5">
            <a href="#">
              <h5
                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
              >
                {{ product.name_product }}
              </h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ product.description.length>35?
                    product.description.substring(0,35) +'...'
                :
                    product.description
                }}
            </p>
            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">
              Prix : {{ product.detail_price }} €
            </p>
            <a
              href="#"
              class="inline-flex items-center mt-3 py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              Lire plus
              <svg
                class="ml-2 -mr-1 w-4 h-4"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script setup lang="ts">
    import {ref} from "vue";
    import useProduct from "../../composables/products/useProduct";
    import axios from "axios";

    const {
        product,
        showProduct,
    } = useProduct();

    const products = ref([]);

    const loadFromServer = async () => {
        await axios.get('/api/products')
            .then((res) => {
                 console.log(res);
                products.value = res.data.data})
            .catch((err) => console.log( 'LAsa ato==>',err));
    }

    loadFromServer();

    const handleUpdateId = async (
        id: number
    ): Promise<void> => {
        await showProduct(id);
    }


</script>
