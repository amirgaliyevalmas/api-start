import {ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";
import FormComponent from "../../uicomponents/FormComponent.vue";


//axios.defaults.baseURL = ";

export default function useUser() {

    //const router = useRouter();
    const current_route = ref('user');// Для пагинации страницца

    const users = ref();
    const current_user = ref({});
    const errors = ref();
    const meta = ref({});// Для пагинации
    const data = ref({});
   // const user = ref();

    const editData = ref({
        id: null,
        title_kz: "",
        title_ru: "",
        department: {}
    });

    /*const getUser = async (id) => {
        const response = await axios.get("/api/v1/user/one/" + id);
        user.value = response.data;
    };*/
    const getCurrentUser = async () => {
        const response = await axios.get("/api/v1/user/one/");
        current_user.value = response.data;
    };


    const getUsers = async (param) => {
        const response = await axios.post("/api/v1/user",
            {department_id: param.value.department_id, page: param.value.page});
        users.value = response.data.data;
        meta.value = response.data.meta;
    };

    const storeUser = async (data, closeModal) => {
        try {
            await axios.post("/api/v1/user/create", data);
            closeModal.click();
            toastr.success('Добавлено успешно');
            clearData();
        } catch (error) {
            if (error.response.status === 422) {
                for (const [key, value] of Object.entries(error.response.data.errors)) {
                    toastr.error('Ошибка при сохронени' + " " + value);
                }
            }
        }
    };

    const updateUser = async (editData, closeModal) => {
        try {
            let user = editData.id;
            await axios.patch(`/api/v1/user/` + user, { title_ru: editData.title_ru, title_kz: editData.title_kz, department_id: editData.department.id});
            closeModal.click();
            toastr.success('Успешно изменено');
        } catch (error) {
            if (error.response.status === 422) {
                for (const [key, value] of Object.entries(error.response.data.errors)) {
                    toastr.error('Ошибка при сохронени' + " " + value);
                }
            }
        }
    };

    function clearData() {
        data.value.title_kz = "";
        data.value.title_ru = "";
        data.value.department_id = "";
    }
   /* const destroyUser = async (id) => {
        await axios.delete("/api/v1/specilaity/" + id);
        await getUsers();
    };
*/
    return {
        users,
      //  user,
        getUsers,
        //getUser,
        storeUser,
        updateUser,
       // destroyUser,
        errors,
        meta,
        current_route,
        data,
        editData,
       // user,

        getCurrentUser,
        current_user,

    }
}
