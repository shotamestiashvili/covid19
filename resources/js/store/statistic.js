import {authAjax, apiUrls} from "./urls";

export const namespaced = true

export const state = {
    statisticState: [],

}

export const getters = {
    statisticGetter(state) {
        return state.statisticState
    },

}

export const mutations = {
    statisticMutation(state, data) {
        state.statisticState = data
    },
}

export const actions = {
    statisticAction({commit}) {
        return authAjax()
            .get(apiUrls.statistic)
            .then((response) => {
                commit('statisticMutation', response.data.data)
            })
            .catch((e) => {
                console.log(e)
            });
    },

    sort({commit}, data) {
        return authAjax()
            .post(apiUrls.sort, {
                column: data.column,
                sort:   data.sort,
            })
            .then((response) => {
                console.log(response.data.data)
                commit('statisticMutation', response.data.data)
            })
            .catch((e) => {
                console.log(e)
            });
    },


    search({commit}, data) {
        return authAjax()
            .post(apiUrls.search, {
                column:  data.column,
                table:   data.table,
                search:  data.search,

            })
            .then((response) => {
                console.log(response.data.data)
                commit('statisticMutation', response.data.data)
            })
            .catch((e) => {
                console.log(e)
            });
    },

}
