import axios from 'axios'
import tokens from '../utils/tokens'

export const ajax = axios.create({
    headers: {
        "Content-Type": 'application/json',
        "Accept": 'application/json',
        "Access-Control-Allow-Origin": "*",
    },
})

export const authAjax = () => {
    if (tokens.userToken) {
        ajax.defaults.headers.common['authorization'] = `Bearer ${tokens.userToken}`;
    }
    return ajax
}

export const apiUrls = {

    sanctumToken: '/sanctum/csrf-cookie',
    register: '/register',
    login:    '/login',
    logout:   '/api/logout',

    sort:   '/api/sort',
    search: '/api/search',

    statistic: '/api/statistic',

}
