<script setup>
import useApi from "../composables/useApi.js";
import {onMounted, ref} from "vue";
import {useRoute, useRouter} from "vue-router";

const formData = ref({
    task: null,
    description: null,
    is_completed: false
})

const router = useRouter()
const route = useRoute()

/**
 * Create new or update existing todo
 *
 * @returns {Promise<void>}
 */
const createOrUpdateTodo = async () => {
    await useApi({
        url: route.params.id ? `todos/${route.params.id}` : 'todos',
        method: route.params.id ? 'put' : 'post',
        data: formData.value,
        successMessage: true
    }).then(res => {
        router.push('/')
    })
}


/**
 * Fetch edited todo
 *
 * @returns {Promise<void>}
 */
const fetchTodo = async () => {
    await useApi({
        url: `todos/${route.params.id}`,
        method: 'get'
    }).then(res => {
        formData.value = res.data
        formData.value.is_completed = res.data.is_completed === "Completed"
    })
}

onMounted(() => {
    if (route.params.id) {
        fetchTodo()
    }
})

</script>

<template>
    <div class="flex items-center justify-center">
        <div class="grid grid-cols-1 max-w-4xl w-full">

            <form @submit.prevent="createOrUpdateTodo()">
                <div class="mb-6">
                    <label for="task" class="block mb-2 text-sm font-medium text-gray-900">Task*</label>
                    <input
                        type="text"
                        id="task"
                        v-model="formData.task"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Task"
                        required
                    />
                </div>
                <div class="mb-6">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                    <textarea
                        v-model="formData.description"
                        id="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Description"
                    />
                </div>
                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input
                            id="is_completed"
                            type="checkbox"
                            v-model="formData.is_completed"
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                        />
                    </div>
                    <label for="is_completed" class="ms-2 text-sm font-medium text-gray-900">Completed</label>
                </div>
                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    {{ route.params.id ? 'Update' : 'Submit' }}
                </button>
            </form>

        </div>
    </div>
</template>
