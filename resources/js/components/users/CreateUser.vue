<template>
    <form>
        <label for="name">Nom de l'utilisateur</label>
        <input v-model="formData.name" type="text" id="name">

        <template
            v-if="errors.name"
        >
            <span style="color: red;" v-text="errors.name[0]" ></span>
        </template>

        <br>
        <br>

        <label for="email">Email de l'utilisateur</label>
        <input v-model="formData.email" type="email" id="email">

        <template
            v-if="errors.email"
        >
            <span style="color: red;" v-text="errors.email[0]" ></span>
        </template>

        <br>
        <br>

        <label for="password">Mot de passe</label>
        <input v-model="formData.password" type="password" id="password">
        <label for="avatar">Avatar</label>
        <input v-model="formData.avatar" type="text" id="avatar">

        <template
            v-if="errors.password"
        >
            <span style="color: red;" v-text="errors.password[0]" ></span>
        </template>

        <template
            v-if="errors.avatar"
        >
            <span style="color: red;" v-text="errors.avatar[0]" ></span>
        </template>

        <br>
        <br>

        <label for="password_confirmation">Confirmation</label>
        <input v-model="formData.password_confirmation" type="password" id="password_confirmation">

        <button type="button" v-on:click="createUserAction">
            Créer un nouvel utilisateur
        </button>
    </form>
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
    console.log(formData.value);
    await createUser(formData.value);
}
</script>
