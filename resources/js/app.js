import './bootstrap';
import { createApp } from "vue";
import UsersList from "./components/users/UsersList.vue";
import CreateUser from "./components/users/CreateUser.vue";
import UsersSelect from "./components/users/UsersSelect.vue";
import CreateProduct from "./components/products/CreateProduct.vue";

import ProductsList from "./components/products/ProductsList.vue";
import ProductsSelect from "./components/products/ProductsSelect.vue";
import App from "./components/App.vue";
import Navbar from "./components/layouts/Navbar.vue";

const app = createApp({});
/** ICI ON AJOUTE LES COMPOSANTS Dans le template(index.blade.php) ==> <users-list/> <products-list/> */
//app.component('app',App);
app.component('navbar',Navbar);

app.component('usersList', UsersList);

app.component('productsSelect',ProductsSelect);
app.component('productsList', ProductsList);

app.component('createUser', CreateUser);
app.component('usersSelect', UsersSelect); // <users-select />
app.component('createProduct',CreateProduct);

app.mount('#app');





