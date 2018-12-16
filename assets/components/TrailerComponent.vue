
<template>
    <transition name="fade">
    <ul v-if="loaded">
  <li v-for="item in items" v-bind:key="item" :id="item.cl">
      <div class="box1">

          <div id="trailer1" v-if="item.cl === 'number1'">

              <router-link :to="'/kontakt'" class="rlink">
                  <h3 class="box-title">{{item.boxTitle}}</h3>
              </router-link>
              <h4>Poniedziałek</h4><h4> 8.00-18.00</h4>
              <h4>Wtorek</h4><h4>8.00-18.00</h4>
              <h4>Środa</h4><h4>8.00-18.00</h4>
              <h4>Czwartek </h4><h4>8.00-18.00</h4>
              <h4>Piątek </h4><h4>8.00-18.00</h4>
              <h4>Sobota </h4><h4>nieczynne</h4>
              <h4>Niedziela</h4><h4>nieczynne</h4>

              <div class="buttoncenter">
                  <router-link :to="'/kontakt'">
                      <button type="button" class="icon" @click="top()">
                      <img v-bind:src="item.src" class="button-image" alt="Przycisk Kontakt">
                      </button>
                  </router-link>
              </div>

           </div>

          <div id="trailer2" v-if="item.cl === 'number2'">
              <router-link :to="'/terapeuci'" class="rlink"><h3 class="box-title">{{item.boxTitle}}</h3></router-link>
              <router-link :to="'/terapeuci'" class="rlink"><img id="therapimg" v-bind:src="therapeutistsApi[0].photoPhoto.photoSrc" :alt="'Avatar - ' + therapeutistsApi[0].therapName + ' ' + therapeutistsApi[0].therapSurname "></router-link>
              <h3>{{therapeutistsApi[0].therapName}} {{therapeutistsApi[0].therapSurname}}</h3>
              <router-link :to="'/terapeuci'">
                  <button type="button" class="icon" @click="top()">
                  <img v-bind:src="item.src" class="button-image filtr" alt="Przycisk Terapeuci">
                  </button>
              </router-link>
          </div>

          <div id="trailer3" v-if="item.cl === 'number3'">
              <h3 class="box-title">{{item.boxTitle}}</h3>
              <img id="turnusphoto" v-bind:src="item.photo" alt="Turnusy rehabilitacyjne">
              <p>Pragniemy poinformować, że w roku 2019 ruszamy z programem turnusów rehabilitacyjnych. Więcej informacji wkrótce!.</p>
          </div>

          <div id="trailer4" v-if="item.cl === 'number4'">
              <router-link :to="'/galeria'" class="rlink"><h3 class="box-title">{{item.boxTitle}}</h3></router-link>
              <img class="tphoto" v-bind:src="item.photo1" alt="Fotografia 1">
              <img class="tphoto" v-bind:src="item.photo2" alt="Fotografia 2">
              <img class="tphoto" v-bind:src="item.photo3" alt="Fotografia 3">
              <img class="tphoto" v-bind:src="item.photo4" alt="Fotografia 4">
              <div class="buttoncenter">
                  <router-link :to="'/galeria'">
                  <button type="button" class="icon" @click="top()">
                      <img v-bind:src="item.src" class="button-image" alt="Przycisk Galeria">
                  </button>
                  </router-link>
              </div>
          </div>
      </div>
  </li>
</ul>
    </transition>
</template>

<script>
export default {

  data() {
    return {
      therapeutistsApi: [],
        loaded: false,
      items: [
        {
          boxTitle: 'Godziny Przyjęć',
          src: require('../assets/phone-receiver2.png'),
          cl: 'number1'
        },
        { boxTitle: 'Poznaj nas',
          src: require('../assets/user-silhouette2.png'),
          cl: 'number2'
        },
        {
          boxTitle: 'Turnusy',
          src: require('../assets/nut-icon.png'),
          photo: require('../../public/img/Categories/5b93bc498f648.jpeg'),
          cl: 'number3'
        },
        { boxTitle: 'Galeria',
          src: require('../assets/photo-camera2.png'),
          photo1: require('../../public/img/Categories/5b93bc498f648.jpeg'),
          photo2: require('../../public/img/Galleries/26/5b93a2a06863a.jpeg'),
          photo3: require('../../public/img/Galleries/26/5b93a2a7a00af.jpeg'),
          photo4: require('../../public/img/Galleries/17/5b7c6a2f42a49.jpeg'),
          cl: 'number4'
        }
      ]
    };
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
        },
        top(){
            window.onbeforeunload = function () {
                window.scrollTo(0, 0);
            }

        }
    },
    created: function () {
        this.fetchTherapists();
    }
};
</script>

