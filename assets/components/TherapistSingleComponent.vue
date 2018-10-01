<template>

<div class="therapeutist">

  <div class="therapinfo" >
    <img class="teraphoto" v-bind:src="therapeutist[0].photoPhoto.photoSrc" :alt="'Avatar - '+ therapeutist[0].therapName + ' ' + therapeutist[0].therapSurname">
    <h1>{{therapeutist[0].therapName}}</h1>
    <h1>{{therapeutist[0].therapSurname}}</h1>
  </div>

  <div class="therapdesc">
    <p>{{therapeutist[0].therapDesc}}</p>
  </div>

  <div v-if="therapeutist.schools.length != 0" id="icon1">
    <font-awesome-icon icon="graduation-cap" id="graduate" />
  </div>

  <div v-if="therapeutist.schools.length != 0" class="study">
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
    <ul>

        <router-link v-for="method in therapeutist.methods" :key="method" class="methodlink" :to="'/metoda/'+method.metId.metId">
          <li>
          <h4>{{method.metId.metName}}
          <font-awesome-icon id="external-link-alt" icon="external-link-alt"></font-awesome-icon></h4>
          </li>
        </router-link>

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
    background-color: #FD996B;
  }
  .therapdesc{
    background-color: #ffede5;
    padding: 0 10px;
  }

  #icon1{
    background-color: #FECB6E;

  }
  .study{
    background-color: #FFEEA6;
    padding-right: 10px;
  }
  #icon2{
    background-color: #FDDCBB;
    padding: 10px 0;

  }
  .courses{
    background-color: #ffefe0;
    padding-right: 10px;
  }
  #icon3{
    background-color: #FFF1CD;
    padding: 10px 0;
  }
  .thermet{
    background-color: #fff7e2;
    padding-right: 10px;
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
