<template>
    <div class="container ">
        <div class=" ml-20 py-5 my-auto dark:bg-gray-900">

            <users-select
                v-if="users.length !== 0"
                :users="users"
                @update:modelValue="(id: number) => handleUpdateId(id)"
            />
        </div>
            <a
                v-if="user"
                href="#"
                class=""
            >

                <!-- <div class="flex items-center gap-x-6"> -->
                    <!-- <img
                        class="w-14 h-14 rounded-full outline-1 -outline-offset-1 outline-black/5"
                        :src="user.avatar"
                        alt=""
                    />
                    <div>
                        <h3
                            class="text-base/7 font-semibold tracking-tight text-gray-900"
                        >
                            {{ user.name }}
                        </h3>
                        <p class="text-sm/6 font-semibold text-indigo-600">
                            {{ user.email }}
                        </p>
                    </div> -->

                    <section class="py-10 my-auto dark:bg-gray-900">
                        <div
                            class="lg:w-[90%] md:w-[100%] w-[106%] mx-auto flex gap-4"
                        >
                            <div
                                class="lg:w-[98%] sm:w-[98%] w-full mx-auto shadow-2xl p-4 rounded-xl h-fit self-center dark:bg-gray-800/40"
                            >
                                <!--  -->
                                <div class="">
                                    <h1
                                        class="lg:text-3xl md:text-2xl text-xl font-serif font-extrabold mb-2 dark:text-white"
                                    >
                                        Profile
                                    </h1>
                                    <h2
                                        class="text-grey text-sm mb-4 dark:text-gray-400"
                                    >
                                        Modifier le Profile
                                    </h2>
                                    <form  @submit="handleSubmit">
                                        <!-- Cover Image -->
                                        <div
                                            class="w-full rounded-sm bg-[url('https://images.unsplash.com/photo-1449844908441-8829872d2607?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw2fHxob21lfGVufDB8MHx8fDE3MTA0MDE1NDZ8MA&ixlib=rb-4.0.3&q=80&w=1080')] bg-cover bg-center bg-no-repeat items-center"
                                        >
                                            <!-- Profile Image -->
                                            <div
                                                class="mx-auto flex justify-center w-[141px] h-[141px] bg-blue-300/20 rounded-full bg-cover bg-center bg-no-repeat"
                                                :style="{ backgroundImage: `url(${user?.avatar})` }"
                                            >
                                                <div
                                                    class="bg-white/90 rounded-full w-6 h-6 text-center ml-28 mt-4"
                                                >
                                                    <input
                                                        type="file"
                                                        name="profile"
                                                        id="upload_profile"
                                                        @change="onProfileSelected"
                                                    />

                                                    <label for="upload_profile">
                                                        <svg
                                                            data-slot="icon"
                                                            class="w-6 h-5 text-blue-700"
                                                            fill="none"
                                                            stroke-width="1.5"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            aria-hidden="true"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"
                                                            ></path>
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"
                                                            ></path>
                                                        </svg>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="flex justify-end">
                                                <!--  -->
                                                <!-- <input
                                                    type="file"
                                                    name="profile"
                                                    id="upload_cover"
                                                    hidden
                                                    required
                                                /> -->

                                                <div
                                                    class="bg-white flex items-center gap-1 rounded-tl-md px-2 text-center font-semibold"
                                                >
                                                    <label
                                                        for="upload_cover"
                                                        class="inline-flex items-center gap-1 cursor-pointer"
                                                        >Cover

                                                        <svg
                                                            data-slot="icon"
                                                            class="w-6 h-5 text-blue-700"
                                                            fill="none"
                                                            stroke-width="1.5"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            aria-hidden="true"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"
                                                            ></path>
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"
                                                            ></path>
                                                        </svg>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <h2
                                            class="text-center mt-1 font-semibold dark:text-gray-300"
                                        >
                                            Upload Profile and Cover Image
                                        </h2>
                                        <div
                                            class="flex flex-col lg:flex-row gap-2 justify-center w-full"
                                        >
                                            <div class="w-full mb-4 mt-6">
                                                <label
                                                    for=""
                                                    class="mb-2 dark:text-gray-300"
                                                    >Name</label
                                                >
                                                <input
                                                    type="text"
                                                    class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                                    placeholder="First Name"
                                                    name="name"
                                                    v-model="user.name"
                                                    @change="onChangeNameSelected"
                                                />
                                            </div>
                                            <div class="w-full mb-4 lg:mt-6">
                                                <label
                                                    for=""
                                                    class="dark:text-gray-300"
                                                    >Email</label
                                                >

                                                <input
                                                    type="text"
                                                    class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                                    placeholder="Email"
                                                    name="email"
                                                    v-model="user.email"
                                                    @change="onChangeEmailSelected"
                                                />

                                                 <input
                                                    type="text"
                                                    class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                                    placeholder="ID"
                                                    name="id"
                                                    v-model="user.id"
                                                />
                                            </div>
                                        </div>


                                        <div
                                            class="w-full rounded-lg bg-blue-500 mt-4 text-white text-lg font-semibold"
                                        >
                                            <button
                                                type="submit"
                                                class="w-full p-4"
                                            >
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                <!-- </div> -->
            </a>


        <div v-if="!loading && users.length > 0" class="bg-white py-24 sm:py-32">
            <div class="mx-auto grid max-w-7xl gap-20 px-6 lg:px-8 xl:grid-cols-3">
                <div class="max-w-xl">
                    <h2
                        class="text-3xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-4xl"
                    >
                        Meet our leadership
                    </h2>
                    <p class="mt-6 text-lg/8 text-gray-600">
                        We’re a dynamic group of individuals who are passionate
                        about what we do and dedicated to delivering the best
                        results for our clients.
                    </p>
                </div>
                <ul
                    role="list"
                    class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2"
                >
                    <li v-for="user in users" :key="user.name">
                        <div class="flex items-center gap-x-6">
                            <img
                                class="w-14 h-14 rounded-full outline-1 -outline-offset-1 outline-black/5"
                                :src="user.avatar"
                                alt=""
                            />
                            <div>
                                <h3
                                    class="text-base/7 font-semibold tracking-tight text-gray-900"
                                >
                                    {{ user.name }}
                                </h3>
                                <p class="text-sm/6 font-semibold text-indigo-600">
                                     {{ user.email }}
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
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
import useUser from "../../composables/users/useUser";
import axios from "axios";
import { UserType } from "../../types/users/UserType";

