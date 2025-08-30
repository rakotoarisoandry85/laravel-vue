<template>
  <!-- SELECT PRODUCT FROM BD MYSQL -->
  <div class="flex space-x-12 space-y-4" v-if="!loading">
    <!-- COMPOSANT ProductsSelect -->
    <products-select
      v-if="products.length !== 0"
      :products="products"
      @update:modelValue="(id: number) => handleUpdateId(id)"
    />
    <!-- FIN COMPOSANT -->
    <a
      v-if="product"
      href="#"
      class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
    >
      <h5
        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
      >
        {{ product.name_product }}
      </h5>
      <img
        class="w-20 h-22 ml-28 outline-1 -outline-offset-1 outline-black/5 object-cover rounded-t-lg mb-3"
        :src="product.image"
        alt="Image du produit"
      />
      <p class="font-normal text-gray-700 dark:text-gray-400">
        {{ product.description }}
      </p>
      <p class="font-normal text-gray-700 dark:text-gray-400">
        <span class="font-bold">Prix:</span> {{ product.detail_price }} Ar
      </p>
      <p class="font-normal text-gray-700 dark:text-gray-400">
        <span class="font-bold">Prix de gros:</span>
        {{ product.wholesale_price }} Ar
      </p>
    </a>
  </div>

  <!-- GRILLE DE PRODUITS -->
  <div v-if="!loading && products.length > 0" class="grid grid-cols-4 mt-5 gap-5">
    <div
      v-for="product in products"
      :key="product.id"
      class="card w-full p-5 rounded-md bg-white dark:bg-gray-800"
    >
      <div class="wrapper-button w-full box-border mt-4">
        <div
          class="card max-w-sm bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700 shadow-md hover:shadow-xl transition-shadow duration-300"
        >
          <a href="#">
            <img
              class="w-full h-48 object-cover rounded-t-lg"
              :src="product.image"
              alt="Image du produit"
            />
          </a>
          <div class="p-5">
            <a href="#">
              <h5
                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
              >
                {{ product.name_product.length > 20
                  ? product.name_product.substring(0, 20) + "..."
                  : product.name_product }}
              </h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
              {{ product.description.length > 35
                ? product.description.substring(0, 35) + "..."
                : product.description }}
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

  <!-- LOADER -->
  <div v-if="loading" class="flex justify-center item-center h-[200px] ">
    <div class="loader"></div>
  </div>

</template>

<script setup lang="ts">
import { ref } from "vue";
import useProduct from "../../composables/products/useProduct";
import axios from "axios";

const { product, showProduct } = useProduct();

const products = ref<any[]>([]);
const loading = ref(true); // nouvel état pour loader
const URL = "/api/products";

const loadProductsFromServer = async () => {
  loading.value = true;
  await axios
    .get(URL)
    .then((res) => {
      console.log("NB==>", res.data.collects);
      products.value = res.data.data;
    })
    .catch((err) => console.log("Erreur==>", err))
    .finally(() => {
      loading.value = false; // désactive le loader quand la requête est finie
    });
};

const loadProductsApiFromServer = async () => {
  loading.value = true;
  await axios
    .get("https://fakestoreapi.com/products")
    .then((res) => {
      products.value = res.data;
    })
    .catch((err) => console.log("Erreur==>", err))
    .finally(() => {
      loading.value = false;
    });
};

loadProductsFromServer();
// loadProductsApiFromServer();

const handleUpdateId = async (id: number): Promise<void> => {
  await showProduct(id);
};
</script>

<style scoped>
.card {
  transition: transform 0.4s ease-in-out;
}
.card:hover {
  transform: scale(1.05) translateZ(0);
}

.loader {
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid rgba(32, 92, 195, 1);
    border-bottom: 16px solid rgb(113, 32, 195);
    width: 140px;
    height: 140px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
    position:relative;
    top:70%;
    left:1%;
    z-index: 10;
  }

  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
</style>
