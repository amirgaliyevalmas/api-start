import {ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";
import FormComponent from "../../uicomponents/FormComponent.vue";


//axios.defaults.baseURL = ";

export default function useArea() {

    //const router = useRouter();
    const current_route = ref('area');// Для пагинации страницца

    const areas = ref();
    const errors = ref();
    const meta = ref({});// Для пагинации
    const data = ref({});
   // const area = ref();

    const editData = ref({
        id: null,
        title_kz: "",
        title_ru: "",
        department: {}
    });
/*
    const getArea = async (id) => {
        const response = await axios.get("/api/v1/area/one/" + id);
        area.value = response.data;
    };
*/
    const getAreas = async (param) => {
        const response = await axios.post("/api/v1/area",
            {department_id: param.value.department_id, page: param.value.page});
        areas.value = response.data.data;
        meta.value = response.data.meta;
    };

    const storeArea = async (data, closeModal) => {
        try {
            await axios.post("/api/v1/area/create", data);
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

    const updateArea = async (editData, closeModal) => {
        try {
            let area = editData.id;
            await axios.patch(`/api/v1/area/` + area, { title_ru: editData.title_ru, title_kz: editData.title_kz, department_id: editData.department.id});
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
   /* const destroyArea = async (id) => {
        await axios.delete("/api/v1/specilaity/" + id);
        await getAreas();
    };
*/
    return {
        areas,
        getAreas,
      //  getArea,
        storeArea,
        updateArea,
      //  destroyArea,
        errors,
        meta,
        current_route,
        data,
        editData,
       // area,

    }
}