const { user, showUser, updateUser, deleteUser } = useUser();
const loading = ref(true);
const formDataSub = ref({
    name: '',
    email: '',
    avatar: '',
});

const users = ref<UserType[]>([]);

const loadFromServer = async () => {
    await axios
        .get("/api/users")
        .then((res) => {
            console.log("RES==>", res);
            users.value = res.data.data;
        })
        .finally(() => {
      loading.value = false; // désactive le loader quand la requête est finie
    })
        .catch((err) => console.log(err));
};

loadFromServer();

const handleUpdateId = async (id: number): Promise<void> => {
    await showUser(id);
   // alert(`User with ID ${id} selected`);
};

const onProfileSelected = async (e: Event) => {
  const target = e.target as HTMLInputElement;
  //const id = (e.target);
  const file = target.files?.[0];
  if (file && user.value) {
    const url = URL.createObjectURL(file);
    user.value.avatar = url;
    console.log("URL==>",url)
    console.log("e.target==>",e.target)
    // Ici, tu peux envisager d'envoyer le fichier vers le serveur si besoin.// Upload serveur
    const uploadedUrl = await uploadProfile(file);

    // if (uploadedUrl) {
    //   // Mise à jour de l’avatar avec l’URL finale de l’image serveur
    //   user.value.avatar = uploadedUrl;
    //   console.log("UPLOADED URL==>",uploadedUrl);
    // }
  }
};

const onChangeNameSelected = (e: Event) => {
  const target = e.target as HTMLInputElement;
  const value = target.value;
  if (user.value) {
    formDataSub.value.name = value; // Met à jour le formulaire de soumission
}
};

const onChangeEmailSelected = (e: Event) => {
  const target = e.target as HTMLInputElement;
  const value = target.value;
  if (user.value) {
    formDataSub.value.email = value; // Met à jour le formulaire de soumission
  }
};

const uploadProfile = async (file: File) => {
  const formData = new FormData();
  formData.append("profile", file);
    console.log("FILE==>",file);
    console.log("FORM DATA==>",formData.get("profile"));
//   try {
//     const response = await axios.post("/api/users/upload-profile", formData, {
//       headers: { "Content-Type": "multipart/form-data" },
//     });
//     console.log("RESPONSE==>",response);
//     // Supposons que la réponse contient l’URL de la nouvelle image dans response.data.url
//     return response.data.url;
//   } catch (error) {
//     console.error("Upload failed", error);
//     return null;
//   }

};
const handleSubmit = async (e: Event) => {
  e.preventDefault();
 if (!formDataSub.value.name || !formDataSub.value.email) {
     formDataSub.value.name = e.target?.name?.value;
     formDataSub.value.email = e.target?.email?.value;
     await updateUser(user.value?.id,formDataSub.value);
 }
else {
    await updateUser(user.value?.id,formDataSub.value);
}

}

</script>

<style scoped>

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
