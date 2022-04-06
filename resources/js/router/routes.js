import App from "../components/App"
import Login from "../components/authorization/login";
import Register from "../components/authorization/Register";
import Statistic from "../components/statistic/statistic";
export default [

    {
        path: '/login',
        name: 'login',
        component: Login,
    },

    {
        path: '/register',
        name: 'register',
        component: Register,
    },

    {
        path: '/',
        name: 'statistic',
        component: Statistic,
    },


]
