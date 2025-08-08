<template>
    <form>
        <label for="name">Nom du produit</label>
        <input v-model="formData.name_product" type="text" id="nameProduct">

        <template
            v-if="errors.name_product"
        >
            <span style="color: red;" v-text="errors.name_product[0]" ></span>
        </template>

        <br>
        <br>

        <label for="description">Description du produit</label>
        <input v-model="formData.description" type="text" id="description">

        <template
            v-if="errors.description"
        >
            <span style="color: red;" v-text="errors.description[0]" ></span>
        </template>

        <br>
        <br>

        <label for="detailPrice">Mot de passe</label>
        <input v-model="formData.detail_price" type="text" id="detailPrice">
        <label for="detailPrice"> Détail du Prix </label>
        <input v-model="formData.detail_price" type="text" id="detailPrice">

        <template
            v-if="errors.detail_price"
        >
            <span style="color: red;" v-text="errors.detail_price[0]" ></span>
        </template>

        <template
            v-if="errors.wholesale_price"
        >
            <span style="color: red;" v-text="errors.wholesale_price[0]" ></span>
        </template>

        <br>
        <br>

        <label for="password_confirmation">Confirmation</label>
        <input v-model="formData.password_confirmation" type="password" id="password_confirmation">

        <button type="button" v-on:click="createProductAction">
            Créer un nouveau produit
        </button>
    </form>
</template>

<script setup>
import {ref} from "vue";
import useProduct from "../../composables/products/useProduct";

const {
    errors,
    createProduct,
} = useProduct();

const formData = ref({
    name_product: '',
    description: '',
    detail_price: 0,
    wholesale_price: 0,
});

const createProductAction = async () => {
    console.log("creation du produit réussi...",formData.value);
    await createProduct(formData.value);
}
</script>
