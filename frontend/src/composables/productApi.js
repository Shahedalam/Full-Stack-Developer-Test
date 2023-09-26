import {isRef, ref, watch, watchEffect} from "vue";
import axios from "axios";
import laravelUrl from "../server";

export default function showProducts(id) {
    const url = laravelUrl()+'api/v1/product?id='+id;
    console.log(url);
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
    if(isRef(id)){
        watchEffect(showAllProduct)
    }else{
        showAllProduct
    }
    return {
        productData,
        error,
        showAllProduct
    }
}