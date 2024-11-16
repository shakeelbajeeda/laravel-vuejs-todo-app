import {defineStore} from "pinia";

export const useTodoStore = defineStore('todo', {
    state: () => {
        return {
            todos: []
        }
    },

    getters: {
        getTodos: (state) => state.todos || []
    },

    actions: {
        setTodos(todos) {
            this.todos = todos
        }
    }
})
