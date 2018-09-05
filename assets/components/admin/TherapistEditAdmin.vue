<template>
    <transition name="fade">
    <div v-cloak class="gallery-edit-admin" v-if="loaded">
        <h1>Edycja terapeuty {{$route.params.id}}</h1>
        <!--<button @click="updateJsonData">Pobierz dane</button>-->
        <form>
            <h2>Zdjęcie</h2>
            <div class="form-group row">
                <b class="col-sm-2">Aktualne zdjęcie:</b>
                <img class="col-sm-4" v-if="therapeutist[0].photoPhoto!=null" :src="therapeutist[0].photoPhoto.photoSrc" />
                <span class="col-sm-2">Wybierz zdjęcie dla terapeuty:</span>
                <div class="col-sm-4">
                    <input class="custom-file-input" type="file" @change="onFileSelected">
                    <label class="custom-file-label" >Wybierz zdjęcie terapeuty...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
            </div>

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

        </form>
        <button type="button" class="btn btn-success" @click="updateTherapist">Zapisz</button>
        <div v-if="saved">Zapisano</div>
    </div>
    </transition>
</template>

<script>
    export default {
        name: 'Admin',
        data() {
            return {
                saved: false,
                loaded: false,
                act_school: '',
                act_course: '',
                act_method: '',
                methods: [],
                therapeutist: {
                    "0": {
                    },
                    "schools": [
                    ],
                    "courses": [
                    ],
                    "methods": [
                    ]
                },
                jsondata: {
                    name: '',
                    surname: '',
                    id: '',
                    desc: '',
                    short: '',
                    schools: [],
                    courses: [],
                    methods: []
                },
                selectedFile: null
            }
        },
        methods: {
            fetchTherapist() {
                this.$http.get('/api/therapeutist/'+ this.$route.params.id,
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        }
                    }
                )
                    .then(response => response.json())
                    .then(result => {
                        this.therapeutist = result
                        this.updateJsonData()
                        this.loaded = true
                    })


                // setTimeout(this.updateJsonData, 1500)

                // this.jsondata.name = this.therapeutist[0].therapName
                // this.jsondata.surname = this.therapeutist[0].therapSurname
                // this.jsondata.desc = this.therapeutist[0].therapDesc
                // this.jsondata.methods = this.therapeutist['methods']
                // this.jsondata.schools = this.therapeutist['schools']
                // this.jsondata.courses = this.therapeutist['courses']
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
            },
            updateJsonData() {
                if(this.therapeutist!=null){
                    this.jsondata.id = this.$route.params.id
                    this.jsondata.name = this.therapeutist[0].therapName
                    this.jsondata.surname = this.therapeutist[0].therapSurname
                    this.jsondata.desc = this.therapeutist[0].therapDesc
                    this.jsondata.short = this.therapeutist[0].therapShort
                    this.jsondata.methods = []
                    for(var i =0; i< this.therapeutist['methods'].length; i++)
                    {
                        this.jsondata.methods.push(this.therapeutist['methods'][i]['metId'])
                    }
                    // this.jsondata.methods = this.therapeutist['methods']
                    this.jsondata.schools = []
                    for(var i =0; i< this.therapeutist['schools'].length; i++)
                    {
                        this.jsondata.schools.push(this.therapeutist['schools'][i]['eduItemName'])
                    }
                    this.jsondata.courses = []
                    for(var i =0; i< this.therapeutist['courses'].length; i++)
                    {
                        this.jsondata.courses.push(this.therapeutist['courses'][i]['eduItemName'])
                    }
                }
            },
            updateTherapist(){
                const fd = new FormData()
                if(this.selectedFile!=null){
                    fd.append('myFile', this.selectedFile, this.selectedFile.name)
                }
                fd.append('json', JSON.stringify(this.jsondata))
                this.$http.post(
                    '/api/therapeutistss',
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
                        this.saved = true;
                        this.fetchTherapist();
                    }, function (response) {
                        console.log('Error!:', response.data);
                        this.loading = false;
                    });
            }
        },
        created: function () {
            this.fetchTherapist();
            this.fetchMethods()
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

    img {
        max-height: 200px;
        max-width: 200px;
    }
</style>
