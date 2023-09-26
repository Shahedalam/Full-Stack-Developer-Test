import {ref} from "vue";
import axios from "axios";
import laravelUrl from "../server";

export default function showCategory() {
    const url = laravelUrl()+'api/v1/category';
    const categoryData = ref([]);
    const error = ref(null);

    const showAllCategory = async () =>{
        categoryData.value = [];
        error.value = null;

        try {
            const res = await axios(url);
            categoryData.value = res.data;

        }catch (e) {
            error.value = e;
        }
    }
    return {
        categoryData,
        error,
        showAllCategory
    }
}