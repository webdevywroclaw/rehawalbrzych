<template>
    <div class="articles-admin">
        <h1>Artykuły</h1>
        <form>
            <input placeholder="Enter Name" v-model="jsondata.name">

            <button class="btn btn-success" v-on:click="addCategory">Dodaj</button>
        </form>

        <!--<router-link to="/articles/add" class="btn btn-success">Dodaj</router-link>-->

        <table class="table table-hover">
            <tr>
                <th>Id</th>
                <th>Tytuł</th>
                <th>Treść</th>
                <th>Nazwa galerii</th>
                <th>Edycja</th>
            </tr>
            <tr v-for="article in articles">
                <td>{{article.artId}}</td>
                <td>{{article.artTitle}}</td>
                <td class="artbody">{{article.artBody}}</td>
                <td>{{article.galleryGal.galName}}</td>
                <!--<td><router-link v-bind:to="'/categories/'+article.catId+'/edit'" class="btn btn-success">Edytuj</router-link></td>-->
                <td><button v-on:click="deleteCategory(article.catId)" class="btn btn-success">Usuń</button></td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        name: 'Admin',
        data() {
            return {
                articles: [],
                jsondata: {
                    name: ''
                }
            }
        },
        methods: {
            fetchArticles() {
                this.$http.get('http://127.0.0.1/reha/rehawalbrzych/api/public/articles',
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        }
                    }
                )
                    .then(response => response.json())
                    .then(result => this.articles = result)
            },
            addCategory(){
                this.$http.post(
                    'http://127.0.0.1/reha/rehawalbrzych/api/public/categories',
                    {name: this.jsondata.name},
                    {
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(function (response) {
                    console.log('Success!:', response.data);
                    this.loading = false;
                    this.fetchArticles();
                }, function (response) {
                    console.log('Error!:', response.data);
                    this.loading = false;
                });
            },
            deleteCategory(id){
                this.$http.delete(
                    'http://127.0.0.1/reha/rehawalbrzych/api/public/categories/'+id,
                    {name: this.jsondata.name},
                    {
                        headers: {
                        }
                    })
                    .then(function (response) {
                        console.log('Success!:', response.data);
                        this.loading = false;
                        this.fetchArticles();
                    }, function (response) {
                        console.log('Error!:', response.data);
                        this.loading = false;
                    });
            }
        },
        created: function () {
            this.fetchArticles();
        }
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    /*.admin {*/

        /*margin: auto;*/
        /*display: grid;*/
        /*grid-template-columns: 1fr 1fr;*/
        /*grid-row-gap: 20px;*/


    /*}*/

    #image {
        border: 2px solid black;
        grid-column: 1/-1;
        justify-self: center;
    }

    .trailerBox {
        grid-column: 1/-1;
        display: grid;
        grid-gap: 20px;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    }

    .trailer {
        font-size: 20px;
        border: 2px solid black;
        height: 200px;
        text-align: center;
    }

    .offerBox {
        grid-column: -1/1;
        display: grid;
        grid-template-columns: repeat(8, auto);
        grid-template-rows: auto auto;
        grid-gap: 10px;


    }

    .offer {
        grid-auto-flow: dense;
        grid-column: span 3;

        border: 1px solid black;



    }

    .artbody {
        max-width: 50px;
        word-wrap: break-word;
    }
</style>
