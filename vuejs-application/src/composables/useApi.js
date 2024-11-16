import {api} from "./axios.js";
import {toast} from "vue3-toastify";
import 'vue3-toastify/dist/index.css';

export default async function useApi(data) {
    return await api.request({
        method: data.method,
        url: `/api/${data.url}`,
        data: data.data,
        params: data.method.toLowerCase() == "get" ? data.data : null,
        responseType: data.responseType ? data.responseType : "json",
        headers: data.headers ? data.headers : {},
    }).then(response => {
        if (data?.successMessage) {
            if (response?.data?.message) {
                toast.success(response.data.message, {
                    autoClose: 1500
                })
            }
        }
        return Promise.resolve(response.data)
    }).catch(error => {
        if (error.response !== undefined && error.response.data !== undefined && error.response.data.errors !== undefined && !data?.hideErrors) {
            for (const [key, err] of Object.entries(error.response.data.errors)) {
                toast.error(key + ': ' + err[0], {
                    autoClose: 1000
                })
            }
        }
        let message = error?.message
        if (error?.response?.data?.message !== undefined) {
            message = error.response.data.message
        }
        if (!error?.response?.data?.errors && !data?.hideErrors) {
            toast.error('Something went wrong: ' + message, {
                autoClose: 1000
            })
        }

        return Promise.reject(error)
    })
}
