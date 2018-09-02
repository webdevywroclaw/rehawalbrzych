<template>
  <div v-if="$route.params.id === therapeutist[0].therapId">
    <img v-bind:src="therapeutist[0].photoPhoto.photoSrc">
    <h1>{{therapeutist[0].therapName}}</h1>
    <h1>{{therapeutist[0].therapSurname}}</h1>
    <h3>{{therapeutist[0].therapDesc}}</h3>

    <h1>Wykształcenie:</h1>
    <ul>
      <li v-for="school in therapeutist.schools">
        <h3>{{school.eduItemName}}</h3>
      </li>
    </ul>

    <h1>Kursy:</h1>
    <ul>
      <li v-for="course in therapeutist.courses">
        <h3>{{course.eduItemName}}</h3>
      </li>
    </ul>

    <h1>Metody:</h1>
    <ul>
      <li v-for="method in therapeutist.methods">
        <h3>{{method.metId.metName}}</h3>
      </li>
    </ul>

</div>

<!--
  </div>
  <div v-else-if="$route.params.id === therapists[1].name">
    <img v-bind:src="therapists[1].photo">
    <h1>{{therapists[1].name}}</h1>
    <h1>{{therapists[1].surname}}</h1>
    <h3>{{therapists[1].longDescription}}</h3>
    <h1>{{therapists[1].education}}</h1>
    <h1>{{therapists[1].methods}}</h1>
  </div>
  <div v-else-if="$route.params.id === therapists[2].name">
    <img v-bind:src="therapists[2].photo">
    <h1>{{therapists[2].name}}</h1>
    <h1>{{therapists[2].surname}}</h1>
    <h3>{{therapists[2].longDescription}}</h3>
    <h1>{{therapists[2].education}}</h1>
    <h1>{{therapists[2].methods}}</h1>
  </div>
  <div v-else-if="$route.params.id === therapists[3].name">
    <img v-bind:src="therapists[3].photo">
    <h1>{{therapists[3].name}}</h1>
    <h1>{{therapists[3].surname}}</h1>
    <h3>{{therapists[3].longDescription}}</h3>
    <h1>{{therapists[3].education}}</h1>
    <h1>{{therapists[3].methods}}</h1>
  </div>
  -->
</template>

<script>
  export default {
      data() {
          return {
              therapeutist: {
                  "0": {},
                  "schools": [],
                  "courses": [],
                  "methods": []
              }
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
          this.fetchTherapist();
      }
  }
</script>

<style>

</style>
