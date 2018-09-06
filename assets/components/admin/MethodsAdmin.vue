<template>
    <transition name="fade">
    <div class="articles-admin" v-if="loaded">

        <h1>Dodawanie metody</h1>
        <form>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Nazwa: </label>
                <div class="col-sm-10">
                    <input type="text" id="title" class="form-control" placeholder="Nazwa metody" v-model="jsondata.title">
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">Treść: </label>
                <div class="col-sm-10">
                    <textarea class="form-control rounded-0" id="content" rows="10" v-model="jsondata.body"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <select class="custom-select" required v-model="jsondata.catId">
                        <option value="">Wybierz kategorię</option>
                        <option v-for="category in categories" :value="category.catId">{{category.catName}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <select class="custom-select" required v-model="jsondata.galId">
                        <option value="">Wybierz galerię</option>
                        <option v-for="gallery in galleries" :value="gallery.galId">{{gallery.galName}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Cena: </label>
                <div class="col-sm-10">
                    <input type="text" id="price" class="form-control" placeholder="Cena metody" v-model="jsondata.price">
                </div>
            </div>

            <button type="button" class="btn btn-success" @click="addMethod">Dodaj metodę</button>
        </form>

        <h1>Metody</h1>
        <!--<router-link to="/articles/add" class="btn btn-success">Dodaj</router-link>-->
        <table class="table table-hover">
            <tr>
                <th>Id</th>
                <th>Kategoria</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Nazwa galerii</th>
                <th>Cena</th>
                <th>Edycja</th>
                <th>Usuń</th>
            </tr>
            <tbody>
            <tr v-for="method in methods">
                <td>{{method.metId}}</td>
                <td>{{method.categoryCat.catName}}</td>
                <td>{{method.metName}}</td>
                <td v-html="method.metBody" class="artbody"></td>
                <td>{{method.galleryGal.galName}}</td>
                <td>{{method.metPrice}}</td>
                <!--<td><router-link v-bind:to="'/categories/'+article.catId+'/edit'" class="btn btn-success">Edytuj</router-link></td>-->
                <td>
                    <router-link class="btn btn-success" :to="'/admin/method/'+method.metId">Edytuj</router-link>
                </td>
                <td>
                    <button v-on:click="deleteMethod(method.metId)" class="btn btn-success">Usuń</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    </transition>
</template>

<script>
    export default {
        name: 'Admin',
        data() {
            return {
                loaded: false,
                methods: [],
                galleries: [],
                categories: [],
                jsondata: {
                    title: '',
                    body: '',
                    price: '',
                    galId: '',
                    catId: ''
                }
            }
        },
        methods: {
            fetchMethods() {
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
                        this.methods = result
                        this.loaded = true
                    })
            },
            fetchGalleries() {
                this.$http.get('/api/galleries',
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        }
                    }
                )
                    .then(response => response.json())
                    .then(result => this.galleries = result)
            },
            fetchCategories() {
                this.$http.get('/api/categories/kind/metoda',
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        }
                    }
                )
                    .then(response => response.json())
                    .then(result => this.categories = result)
            },
            addMethod(){
                this.$http.post(
                    '/api/methods',
                    JSON.stringify(this.jsondata),
                    {
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(function (response) {
                        console.log('Success!:', response.data);
                        this.loading = false;
                        this.fetchMethods();
                    }, function (response) {
                        console.log('Error!:', response.data);
                        this.loading = false;
                    });
            },
            deleteMethod(id) {
                if (confirm("Czy na pewno chcesz usunąć metodę?")) {
                    this.$http.delete(
                        '/api/methods/' + id,
                        {name: this.jsondata.name},
                        {
                            headers: {}
                        })
                        .then(function (response) {
                            console.log('Success!:', response.data);
                            this.loading = false;
                            this.fetchMethods();
                        }, function (response) {
                            console.log('Error!:', response.data);
                            this.loading = false;
                        });
                }
            }
        },
        created: function () {
            this.fetchMethods();
            this.fetchGalleries();
            this.fetchCategories();
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
        display: block;
        min-width: 100px;
        max-width: 450px;
        word-wrap: break-word;
        max-height: 150px;
        overflow-y: scroll;
        margin: auto;
    }

    .fade-enter-active {
        transition: opacity 1s;
    }
    .fade-enter /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }

</style>
