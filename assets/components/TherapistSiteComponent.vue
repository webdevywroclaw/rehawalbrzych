<template>
  <div id="test">
    <div class="therapists" v-if="$route.name === 'TherapistSiteComponent'">
      <therapist-component v-for="therapeutistApi in therapeutistsApi" :key="therapeutistApi" :therapeutistApi="therapeutistApi" ></therapist-component>
    </div>
    <div v-else>
      <therapist-single-component></therapist-single-component>
    </div>
  </div>
</template>

<script>
  import TherapistComponent from './TherapistComponent'
  import TherapistSingleComponent from './TherapistSingleComponent'

  export default {
    data() {
      return {
          therapeutistsApi: [],
        /*
        therapists: [

          {
            name: 'Ada',
            surname: 'Kowalska',
            description: 'aaaaaaaaaaaaaaaaaa',
            longDescription: 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            photo: require('../assets/messi.jpg'),
            education: 'Wyższa Szkoła Gier i Zabaw w Baborowie',
            methods: 'Metoda nr 1 , Metoda nr 2, Metoda nr 3'

          },
          {
            name: 'Ela',
            surname: 'Nowak',
            description: 'bbbbbbbbbbbbbbbbbbb',
            longDescription: 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb',
            photo: require('../assets/rakitic.jpg'),
            education: 'Wyższa Szkoła Biegania w Brzegu Dolnym',
            methods: 'Metoda nr 3 , Metoda nr 2, Metoda nr 4'
          },
          {
            name: 'Basia',
            surname: 'Robak',
            description: 'cccccccccccccccccccc',
            longDescription: 'cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc',
            photo: require('../assets/pique.jpg'),
            education: 'Wyższa Szkoła Teatralna w Zabrzu',
            methods: 'Metoda nr 5 , Metoda nr 1, Metoda nr 6'
          },
          {
            name: 'Kasia',
            surname: 'Dziobak',
            description: 'ddddddddddddddddddddd',
            longDescription: 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd',
            photo: require('../assets/terstegen.jpg'),
            education: 'Wyższa Szkoła Gier i Zabaw w Baborowie',
            methods: 'Metoda nr 7 , Metoda nr 2, Metoda nr 5'
          }
        ]
        */
      }
    },
    components: {
      TherapistComponent,
      TherapistSingleComponent
    },
      methods:{
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
              .then(result => {
                  this.therapeutistsApi = result
                  this.loaded = true
              })


          // setTimeout(this.updateJsonData, 1500)

          // this.jsondata.name = this.therapeutist[0].therapName
          // this.jsondata.surname = this.therapeutist[0].therapSurname
          // this.jsondata.desc = this.therapeutist[0].therapDesc
          // this.jsondata.methods = this.therapeutist['methods']
          // this.jsondata.schools = this.therapeutist['schools']
          // this.jsondata.courses = this.therapeutist['courses']
      }
   },
      created: function () {
          this.fetchTherapists();
      }
  }
</script>

<style scoped>

  @media (min-width: 900px){
  .therapists{
    display:grid;
    grid-gap: 10px;
    grid-template-columns: repeat(auto-fit,minmax(300px,1fr));
  }
  }
 
</style>
