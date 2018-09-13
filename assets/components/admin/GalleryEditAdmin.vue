<template>
    <div class="gallery-edit-admin">
        <h1>Edycja galerii {{$route.params.id}}</h1>

        <form>

        <span>Dodaj zdjęcie do galerii:</span>
        <div class="custom-file col-md-4 mb-4">
            <input class="custom-file-input" type="file" @change="onFileSelected">
            <label class="custom-file-label" >Wybierz zdjęcie...</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
        </div>
        <div class="form-group row">
            <label for="desc" class="col-sm-2 col-form-label">Tytuł zdjęcia: </label>
            <div class="col-sm-10">
                <input type="text" id="desc" class="form-control" placeholder="Tytuł zdjęcia" v-model="jsondata.title">
            </div>
        </div>

        </form>

        <button type="submit" class="btn btn-success" @click="onUpload">Dodaj zdjęcie</button>



        <table class="table table-hover">
            <tr>
                <th>Id</th>
                <th>Tytuł zdjęcia</th>
                <th>Zdjęcie</th>
                <th>Usuń</th>
            </tr>
            <tr v-for="gallery in galleries">

                <td>{{gallery.photoId}}</td>
                <td>{{gallery.photoTitle}}</td>
                <td><img class="photo" :src="gallery.photoSrc" /></td>
                <td><button v-on:click="deletePhoto(gallery.photoId)" class="btn btn-success">Usuń</button></td>

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
                    title: ''
                },
                selectedFile: null
            }
        },
        methods: {
            fetchPhotos() {
                this.$http.get('/api/photos/'+ this.$route.params.id,
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
            onFileSelected(event){
                this.selectedFile = event.target.files[0]
            },
            onUpload(){
                const fd = new FormData()
                fd.append('myFile', this.selectedFile, this.selectedFile.name)
                fd.append('title', this.jsondata.title)
                fd.append('id', this.$route.params.id)
                this.$http.post(
                    '/api/photos',
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
                        this.fetchPhotos();
                    }, function (response) {
                        console.log('Error!:', response.error);
                        this.loading = false;
                    });
            },
            deletePhoto(id) {
                if (confirm("Czy na pewno chcesz usunąć zdjęcie?")) {
                    this.$http.delete(
                        '/api/photo/' + id,
                        {name: this.jsondata.name},
                        {
                            headers: {}
                        })
                        .then(function (response) {
                            console.log('Success!:', response.data);
                            this.loading = false;
                            this.fetchPhotos();
                        }, function (response) {
                            console.log('Error!:', response.data);
                            this.loading = false;
                        });
                }
            }
        },
        created: function () {
            this.fetchPhotos();
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


    img.photo {
        max-height: 150px;
    }

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