<style scoped>
ul{
  margin: 0;
  padding: 0;
  list-style: none;
}
#therapimg{
    filter: brightness(1.4)
}
.box1 {
  height: minmax(300px, auto);

}
p{
    margin-bottom: 0px;
    padding-left: 5px;
    padding-right: 5px;
}
.rlink{
    color:#000;
    grid-column: 1/-1;
    text-decoration:none;
}

#number1 {
    padding-top: 10px;
    padding-bottom: 10px;
    grid-column: 1/2;
    /*Szablon 1 */
    background: #FFF1CD;
    /*Szablon 2

    background: #50BFC8;
    background: #6ED4DB;
    background: #0DDDEC;

    /* Szablon 3
    background: #C4EAFF;

    /*Szablon 4
    background: #ff9dae;
    /*Szablon 5
    background: #ffd5ce;*/
    /*Szablon 6*/
    /*background: #00ece1;*/
    background-color: rgba(83,225,237,0.2);
    /*border: 10px solid #00ece1;*/
}
#number2 {
    padding-top: 10px;
    padding-bottom: 10px;
    grid-column: 2/3;
    /*Szablon 1
    background: #FDDCBB;
    /*Szablon 2
    background: #116AAB;

    background: #50BFC8;
    background: #2BA9B2;

     Szablon 3
    background: #81CDFF;
    Szablon 4
    background: #eb0165;
    Szablon 5
    background: #fa8072;*/
    /*Szablon 6*/
   background: rgba(83,225,237,0.9);
    /*border: 10px solid #a6b7b5;*/

}
#number3 {
    padding-top: 10px;
    padding-bottom: 10px;
    /*Szablon 1 */
    background: #FECB6E;
    /*Szablon 2
    background: #B7B7B7;

     Szablon 3
    background: #53B1F9;
    Szablon 4
    background: #B7B7B7;
    Szablon 5
    background: #ffbdc7;

   /* Szablon 6*/
   background: rgba(255,95,255,0.2);
    /* border: 10px solid #d37c8c;*/

 }
 #number4 {
     padding-top: 10px;
     padding-bottom: 10px;
     /*Szablon 1 */
    background: #FD996B;
    /*Szablon 2
    background: #78797C;
    /* Szablon 3
    background: #0072B5;
    /*Szablon 4
    background: #78797C;
    /* Szablon 5
    background: #eb0165;*/
   /* Szablon 6*/
   background: rgba(235,1,101,0.6);
/* border: 10px solid #eb0165;*/
}

.rlink:hover{
 color: #FECB6E;
}
@media (min-width: 800px){
 ul li {
     width: 25%;
     height: auto;
 }
 ul {
     display: flex;
     justify-content: space-around;

 }

}
#trailer1{
 grid-column:1/2;
 display:grid;
 grid-template-columns: repeat(2,1fr);
}
#trailer4{
 grid-column-start: 2;
 grid-column-end: 3;
 display:grid;
 grid-template-columns: repeat(2,1fr);
}
.tphoto{
 width:100%;
 padding:10px;
 max-height:165px;
}
.box-title {
 margin: 0;
 margin-bottom: 10px;
 padding: 0;
 grid-column: 1/-1;
}
.icon{
 padding: 0;
 width: 60px;
 height: 60px;
 border: 1px solid #FBC13C;
 border: 1px solid #000000;
 border-radius: 100%;
 background: #FDE36B;
 background: #ffffff;
 text-align: center;
}
/*.icon:hover{
 width:100px;
 height:100px;
 transition: 1s;
}*/
.button-image{
 width: 50%;
 color: black;
}
.buttoncenter{
 grid-column: 1/-1;
 display:flex;
 justify-content: center;
 align-items: center;

}
#therapimg{
 height: 200px;
 width: 200px;
 border-radius: 100%;
 margin:10px;
}
#turnusphoto{
    padding: 10px;
    width: 90%;
}
 h4{
     font-size:16px;
     margin: 5px 0px;
 }

.fade-enter-active {
 transition: opacity 1s;
}
.fade-enter /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>

