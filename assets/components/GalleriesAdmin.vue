<template>
    <div class="galleries-admin">
        <h1>Galerie</h1>
        <form>
            <input placeholder="Enter Name" v-model="jsondata.name">

            <button class="btn btn-success" v-on:click="addCategory">Dodaj</button>
        </form>


        <table class="table table-hover">
            <tr>
                <th>Id</th>
                <th>Nazwa</th>
                <th>Akcja</th>
            </tr>
            <tr v-for="gallery in galleries">

                <td>{{gallery.galId}}</td>
                <td>{{gallery.galName}}</td>
                <td><a class="btn btn-success" :href="'/admin/gallery/'+gallery.galId">Przeglądaj i dodaj zdjęcie</a></td>

            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        name: 'Admin',
        data() {
            return {
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
                    .then(result => this.galleries = result)
            },
            addCategory() {
                this.$http.post(
                    'api/categories',
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
            deleteCategory(id) {
                this.$http.delete(
                    'api/categories/' + id,
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
</style>
