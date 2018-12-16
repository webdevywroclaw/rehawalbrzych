<template>

<div class="therapeutist">

  <div class="therapinfo" >
    <img class="teraphoto" v-bind:src="therapeutist[0].photoPhoto.photoSrc" :alt="'Avatar - '+ therapeutist[0].therapName + ' ' + therapeutist[0].therapSurname">
    <h1>{{therapeutist[0].therapName}}</h1>
    <h1>{{therapeutist[0].therapSurname}}</h1>
  </div>

  <div class="therapdesc">
    <h1 class="title bl">O mnie</h1>
    <p>{{therapeutist[0].therapDesc}}</p>
  </div>

  <div v-if="therapeutist.schools.length != 0" id="icon1">
    <font-awesome-icon icon="graduation-cap" id="graduate" />
  </div>

  <div v-if="therapeutist.schools.length != 0" class="study">
    <h1 class="title pl">Edukacja</h1>
    <ul>
      <li v-for="school in therapeutist.schools">
        <h4>{{school.eduItemName}}</h4>
      </li>
    </ul>
  </div>


  <div  v-if="therapeutist.courses.length != 0" id="icon2">
    <font-awesome-icon icon="clipboard-check" id="clipboard"/>
  </div>

  <div v-if="therapeutist.courses.length != 0" class="courses">
    <h1 class="title bl" >Kursy</h1>
    <ul>
      <li v-for="course in therapeutist.courses">
        <h4>{{course.eduItemName}}</h4>
      </li>
    </ul>
  </div>

  <div v-if="therapeutist.methods.length != 0" id="icon3">
    <font-awesome-icon icon="list-alt" id="listalt"/>
  </div>

  <div v-if="therapeutist.methods.length != 0" class="thermet">
    <h1 class="title pl">Metody</h1>
    <ul>

        <router-link v-for="method in therapeutist.methods" v-if="method.metId.metBody!=''" :key="method" class="methodlink" :to="'/metoda/'+method.metId.metId">
          <li>
          <h4>{{method.metId.metName}}
          <font-awesome-icon id="external-link-alt" icon="external-link-alt"></font-awesome-icon></h4>
          </li>
        </router-link>

      <li v-for="method in therapeutist.methods" v-if="method.metId.metBody==''" class="methodlink">
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
                      document.title = 'RehaWałbrzych - terapeuta: ' + this.therapeutist[0].therapName + ' ' + this.therapeutist[0].therapSurname
                      document.head.querySelector('meta[name=description]').content = 'Terapeuta '+ this.therapeutist[0].therapName + " "  + this.therapeutist[0].therapSurname+'. RehaWałbrzych - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu.'
                  })
          }
      },
      created: function () {
          this.fetchTherapist();
      }
  }
</script>

<style scoped>
  .therapinfo{

  }
  .title {
    margin: 0 10px 10px 10px;
    padding: 4px;
  }
  .pl{
    border-bottom: dotted 2px rgba(235,1,101,0.6);
  }
  .bl{
    border-bottom: dotted 2px #25D9E8;
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
    background-color: rgb(83,225,237);
  }
  .therapdesc{
    background-color: rgba(83,225,237,0.1);
    padding: 10px 10px;
  }

  #icon1{
    background-color: #FECB6E;
    background-color: rgba(235,1,101,0.6);
  }
  .study{
    background-color: #FFEEA6;
    background-color: rgba(255,95,255,0.15);
    padding: 10px 10px;
  }
  #icon2{
    background-color: rgb(83,225,237);
    padding: 10px 0;

  }
  .courses{
    background-color: rgba(83,225,237,0.1);
    padding: 10px 10px;
  }
  #icon3{
    background-color:  rgba(235,1,101,0.6);
    padding: 10px 0;
  }
  .thermet{
    background-color: rgba(255,95,255,0.15);
    padding: 10px 10px;
  }
  p{
    margin:10px;
    text-align: justify;
    font-size: 18px;
  }

  h4{
    margin: 0px;
    font-size: 18px;
    text-align: justify;
  }
  p{
    margin: 0px;
  }
  li{
    margin: 0px;
  }
  ul{
    margin: 0px;
  }
  h1{
    font-size: 30px;
  }

  .methodlink:active, .methodlink:link, .methodlink:visited, .methodlink:hover {
    color: black;
    text-decoration: none;
  }
  @media (min-width: 500px){
    .therapeutist{
      display: grid;
      grid-template-columns: 200px 1fr 1fr 1fr 200px;
    }
    .therapdesc{
      grid-column: 2/6;
    }
    .study{
      grid-column: 2/6;
    }
    .courses{
      grid-column: 2/6;
    }
    .thermet {
      grid-column: 2/6;
    }
    li{
      margin: 20px;
    }
    h4,p{
      margin: 10px;
    }
  }

</style>
