import {ajax, authAjax, apiUrls} from "./urls";
import tokens from '../utils/tokens'


export const namespaced = true

export const state = {
    apiConnected: false,
}

export const getters = {
    apiConnected(state) {
        return state.apiConnected
    }
}

export const mutations = {
    apiConnected(state) {
        state.apiConnected = true
    }
}

export const actions = {
    register(_, data) {
        return ajax
            .post(
                apiUrls.register, {
                    name: data.name,
                    email: data.email,
                    password: data.password,
                    password_confirmation: data.password_confirmation,
                }
            )
            .then((response) => {
                localStorage.setItem('userToken', response.data.token);
                this.$router.push('/');
            })
            .catch((e) => {
                console.log(e)
            });
    },

    login(_, data) {
        return ajax
            .post(apiUrls.login, {
                email: data.email,
                password: data.password,
            })
            .then((response) => {
                console.log(response.data.token);
                localStorage.setItem('userToken', response.data.token);
            })
            .catch(() => {
            });
    },


    logout() {
        return authAjax()
            .post(apiUrls.logout, {token: tokens.userToken})
            .catch(() => {
            }).finally(()=>{
                tokens.clearUserToken();

            });
    }
}
