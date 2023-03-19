import {ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";
import FormComponent from "../../uicomponents/FormComponent.vue";


//axios.defaults.baseURL = ";

export default function useDepartment() {

    //const router = useRouter();
    const current_route = ref('department');// Для пагинации страницца

    const departments = ref();
    const errors = ref();
    const meta = ref({});// Для пагинации
    const data = ref({});
   // const department = ref();

    const editData = ref({
        id: null,
        title_kz: "",
        title_ru: "",
    });
/*
    const getDepartment = async (id) => {
        const response = await axios.get("/api/v1/department/one/" + id);
        department.value = response.data;
    };
*/
    const getDepartmentsAll = async () => {
        const response = await axios.get("/api/v1/department/all");
        departments.value = response.data.data;
        };

    const getDepartments = async (page = 1) => {
        const response = await axios.get("/api/v1/department?page=" + page);
        departments.value = response.data.data;
        meta.value = response.data.meta;
    };

    const storeDepartment = async (data, closeModal) => {
        try {
            await axios.post("/api/v1/department", data);
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

    const updateDepartment = async (editData, closeModal) => {
        try {
            let department = editData.id;
            await axios.patch(`/api/v1/department/` + department, { title_ru: editData.title_ru, title_kz: editData.title_kz});
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
        data.title_kz = "";
        data.title_ru = "";
    }
   /* const destroyDepartment = async (id) => {
        await axios.delete("/api/v1/department/" + id);
        await getDepartments();
    };
*/
    return {
        departments,
        getDepartments,
      //  getDepartment,
        storeDepartment,
        updateDepartment,
      //  destroyDepartment,
        getDepartmentsAll,
        errors,
        meta,
        current_route,
        data,
        editData,
       // department,

    }
}
