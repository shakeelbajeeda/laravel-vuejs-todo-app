<script setup>
import DataTable from "../components/DataTable.vue";
import useApi from "../composables/useApi.js";
import {onMounted, ref} from "vue";
import {useRouter} from "vue-router";
import {useTodoStore} from "../stores/todo.js";

const router = useRouter()
const todoStore = useTodoStore()
const todos = ref([])
todos.value = todoStore.getTodos

const columns = [
    {
        label: "Task",
        field: "task",
    },
    {
        label: "Description",
        field: "description",
    },
    {
        label: "Status",
        field: "is_completed"
    }
]

const actions = [
    {
        label: 'Edit',
        event: 'editTodo'
    },
    {
        label: 'Delete',
        event: 'deleteTodo'
    }
]

onMounted(() => {
    fetchTodos()
})

/**
 * Fetch todos
 * @returns {Promise<void>}
 */
const fetchTodos = async () => {
    await useApi({
        url: 'todos',
        method: 'get'
    }).then(response => {
        todos.value = response.data
        todoStore.setTodos(response.data)
    })
}

/**
 * Delete Todo
 *
 * @param todo
 * @returns {Promise<void>}
 */
const deleteTodo = async (todo) => {
    await useApi({
        url: `todos/${todo.id}`,
        method: 'delete',
        successMessage: true
    }).then(res => {
        if (res.status) {
            todos.value = todos.value.filter(item => item.id !== todo.id)
            todoStore.setTodos(todos.value)
        }
    })
}

</script>

<template>
    <div class="flex items-center justify-center">
        <div class="grid grid-cols-1 max-w-4xl w-full">
            <DataTable
                :columns="columns"
                :data="todos"
                :actions="actions"
                @editTodo="(row) => router.push(`/todo/${row.id}/edit`)"
                @deleteTodo="deleteTodo"
            />
        </div>
    </div>
</template>
