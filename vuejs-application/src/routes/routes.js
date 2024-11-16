import {createRouter, createWebHistory} from 'vue-router'

const routes = [
    { path: '/', component: () => import('../pages/IndexPage.vue') },
    { path: '/todo/create', component: () => import('../pages/Form.vue') },
    { path: '/todo/:id/edit', component: () => import('../pages/Form.vue') },

    { path: '/:pathMatch(.*)*', name: 'NotFound', component: () => import('../pages/NotFound.vue') },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
