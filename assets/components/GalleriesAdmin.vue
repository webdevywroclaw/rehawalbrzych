<template>
    <transition name="fade">
    <div class="galleries-admin" v-if="loaded">

        <h1>Dodawanie galerii</h1>
        <form>
            <input placeholder="Wpisz nazwę galerii" v-model="jsondata.name">
            <button type="button" @click="addGallery" class="btn btn-success" >Dodaj</button>
        </form>


        <h1>Galerie</h1>
        <table class="table table-hover">
            <tr>
                <th>Id</th>
                <th>Nazwa</th>
                <th>Akcja</th>
            </tr>
            <tr v-for="gallery in galleries">

                <td>{{gallery.galId}}</td>
                <td>{{gallery.galName}}</td>
                <td>
                    <router-link class="btn btn-success" :to="'/admin/gallery/'+gallery.galId">Przeglądaj i dodaj zdjęcie</router-link>
                    <button v-on:click="deleteGallery(gallery.galId)" class="btn btn-success">Usuń</button>
                </td>

            </tr>
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
                galleries: [],
                jsondata: {
                    name: ''
                }
            }
        },
        methods: {
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
                    .then(result => {
                        this.galleries = result
                        this.loaded = true
                    })
            },
            addGallery() {
                this.$http.post(
                    '/api/galleries',
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
                        this.fetchGalleries();
                    }, function (response) {
                        console.log('Error!:', response.data);
                        this.loading = false;
                    });
            },
            deleteGallery(id) {
                this.$http.delete(
                    '/api/galleries/' + id,
                    {name: this.jsondata.name},
                    {
                        headers: {}
                    })
                    .then(function (response) {
                        console.log('Success!:', response.data);
                        this.loading = false;
                        this.fetchGalleries();
                    }, function (response) {
                        console.log('Error!:', response.data);
                        this.loading = false;
                    });
            }
        },
        created: function () {
            this.fetchGalleries();
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
    [v-cloak] {
        display:none !important;
    }
    .fade-enter-active {
        transition: opacity 1s;
    }
    .fade-enter /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
