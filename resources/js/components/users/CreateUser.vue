<template>
    <div class="w-full max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nom de l'utilisateur</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="formData.name" type="text" id="nameUser">
<!--
            <template
                v-if="errors.name"
            >
                <span style="color: red;" v-text="errors.name[0]" ></span>
            </template> -->
        </div>

        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email de l'utilisateur</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="formData.email" type="email" id="email">

        <!-- <template
            v-if="errors.email"
        >
            <span style="color: red;" v-text="errors.email[0]" ></span>
        </template> -->

        <br>
        <br>

        <label class="block text-gray-700 text-sm font-bold mb-2" for="avatar">Avatar</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="formData.avatar" type="text" id="avatar">


        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Mot de passe</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  v-model="formData.password" type="password" id="password">

        <!-- <template
            v-if="errors.password"
        >
            <span style="color: red;" v-text="errors.password[0]" ></span>
        </template>

        <template
            v-if="errors.avatar"
        >
            <span style="color: red;" v-text="errors.avatar[0]" ></span>
        </template> -->

        <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">Confirmation</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="formData.password_confirmation" type="password" id="password_confirmation">

        <button  class="inline-flex items-center mt-3 py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button" v-on:click="createUserAction">
            Créer un nouvel utilisateur
        </button>
        </form>


    </div>

</template>

<script setup>
import {ref} from "vue";
import useUser from "../../composables/users/useUser";

const {
    errors,
    createUser,
} = useUser();

const formData = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    avatar:'',
});

const createUserAction = async () => {
    console.log("creation...",formData.value);
    await createUser(formData.value);
}
</script>
