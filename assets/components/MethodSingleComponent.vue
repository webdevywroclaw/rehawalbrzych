<template>
    <article>
        <header class="head">
            <title><h1>{{method[0].metName}}</h1></title>

        </header>
        <p>
            <span v-html="method[0].metBody"/>
        </p>
        <gallery-component v-if="method[0].galleryGal!=null" class="gal" :id="method[0].galleryGal.galId"></gallery-component>
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
    </article>

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
                        document.title = 'RehaWałbrzych - metoda terapii: ' + this.method[0].metName
                        document.head.querySelector('meta[name=description]').content = 'Metoda terapii:  '+ this.method[0].metName + '. RehaWałbrzych - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu.'
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
        },

        metaInfo () {

            return {
                title: 'Rehawalbrzych', // set a title
                titleTemplate: '%s - metoda', // title is now "My Example App - Yay!"
                htmlAttrs: {
                    lang: 'pl',
                    amp: undefined // "amp" has no value
                },
                meta: [
                    {
                        name: 'description',
                        content: 'Metoda terapii. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,metoda,metody,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Metoda terapii. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ],
                changed (newInfo, addedTags, removedTags) {
                    console.log('Meta info was updated!')
                }
            }
        },
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
        padding-left: 15px;
        list-style: none;
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

    title {
        display: block;
    }

    .therapists > h2 {
        font-size: 28px;
    }

    .therapists {
        border: 2px black;

    }

    .therapists>ul {
        list-style: none;
        padding-left: 0;
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
