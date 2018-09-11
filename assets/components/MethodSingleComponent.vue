<template>
    <div>
        <div class="head">
            <h1>{{method[0].metName}}</h1>

        </div>
        <span v-html="method[0].metBody"/>
        <gallery-component class="gal" :id="method[0].galleryGal.galId"></gallery-component>
        <div class="therapists">
            <h2 v-if="therapists.length!=1 && therapists.length!=0">Terapię prowadzą</h2>
            <h2 v-if="therapists.length==1">Terapię prowadzi</h2>
            <ul>
                <li v-for="therapist in therapists">
                    <router-link :to="'/terapeuta/'+therapist.therapId.therapId">
                        {{therapist.therapId.therapName}} {{therapist.therapId.therapSurname}}
                        <font-awesome-icon id="external-link-alt" icon="external-link-alt"></font-awesome-icon>
                    </router-link>
                </li>
            </ul>
        </div>
    </div>

</template>

<script>
    import GalleryComponent from '../components/GalleryComponent'

    export default {
        data() {
            return {
                therapists: [],
                method: {
                    "0": {},
                    "photos": []
                }
            }
        },
        components: {
            GalleryComponent
        },

        methods: {
            fetchMethod() {
                this.$http.get('/api/method/' + this.$route.params.id,
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
                        this.loaded = true
                    })
            },
            fetchTherapists() {
                this.$http.get('/api/therapeutists/' + this.$route.params.id,
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        }
                    }
                )
                    .then(response => response.json())
                    .then(result => {
                        this.therapists = result
                        this.loaded = true
                    })
            }
        },
        created: function () {
            this.fetchMethod();
            this.fetchTherapists();
        }
        /* props: ['methods'] */
    }
</script>

<style>
    span > p {
        padding-top: 15px;
        text-align: justify;
        width: 90%;
        margin: auto;
    }

    span > p:last-child {
        /*border-bottom: 1.5px dotted black;*/
        padding-bottom: 15px;
    }

    span>ul {
        text-align: left;
        width: 90%;
        margin: auto;
        margin-top: 10px;
    }
    span>h4 {
        text-align: left;
        width: 90%;
        margin: auto;
        margin-top: 10px;
        /*margin-bottom: 8px;*/
        font-size: 20px;
    }

    span>ul>h4 {
        text-align: left;
        margin-top: 10px;
        font-size: 20px;
    }

    .head {
        /*display: flex;*/
        /*width: 85%;*/
        margin: auto;
        margin-top: 25px;

    }

    .therapists > h2 {
        font-size: 28px;
    }

    .therapists {
        border: 2px black;

    }

    .therapists > ul > li > a:active, .therapists > ul > li > a:visited, .therapists > ul > li > a:link {
        font-size: 23px;
        color: black;
    }

    .therapists > ul > li > a:hover {
        text-decoration: none;
    }

    .gal {
        margin-bottom: 15px;
    }


</style>
