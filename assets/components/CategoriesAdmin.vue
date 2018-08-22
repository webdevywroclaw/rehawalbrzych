<template>
    <div class="categories-admin">

        <form class="was-validated">
            <h1>Dodawanie kategorii</h1>
            <div>
                <span>Wybierz rodzaj kategorii:</span>
                <div class="radio">
                    <label><input type="radio" name="artykul" value="artykul" v-model="jsondata.kind">Artykuł</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="metoda" value="metoda" v-model="jsondata.kind">Metoda</label>
                </div>
                <span>Wpisz nazwę kategorii:</span>
                <input placeholder="Wpisz nazwę kategorii" v-model="jsondata.name">
                <!--<button class="btn btn-success" v-on:click="addCategory">Dodaj</button>-->
            </div>
            <br>
            <span>Wybierz zdjęcie dla kategorii:</span>
            <div class="custom-file col-md-4 mb-4">
                <input class="custom-file-input" type="file" @change="onFileSelected">
                <label class="custom-file-label" >Wybierz zdjęcie kategorii...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
        </form>
        <button type="submit" class="btn btn-success" @click="onUpload">Dodaj kategorię</button>
        <br><br>

        <!--<router-link to="/articles/add" class="btn btn-success">Dodaj</router-link>-->

        <h1>Kategorie</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Rodzaj</th>
                <th>Nazwa</th>
                <th>Zdjęcie</th>
                <th>Edycja</th>
            </tr>
            </thead>

            <tr v-for="article in articles">
                <td>{{article.catId}}</td>
                <td>{{article.catKind}}</td>
                <td>{{article.catName}}</td>
               <td><img v-if="article.photoId!=null" :src="article.photoId.photoSrc" /></td>
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
                    name: '',
                    kind: ''
                },
                selectedFile: null
            }
        },
        methods: {
            fetchArticles() {
                this.$http.get('/api/categories',
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
                    '/api/categories',
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
            onFileSelected(event){
                this.selectedFile = event.target.files[0]
            },
            onUpload(){
                const fd = new FormData()
                fd.append('myFile', this.selectedFile, this.selectedFile.name)
                fd.append('name', this.jsondata.name)
                fd.append('kind', this.jsondata.kind)
                this.$http.post(
                    '/api/categories',
                    fd,
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        },
                        progress(e) {
                            if (e.lengthComputable) {
                                console.log(e.loaded / e.total * 100);
                            }
                        }
                    })
                    .then(function (response) {
                        console.log('Success!:', response.data);
                        this.loading = false;
                        this.fetchArticles();
                    }, function (response) {
                        console.log('Error!:', response.error);
                        this.loading = false;
                    });
            },
            deleteCategory(id){
                this.$http.delete(
                    '/api/categories/'+id,
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

</style>
