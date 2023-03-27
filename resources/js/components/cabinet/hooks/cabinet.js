import {ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";
import FormComponent from "../../uicomponents/FormComponent.vue";


//axios.defaults.baseURL = ";

export default function useCabinet() {

    //const router = useRouter();
    const current_route = ref('cabinet');// Для пагинации страницца

    const cabinets = ref();
    const errors = ref();
    const meta = ref({});// Для пагинации
    const data = ref({});
   // const cabinet = ref();

    const editData = ref({
        id: null,
        cabinet_name: "",
        title_kz: "",
        title_ru: "",
    });
/*
    const getCabinet = async (id) => {
        const response = await axios.get("/api/v1/cabinet/one/" + id);
        cabinet.value = response.data;
    };
*/
    const getCabinetsAll = async () => {
        const response = await axios.get("/api/v1/cabinet/all");
        cabinets.value = response.data.data;
        };

    const getCabinets = async (page = 1) => {
        const response = await axios.get("/api/v1/cabinet?page=" + page);
        cabinets.value = response.data.data;
        meta.value = response.data.meta;
    };

    const storeCabinet = async (data, closeModal) => {
        try {
            await axios.post("/api/v1/cabinet", data);
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

    const updateCabinet = async (editData, closeModal) => {
        try {
            let cabinet = editData.id;
            await axios.patch(`/api/v1/cabinet/` + cabinet,
                { title_ru: editData.title_ru, title_kz: editData.title_kz, cabinet_name: editData.cabinet_name});
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
        data.cabinet_name = "";
        data.title_kz = "";
        data.title_ru = "";
    }
   /* const destroyCabinet = async (id) => {
        await axios.delete("/api/v1/cabinet/" + id);
        await getCabinets();
    };
*/
    return {
        cabinets,
        getCabinets,
      //  getCabinet,
        storeCabinet,
        updateCabinet,
      //  destroyCabinet,
        getCabinetsAll,
        errors,
        meta,
        current_route,
        data,
        editData,
       // cabinet,

    }
}
