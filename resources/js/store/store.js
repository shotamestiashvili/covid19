import { createStore } from 'vuex'
import * as login from './login';
import * as statistic from './statistic';

const store = createStore({
    modules: {
        login:     login,
        statistic: statistic

    }
})

export default store;

