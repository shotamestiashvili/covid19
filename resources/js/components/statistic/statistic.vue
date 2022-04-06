<template>
<div v-if="authorized">


<div class="buttons">

    &nbsp;
    &nbsp;
    <button style="color: brown" @click="logout"> Logout </button>
</div>



    <h2> Covid 19 Statistics</h2>

    <table style="width:100%">
        <tr>
            <th><input type="text" v-model="searchId"></th>
            <th><input type="text" v-model="searchCode"></th>
            <th><input type="text" v-model="searchCountry"></th>
            <th><input type="text" v-model="searchConfirmed"></th>
            <th><input type="text" v-model="searchRecovered"></th>
            <th><input type="text" v-model="searchDeath"></th>
            <th><input type="text" v-model="searchDate"></th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>
                <label for="confirmed">Sort Confirmed</label>
                <select v-model="confirmedSort" name="confirmed" id="confirmed">
                    <option value="asc">ASC</option>
                    <option value="desc">DESC</option>
                </select>
            </th>
            <th>
                <label for="recovered">Sort Recovered</label>
                <select v-model="recoveredSort" name="recovered" id="recovered">
                    <option value="asc">ASC</option>
                    <option value="desc">DESC</option>
                </select>
            </th>
            <th>
                <label for="death">Sort Death</label>
                <select  v-model="deathSort" name="death" id="death">
                    <option value="asc">ASC</option>
                    <option value="desc">DESC</option>
                </select>
            </th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Country</th>
            <th>Confirmed</th>
            <th>Recovered</th>
            <th>Death</th>
            <th>Date</th>
        </tr>
        <tr v-for="stats in stat"
            v-bind:key="stats.id"
            v-bind:value="stats.id"
        >
            <td>{{ stats.id }}</td>
            <td>{{ stats.code }}</td>
            <td>{{ (JSON.parse(stats.country)).en }}</td>
            <td>{{ stats.confirmed }}</td>
            <td>{{ stats.recovered }}</td>
            <td>{{ stats.death }}</td>
            <td>{{ stats.date }}</td>
        </tr>

    </table>
</div>

    <div v-else>
       Bad Authorization!
    </div>
</template>

<script>
import {ajax, apiUrls} from "../../store/urls";
import tokens from "../../utils/tokens";
import {mapGetters} from "vuex";

export default {
    name: "statistic",

    data(){
        return {
            'authorized': false,

            'confirmedSort': '',
            'recoveredSort': '',
            'deathSort': '',

            'searchId' : '',
            'searchCode' : '',
            'searchCountry' : '',

            'searchConfirmed' : '',
            'searchRecovered' : '',
            'searchDeath' : '',
            'searchDate' : '',

        }
    },

    computed: {
        ...mapGetters({
            stat: 'statistic/statisticGetter',
        }),
    },

    methods: {
        getStatistics(){
            this.$store.dispatch('statistic/statisticAction');
        },

        logout(){
            this.$store.dispatch('login/logout');
            this.$router.push('/login');
        },
    },

    watch: {
        confirmedSort(current, before){
            this.$store.dispatch('statistic/sort', {column: 'confirmed', sort: current});
        },

        recoveredSort(current, before){
            this.$store.dispatch('statistic/sort', {column: 'recovered', sort: current});
        },

        deathSort(current, before){
            this.$store.dispatch('statistic/sort', {column: 'death', sort: current});
        },



        searchId(current, before){
            this.$store.dispatch('statistic/search', {table: 'countries', search: current, column: 'id'});
        },

        searchCode(current, before){
            this.$store.dispatch('statistic/search', {table: 'countries', search: current, column: 'code'});
        },

        searchCountry(current, before){
            this.$store.dispatch('statistic/search', {table: 'countries', search: current, column: 'name'});
        },



        searchConfirmed(current, before){
            this.$store.dispatch('statistic/search', {table: 'statistics', search: current, column: 'confirmed'});
        },

        searchRecovered(current, before){
            this.$store.dispatch('statistic/search', {table: 'statistics', search: current, column: 'recovered'});
        },

        searchDeath(current, before){
            this.$store.dispatch('statistic/search', {table: 'statistics', search: current, column: 'death'});
        },

        searchDate(current, before){
            this.$store.dispatch('statistic/search', {table: 'statistics', search: current, column: 'updated_at'});
        },




    },

    created() {
        if (tokens.isAuthorized) {
            console.log(tokens.isAuthorized)
            this.authorized = true;
            this.getStatistics();
        }else{
            this.$router.push('/login');
        }
    }
}
</script>

<style scoped>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}

tr:nth-child(even) {
    background-color: rgba(150, 212, 212, 0.4);
}

th:nth-child(even),td:nth-child(even) {
    background-color: rgba(150, 212, 212, 0.4);
}
</style>
