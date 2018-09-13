<template>
    <div class="metcat">
        <div class="metc" v-for="methodInCatApi in methodsInCatApi" :key="methodInCatApi" v-bind:methodInCatApi="methodInCatApi" v-if="methodInCatApi.categoryCat.catId == $route.params.id">

                <h1>{{methodInCatApi.metName}}</h1>
                <router-link :to="{ name: 'MethodSingleComponent',params:{id: methodInCatApi.metId}}"><button>Więcej</button></router-link>


        </div>
    </div>

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

<style scoped>
    .methods{
        display:grid;
        grid-template-columns: repeat(2,1fr);
    }
    .metcat{

        margin:10px;
        display:grid;
        grid-template-columns: repeat(auto-fit,minmax(300px,1fr));
        grid-gap: 10px;
    }
    .metc{
        padding: 20px;

    }
    .metc:nth-child(3n+1){
        background-color: #fbfc9a
    }
    .metc:nth-child(3n+2){
        background-color: #fbc13c;
    }
    .metc:nth-child(3n+0){
        background-color: #fb933c;
    }

    button{

        background-color: #fde36b;
        border: 2px solid #fb933c;
        border-radius:6px;
        text-align: center;
        font-size: 20px;
    }
</style>