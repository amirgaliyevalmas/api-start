import {ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";
import FormComponent from "../../uicomponents/FormComponent.vue";


//axios.defaults.baseURL = ";

export default function useSpeciality() {

    //const router = useRouter();
    const current_route = ref('speciality');// Для пагинации страницца

    const specialities = ref();
    const errors = ref();
    const meta = ref({});// Для пагинации
    const data = ref({});
   // const speciality = ref();

    const editData = ref({
        id: null,
        title_kz: "",
        title_ru: "",
        department: {}
    });
/*
    const getSpeciality = async (id) => {
        const response = await axios.get("/api/v1/speciality/one/" + id);
        speciality.value = response.data;
    };
*/
    const getSpecialities = async (param) => {
        const response = await axios.post("/api/v1/speciality",
            {department_id: param.value.department_id, page: param.value.page});
        specialities.value = response.data.data;
        meta.value = response.data.meta;
    };

    const storeSpeciality = async (data, closeModal) => {
        try {
            await axios.post("/api/v1/speciality/create", data);
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

    const updateSpeciality = async (editData, closeModal) => {
        try {
            let speciality = editData.id;
            await axios.patch(`/api/v1/speciality/` + speciality, { title_ru: editData.title_ru, title_kz: editData.title_kz, department_id: editData.department.id});
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
   /* const destroySpeciality = async (id) => {
        await axios.delete("/api/v1/specilaity/" + id);
        await getSpecialities();
    };
*/
    return {
        specialities,
        getSpecialities,
      //  getSpeciality,
        storeSpeciality,
        updateSpeciality,
      //  destroySpeciality,
        errors,
        meta,
        current_route,
        data,
        editData,
       // speciality,

    }
}
