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

      }
   },
      created: function () {
          this.fetchTherapists();
      }
  }
</script>

<style scoped>

  .therapists{
    margin-top:20px;
    display:grid;
    grid-gap: 10px;
    grid-template-columns: repeat(auto-fit,minmax(350px,1fr));
  }

 
</style>
