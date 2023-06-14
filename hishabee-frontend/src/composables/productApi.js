import {ref} from "vue";
import axios from "axios";
import laravelUrl from "../server";

export default function showProducts() {
    const url = laravelUrl()+'api/v1/product';
    const productData = ref([]);
    const error = ref(null);

    const showAllProduct = async () =>{
        productData.value = [];
        error.value = null;

        try {
            const res = await axios(url);
            productData.value = res.data;

        }catch (e) {
            error.value = e;
        }
    }
    return {
        productData,
        error,
        showAllProduct
    }
}