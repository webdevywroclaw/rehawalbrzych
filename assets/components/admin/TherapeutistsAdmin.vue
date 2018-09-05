<template>
    <transition name="fade">
    <div class="articles-admin" v-if="loaded">

        <h1>Dodawanie terapeuty</h1>
        <form>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Imię terapeuty: </label>
                <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" placeholder="Imię terapeuty" v-model="jsondata.name">
                </div>
            </div>

            <div class="form-group row">
                <label for="surname" class="col-sm-2 col-form-label">Nazwisko terapeuty: </label>
                <div class="col-sm-10">
                    <input type="text" id="surname" class="form-control" placeholder="Nazwisko terapeuty" v-model="jsondata.surname">
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">O terapeucie: </label>
                <div class="col-sm-10">
                    <textarea class="form-control rounded-0" id="content" rows="10" v-model="jsondata.desc"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="short" class="col-sm-2 col-form-label">Krótki opis: </label>
                <div class="col-sm-10">
                    <input type="text" id="short" class="form-control" placeholder="Krótki opis" v-model="jsondata.short">
                </div>
            </div>

            <h2>Edukacja</h2>

            <div class="form-group row">
                <label for="schools" class="col-sm-2 col-form-label">Wykształcenie: </label>
                <div class="col-sm-8">
                    <input type="text" id="schools" class="form-control" v-model="act_school">
                </div>
                <button type="button" class="col-sm-2 btn btn-success" @click="addSchool(act_school)">Dodaj</button>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <table class="table table-hover">
                        <tr><th>Dodane szkoły</th></tr>
                        <tr v-for="(school, index) in jsondata.schools">
                            <th>{{school}}  <span class="deletebutton" @click="deleteSchool(index)">x</span></th>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="form-group row">
                <label for="schools" class="col-sm-2 col-form-label">Szkolenia: </label>
                <div class="col-sm-8">
                    <input type="text" id="courses" class="form-control" v-model="act_course">
                </div>
                <button type="button" class="col-sm-2 btn btn-success" @click="addCourse(act_course)">Dodaj</button>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <table class="table table-hover">
                        <tr><th>Dodane szkolenia</th></tr>
                        <tr v-for="(course, index) in jsondata.courses">
                            <th>{{course}}  <span class="deletebutton" @click="deleteCourse(index)">x</span></th>
                        </tr>
                    </table>
                </div>
            </div>


            <div class="form-group row">
                <label for="methods" class="col-sm-2 col-form-label">Metody: </label>
                <div class="col-sm-8">
                    <select id="methods" class="custom-select" v-model="act_method">
                        <option value="">Wybierz metodę</option>
                        <option v-for="method in methods" :value="method">{{method.metName}}</option>
                    </select>
                </div>
                <button type="button" class="col-sm-2 btn btn-success" @click="addMethod(act_method)">Dodaj</button>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <table class="table table-hover">
                        <tr><th>Dodane metody</th></tr>
                        <tr v-for="(method, index) in jsondata.methods">
                            <th>{{method.metName}}  <span class="deletebutton" @click="deleteMethod(index)">x</span></th>
                        </tr>
                    </table>
                </div>
            </div>

            <span>Wybierz zdjęcie dla terapeuty:</span>
            <div class="custom-file col-md-4 mb-4">
                <input class="custom-file-input" type="file" @change="onFileSelected">
                <label class="custom-file-label" >Wybierz zdjęcie terapeuty...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>

        </form>
        <button type="button" class="btn btn-success" @click="addTherapeutist">Dodaj terapeutę</button>

        <h1>Terapeuci</h1>
        <!--<router-link to="/articles/add" class="btn btn-success">Dodaj</router-link>-->
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>O mnie</th>
                <th>Krótki opis</th>
                <th>Zdjęcie</th>
                <th>Edycja</th>
                <th>Usuń</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="therapeutist in therapeutists">
                <td>{{therapeutist.therapId}}</td>
                <td>{{therapeutist.therapName}}</td>
                <td>{{therapeutist.therapSurname}}</td>
                <td class="artbody">{{therapeutist.therapDesc}}</td>
                <td>{{therapeutist.therapShort}}</td>
                <td><img v-if="therapeutist.photoPhoto!=null" :src="therapeutist.photoPhoto.photoSrc" /></td>
                <!--<td><router-link v-bind:to="'/categories/'+article.catId+'/edit'" class="btn btn-success">Edytuj</router-link></td>-->
                <td>
                    <router-link class="btn btn-success" :to="'/admin/therapeutist/'+therapeutist.therapId">Edytuj terapeutę</router-link>
                </td>
                <td>
                    <button v-on:click="deleteTherapist(therapeutist.therapId)" class="btn btn-success">Usuń</button>
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
                act_method: '',
                act_school: '',
                act_course: '',
                therapeutists: [],
                methods: [],
                jsondata: {
                    name: '',
                    surname: '',
                    desc: '',
                    short: '',
                    education: [],
                    methods: [],
                    schools: [],
                    courses: []
                },
                selectedFile: null
            }
        },
        methods: {
            // Get all therapists from the API and put them into data->therapeutists
            fetchTherapeutists() {
                this.$http.get('/api/therapeutists',
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        }
                    }
                )
                    .then(response => response.json())
                    .then(result => {
                        this.therapeutists = result
                        this.loaded = true
                    })
            },
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
                    .then(result => this.methods = result)
            },
            onFileSelected(event){
                this.selectedFile = event.target.files[0]
            },
            addTherapeutist(){
                const fd = new FormData()
                fd.append('myFile', this.selectedFile, this.selectedFile.name)
                fd.append('json', JSON.stringify(this.jsondata))
                this.$http.post(
                    '/api/therapeutists',
                    fd,
                    {
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(function (response) {
                        console.log('Success!:', response.data);
                        this.loading = false;
                        this.fetchTherapeutists();
                    }, function (response) {
                        console.log('Error!:', response.data);
                        this.loading = false;
                    });
            },
            deleteTherapist(id) {
                this.$http.delete(
                    '/api/therapeutists/' + id,
                    {name: this.jsondata.name},
                    {
                        headers: {}
                    })
                    .then(function (response) {
                        console.log('Success!:', response.data);
                        this.loading = false;
                        this.fetchTherapeutists();
                    }, function (response) {
                        console.log('Error!:', response.data);
                        this.loading = false;
                    });
            },
            addMethod(method) {
                this.jsondata.methods.push(method);
            },
            addSchool(school) {
                this.jsondata.schools.push(school);
            },
            addCourse(course) {
                this.jsondata.courses.push(course);
            },
            deleteSchool(index) {
                this.jsondata.schools.splice(index,1);
            },
            deleteCourse(index) {
                this.jsondata.courses.splice(index,1);
            },
            deleteMethod(index) {
                this.jsondata.methods.splice(index,1);
            }
        },
        created: function () {
            this.fetchTherapeutists();
            this.fetchMethods();
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

    .form-group {
        text-align: center;
    }

    .deletebutton {
        cursor: pointer;
    }

    img {
        max-height: 100px;
        max-width: 100px;
    }

    body {
        background-color: black;
    }

    .fade-enter-active {
        transition: opacity 1s;
    }
    .fade-enter /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }

</style>
