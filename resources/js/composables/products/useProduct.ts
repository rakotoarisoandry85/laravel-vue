import {ref} from "vue";
import axios from "axios";
import {ProductType} from "../../types/products/ProductType";

export default function () {
    const errors = ref({});
   // const user = ref<UserType>();
     const product = ref<ProductType>();

    // const createUser = async (
    //     formData: any,
    // ): Promise<void> => {
    //     await axios.post('/api/users', formData)
    //         .then((res) => {
    //             console.log('RESULTAT==>',res);
    //             errors.value = {};
    //             window.location.href = '/';
    //         })
    //         .catch((err) => errors.value = err.response.data.errors);
    // }

    const showProduct = async (
        id: number,
    ): Promise<void> => {
        await axios.get(`/api/products/${id}`)

            .then((res) => { console.log('RESULTAT==>',res.data);
                product.value = res.data.data} )
            .catch((err) => console.log(err));
    }

    return {
        errors,
        product,
        //createUser,
        showProduct,
    }
}
