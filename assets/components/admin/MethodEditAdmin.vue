<template>
    <transition name="fade">
    <div v-cloak class="method-edit-admin" v-if="loaded">
        <h1>Edycja Metody {{$route.params.id}}</h1>
        <!--<button @click="updateJsonData">Pobierz dane</button>-->
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

        </form>
        <button type="button" class="btn btn-success" @click="updateMethod">Zapisz</button>
        <div v-if="saved">Zapisano</div>

    </div>
    </transition>
</template>

<script>
    export default {
        name: 'MethodEditAdmin',
        data() {
            return {
                saved: false,
                loaded: false,
                method: {
                    "0":{},
                    "photos":[]
                },
                categories: [],
                galleries: [],
                jsondata: {
                    id: '',
                    title: '',
                    body: '',
                    price: '',
                    galId: '',
                    catId: ''
                },
                selectedFile: null
            }
        },
        methods: {
            fetchMethod() {
                this.$http.get('/api/method/'+ this.$route.params.id,
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        }
                    }
                )
                    .then(response => response.json())
                    .then(result => {
                        this.method = result
                        this.updateJsonData()
                        this.loaded = true
                    })
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
            updateJsonData() {
                if(this.method!=null){
                    this.jsondata.id = this.$route.params.id
                    this.jsondata.title = this.method[0].metName
                    this.jsondata.body = this.method[0].metBody
                    this.jsondata.price = this.method[0].metPrice
                }
            },
            updateMethod(){
                this.$http.post(
                    '/api/method',
                    JSON.stringify(this.jsondata),
                    {
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(function (response) {
                        console.log('Success!:', response.data);
                        this.saved = true;
                        this.loading = false;
                    }, function (response) {
                        console.log('Error!:', response.data);
                        this.loading = false;
                    });
            }
        },
        created: function () {
            this.fetchMethod()
            this.fetchCategories()
            this.fetchGalleries()
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

    .deletebutton {
        cursor: pointer;
    }

    [v-cloak] { display:none; }

    .fade-enter-active, .fade-leave-active {
        transition: opacity 1s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
