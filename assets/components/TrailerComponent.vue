
<template>
<ul>
  <li v-for="item in items" v-bind:key="item" :id="item.cl">
      <div class="box1">

          <div id="trailer1" v-if="item.cl === 'number1'">
              <h3 class="box-title">{{item.boxTitle}}</h3>
              <h4>Poniedziałek</h4><h4> 8.00-16.00</h4>
              <h4>Wtorek</h4><h4>8.00-16.00</h4>
              <h4>Środa</h4><h4>8.00-16.00</h4>
              <h4>Czwartek </h4><h4>8.00-16.00</h4>
              <h4>Piątek </h4><h4>8.00-16.00</h4>
              <h4>Sobota </h4><h4>nieczynne</h4>
              <h4>Niedziela</h4><h4>nieczynne</h4>
              <div class="buttoncenter">
                  <router-link :to="'/kontakt'">
                      <button type="button" class="icon">
                      <img v-bind:src="item.src" class="button-image">
                      </button>
                  </router-link>
              </div>
          </div>

          <div id="trailer2" v-if="item.cl === 'number2'">
              <h3 class="box-title">{{item.boxTitle}}</h3>
              <img id="therapimg" v-bind:src="therapeutistsApi[0].photoPhoto.photoSrc">
              <h3>{{therapeutistsApi[0].therapName}} {{therapeutistsApi[0].therapSurname}}</h3>
              <router-link :to="'/terapeuci'">
                  <button type="button" class="icon">
                  <img v-bind:src="item.src" class="button-image">
                  </button>
              </router-link>
          </div>

          <div id="trailer3" v-if="item.cl === 'number3'">
              <h3 class="box-title">{{item.boxTitle}}</h3>
              <img id="turnusphoto" v-bind:src="item.photo">
              <p>Pragniemy poinformować, że w roku 2019 ruszamy z programem turnusów rehabilitacyjnych. Więcej informacji wkrótce!.</p>
          </div>

          <div id="trailer4" v-if="item.cl === 'number4'">
              <h3 class="box-title">{{item.boxTitle}}</h3>
              <img class="tphoto" v-bind:src="item.photo1">
              <img class="tphoto" v-bind:src="item.photo2">
              <img class="tphoto" v-bind:src="item.photo3">
              <img class="tphoto" v-bind:src="item.photo4">
              <div class="buttoncenter">
                  <router-link :to="'/galeria'">
                  <button type="button" class="icon">
                      <img v-bind:src="item.src" class="button-image">
                  </button>
                  </router-link>
              </div>
          </div>
      </div>
  </li>
</ul>

</template>

<script>
export default {

  data() {
    return {
      therapeutistsApi: [],
      items: [
        {
          boxTitle: 'Godziny Przyjęć',
          src: require('../assets/phone-receiver.png'),
          cl: 'number1'
        },
        { boxTitle: 'Poznaj nas',
          src: require('../assets/user-silhouette.png'),
          cl: 'number2'
        },
        {
          boxTitle: 'Turnusy',
          src: require('../assets/nut-icon.png'),
          photo: require('../../public/img/Categories/5b93bc498f648.jpeg'),
          cl: 'number3'
        },
        { boxTitle: 'Galeria',
          src: require('../assets/photo-camera.png'),
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

.box1 {
  height: minmax(300px, auto);

}

#number1 {
  background: #fbfc9a;
    grid-column: 1/2;
}
#number2 {
  background: #fde36b;
    grid-column: 2/3;
}
#number3 {
  background: #fbc13c;
}
#number4 {
  background: #fb933c;
}


@media (min-width: 700px){
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
    margin: 10px;
    padding: 0;
    grid-column: 1/-1;
}
.icon{
    padding: 0;
    margin-bottom: 10px;
    width: 40px;
    height: 40px;
    border: 1px solid #FBC13C;
    border-radius: 100%;
    background: #FDE36B;
    text-align: center;
}
.button-image{
    width: 50%;
}
.buttoncenter{
    grid-column: 1/-1;
}
#therapimg{
    height: 200px;
    width: 200px;
    border-radius: 100%;
    margin:10px;
}
#turnusphoto{
    padding:10px;
}
</style>

