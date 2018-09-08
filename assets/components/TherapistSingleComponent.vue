<template>

<div class="therapeutist">

  <div class="therapinfo" >
    <img class="teraphoto" v-bind:src="therapeutist[0].photoPhoto.photoSrc">
    <h1>{{therapeutist[0].therapName}}</h1>
    <h1>{{therapeutist[0].therapSurname}}</h1>
  </div>

  <div class="therapdesc">
    <p>{{therapeutist[0].therapDesc}}</p>
  </div>

  <div id="icon1">
    <font-awesome-icon icon="graduation-cap" id="graduate" />
  </div>

  <div class="study">
    <ul>
      <li v-for="school in therapeutist.schools">
        <h4>{{school.eduItemName}}</h4>
      </li>
    </ul>
  </div>


  <div id="icon2">
    <font-awesome-icon icon="clipboard-check" id="clipboard"/>
  </div>

  <div class="courses">
    <ul>
      <li v-for="course in therapeutist.courses">
        <h4>{{course.eduItemName}}</h4>
      </li>
    </ul>
  </div>

  <div id="icon3">
    <font-awesome-icon icon="list-alt" id="listalt"/>
  </div>

  <div class="thermet">
    <ul>
      <li v-for="method in therapeutist.methods">
        <h4>{{method.metId.metName}}</h4>
      </li>
    </ul>
  </div>

</div>
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
  .therapinfo{

  }
  .therapeutist{
    display: grid;
    grid-template-columns: 200px 1fr 1fr 1fr 200px;
  }
  .teraphoto{
    height: 170px;
    width: 170px;
    border-radius: 100%;
    margin:10px;
  }
  #graduate,#clipboard,#listalt{
    height:100px;
    width: 100px;
    color: black;
  }

  .therapinfo{
    background-color: #E1702E;
    background-color: #FFED3D;
    background-color: #F59B67;
    background-color: #fb933c;
  }
  .therapdesc{
    background-color: #FFED3D;
    background-color: #FFF6CD;

    grid-column: 2/6;
  }

  #icon1{
    background-color: #fbc13c;

  }
  .study{
    background-color: #FFEEA6;

    grid-column: 2/6;
  }
  #icon2{
    background-color: #fde36b;

  }
  .courses{
    background-color: #FFFAAB;

    grid-column: 2/6;
  }
  #icon3{
    background-color: #fbfc9a;

  }
  .thermet{
    background-color: #FEFFBC;

    grid-column: 2/6;
  }
</style>
