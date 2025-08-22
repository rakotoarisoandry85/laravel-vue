<!-- resources/js/components/layouts/Navbar.vue -->
<template>
  <nav class="bg-blue-600 text-white p-4 fixed top-0 left-0 right-0 flex items-center justify-between px-6 md:px-16  z-[10000] ">
    <div class="container mx-auto flex justify-between">
      <!-- <div class="font-bold text-xl">Mon App</div> -->

      <a to="/" class="font-bold text-xl">Logo
      </a>
                <!-- Mobile menu button -->
                <div @click="toggleNav" class="flex md:hidden">
                    <button type="button"
                        class="text-gray-100 hover:text-gray-400 focus:outline-none focus:text-gray-400">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>



      <ul :class="showMenu ? 'flex' : 'hidden'" class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
        <li><a  href="/"
                class="btn btn-sm relative cursor-pointer text-pink-100 after:block after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-[2px] after:bg-pink-100 after:transition-all after:duration-300 hover:after:w-full">Accueil</a></li>
        <li><a href="/users/create" class="btn btn-sm relative cursor-pointer text-pink-100 after:block after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-[2px] after:bg-pink-100 after:transition-all after:duration-300 hover:after:w-full">Utilisateurs</a></li>
        <li><a href="/products" class="btn btn-sm relative cursor-pointer text-pink-100 after:block after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-[2px] after:bg-pink-100 after:transition-all after:duration-300 hover:after:w-full">Produits</a></li>
      </ul>
    </div>
  </nav>
</template>

<script>
import { ref } from "vue";
export default {
    setup() {
        let showMenu = ref(false);
        const toggleNav = () => (showMenu.value = !showMenu.value);
        return { showMenu, toggleNav };
    },
};
</script>
