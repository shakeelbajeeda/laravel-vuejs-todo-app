<script setup>
const props = defineProps({
    columns: {
        type: Array,
        required: true
    },
    data: {
        type: Array,
        default: []
    },
    actions: {
        type: Array,
        default: []
    }
})
</script>

<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-gray-600">
            <tr>
                <th
                    v-for="column in columns"
                    :key="column.label"
                    scope="col"
                    class="px-6 py-3"
                >
                    {{ column.label }}
                </th>
                <th scope="col" class="px-6 py-3" v-if="actions.length">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="(row, index) in data"
                :key="index"
                class="bg-white border-b hover:bg-gray-50"
            >
                <td
                    v-for="column in columns"
                    :key="column.field"
                    class="px-6 py-3"
                >
                    {{ row[column.field] }}
                </td>
                <td
                    v-if="actions.length"
                    class="px-6 py-3"
                >
                    <button
                        v-for="action in actions"
                        :key="action.label"
                        class="font-medium text-blue-600 hover:underline pl-2"
                        @click="$emit(action.event, row)"
                    >
                        {{ action.label }}
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>
