import {ref} from "vue";
import axios from "axios";
import {UserType} from "../../types/users/UserType";

export default function () {
    const errors = ref({});
    const user = ref<UserType>();
    const URL = '/api/users';

    const createUser = async ( formData: any): Promise<void> => {
        await axios.post(`${URL}/create`, formData)
            .then((res) => {
                console.log('RESULTAT==>',res);
                errors.value = {};
                window.location.href = '/';
            })
            .catch((err) => errors.value = err.response.data.errors);
    }

    const updateUser = async ( id: number, formData: any): Promise<void> => {
        await axios.patch(`${URL}/${id}/upload-profile`, formData)
            .then((res) => {
                console.log('RESULTAT==>',res);
                errors.value = {};
                window.location.href = '/';
            })
            .catch((err) => errors.value = err.response.data.errors);
    }


    const deleteUser = async ( id: number): Promise<void> => {
        await axios.delete(`${URL}/${id}/delete`)
            .then((res) => {
                console.log('RESULTAT==>',res);
                errors.value = {};
                window.location.href = '/';
            })
            .catch((err) => errors.value = err.response.data.errors);
    }

    const showUser = async (
        id: number,
    ): Promise<void> => {
        await axios.get(`${URL}/${id}`)
            .then((res) => { console.log('RESULTAT One user==>',res.data);
                user.value = res.data.data} )
            .catch((err) => console.log(err));
    }

    return {
        errors,
        user,
        showUser,
        createUser,
        updateUser,
        deleteUser
    }
}
