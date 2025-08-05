import './bootstrap';
import { createApp } from "vue";
import UsersList from "./components/users/UsersList.vue";
import CreateUser from "./components/users/CreateUser.vue";
import UsersSelect from "./components/users/UsersSelect.vue";

import ProductsList from "./components/products/ProductsList.vue"

const app = createApp({});

app.component('usersList', UsersList);
app.component('createUser', CreateUser);
app.component('usersSelect', UsersSelect); // <users-select />

app.component('productsList', ProductsList);

app.mount('#app');
