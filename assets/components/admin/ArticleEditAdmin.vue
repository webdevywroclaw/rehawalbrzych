<template>
    <transition name="fade">
    <div class="articles-admin" v-if="loaded">

        <h1>Edycja artykułu {{$route.params.id}}</h1>
        <form>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Tytuł: </label>
                <div class="col-sm-10">
                    <input type="text" id="title" class="form-control" placeholder="Tytuł artykułu" v-model="jsondata.title">
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
                <div class="col-sm-12">
                    <select class="custom-select" required v-model="jsondata.authId">
                        <option value="">Wybierz autora</option>
                        <option v-for="therapist in therapists" :value="therapist.therapId">{{therapist.therapName}} {{therapist.therapSurname}}</option>
                    </select>
                </div>
            </div>

        </form>

        <button type="button" class="btn btn-success" @click="updateArticle">Zapisz</button>
        <div v-if="saved">Zapisano</div>

    </div>
    </transition>
</template>

<script>
    export default {
        name: 'ArticleEditAdmin',
        data() {
            return {
                saved: false,
                loaded: false,
                article: {
                    "0":{},
                    "photos":[]
                },
                galleries: [],
                categories: [],
                therapists: [],
                jsondata: {
                    title: '',
                    body: '',
                    galId: '',
                    catId: '',
                    authId: ''
                }
            }
        },
        methods: {
            fetchArticle() {
                this.$http.get('/api/article/'+this.$route.params.id,
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        }
                    }
                )
                    .then(response => response.json())
                    .then(result => {
                        this.article = result
                        this.updateJsonData()
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
                this.$http.get('/api/categories/kind/artykul',
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
            fetchTherapists() {
                this.$http.get('/api/therapeutists',
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        }
                    }
                )
                    .then(response => response.json())
                    .then(result => this.therapists = result)
            },
            updateJsonData() {
                if(this.article!=null){
                    this.jsondata.id = this.$route.params.id
                    this.jsondata.title = this.article[0].artTitle
                    this.jsondata.body = this.article[0].artBody

                }
            },
            updateArticle(){
                this.$http.post(
                    '/api/article',
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
            },
            deleteArticle(id) {
                if(confirm("Czy na pewno chcesz usunąć artykuł?")){
                    this.$http.delete(
                        '/api/articles/' + id,
                        {name: this.jsondata.name},
                        {
                            headers: {}
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
            }
        },
        created: function () {
            this.fetchArticle();
            this.fetchGalleries();
            this.fetchCategories();
            this.fetchTherapists();
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
        overflow-y: overlay;
        margin: auto;
    }

    .fade-enter-active {
        transition: opacity 1s;
    }
    .fade-enter /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
