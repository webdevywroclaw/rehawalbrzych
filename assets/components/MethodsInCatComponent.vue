<template>

    <div>
        <h1 class="title">{{this.category[0].catName}}</h1>

        <div class="metcat">
            <div class="metc" v-for="methodInCatApi in methodsInCatApi"
                 v-bind:methodInCatApi="methodInCatApi"
                 v-if="methodInCatApi.categoryCat!= null && methodInCatApi.categoryCat.catId == $route.params.id">

                <h1>{{methodInCatApi.metName}}</h1>
                <router-link :to="{ name: 'MethodSingleComponent',params:{id: methodInCatApi.metId}}">
                    <button>Więcej</button>
                </router-link>


            </div>
        </div>
    </div>


</template>

<script>
    export default {
        data() {
            return {
                methodsInCatApi: [],
                category: {
                    0: {
                        catName: ''
                    }
                },
                catLoading: true,
                testinput: 'kkk'
            }
        },

        metaInfo () {

            return {
                title: 'Rehawalbrzych', // set a title
                titleTemplate: '%s - metody terapii', // title is now "My Example App - Yay!"
                htmlAttrs: {
                    lang: 'pl',
                    amp: undefined // "amp" has no value
                },
                meta: [
                    {
                        name: 'description',
                        content: 'Metody terapii. Rehawalbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,metody,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Metody terapii. Rehawalbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ],
                changed (newInfo, addedTags, removedTags) {
                    console.log('Meta info was updated!')
                }
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
                        // this.loaded = true
                    })
            },

            fetchCategory() {
                this.$http.get('/api/categories/' + this.$route.params.id,
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        }
                    }
                )
                    .then(response => response.json())
                    .then(result => {
                        this.category = result
                        document.title = 'RehaWałbrzych - kategoria metod terapii: ' + this.category[0].catName;

                    })
            }
        },

        // watch: {
        //     category: function(newCat, oldCat){
        //          this.testinput = newCat[0].catName + ' papapara';
        //     }
        // },

         // computed: {
         //    comp: function () {
         //        return this.category[0].catName + 'lllll'
         //    }
         // },

        created: function () {
            this.fetchMethodsInCat();
            this.fetchCategory();
        },

        // computed: {
        //     cat: function () {
        //         this.$http.get('/api/categories/' + this.$route.params.id,
        //             {
        //                 headers: {
        //                     'Content-Type': 'application/x-www-form-urlencoded',
        //                     'Accept': 'application/json'
        //                 }
        //             }
        //         )
        //             .then(response => response.json())
        //             .then(result => {
        //                 this.category = result
        //                 this.loaded = true
        //             })
        //         return this.category;
        //     }
        // },
    }
</script>

<style scoped>
    .methods {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }

    .metcat {

        margin: 10px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-gap: 10px;
    }


    .metc {
        padding: 20px;

    }

    .metc:nth-child(3n+1) {
        background-color: #FDDCBB;
    }

    .metc:nth-child(3n+2) {
        background-color: #FECB6E;
    }

    .metc:nth-child(3n+0) {
        background-color: #FD996B;
    }

    .title {
        border-bottom: dotted 1px #FD996B;
        margin: 10px;
        padding: 4px;
    }

    button {

        background-color: #fde36b;
        border: 2px solid #fb933c;
        border-radius: 6px;
        text-align: center;
        font-size: 20px;
    }
</style>