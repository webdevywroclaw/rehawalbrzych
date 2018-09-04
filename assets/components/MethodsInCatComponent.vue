<template>
    <ul>
        <li v-for="methodInCatApi in methodsInCatApi" :key="methodInCatApi" v-bind:methodInCatApi="methodInCatApi" >
            <div class="met" v-if="methodInCatApi.categoryCat.catId == $route.params.id">
                <h1>{{methodInCatApi.metName}}</h1>
                <router-link :to="{ name: 'MethodSingleComponent',params:{id: methodInCatApi.metId}}"><button>More</button></router-link>
            </div>

        </li>
    </ul>
</template>

<script>
    export default {
    data() {
        return {
            methodsInCatApi: [],
        }
    },
    methods: {
        fetchMethodsInCat() {
            this.$http.get('/api/methods',
                {
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Accept': 'application/json'
                    }
                }
            )
                .then(response => response.json())
                .then(result => {
                    this.methodsInCatApi = result
                    this.loaded = true
                })
        }
    },

    created: function () {
        this.fetchMethodsInCat();
    }

    }
</script>

<style>
    .methods{
        display:grid;
        grid-template-columns: repeat(2,1fr);
    }
    .met{
        border: 1px solid black;
    }
</style>