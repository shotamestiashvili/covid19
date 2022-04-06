import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes';

const router = new createRouter({
    mode: "history",
    routes: routes,
    history: createWebHistory(),

});

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('userToken')
    if (to.matched.some(record => record.meta.requiresAuth) && !loggedIn) {
        next({name: 'login'})
    }
    next()
});

export default router;
