<template>
  <div id="test2">
    <div class="offerts">
     <offer-component v-for="(methodCatApi,index) in methodsCatApi" :key="methodCatApi" :methodCatApi="methodCatApi" :style="{'background-image': 'url(' + offerts[index].bacg + ')'}" ></offer-component>
    </div>

  </div>
</template>

<script>
import OfferComponent from './OfferComponent'
export default {
    data () {
    return {
        methodsCatApi: [],

      offerts: [
        { box2Title: 'WADY POSTAWY', class: 'box2-image1', cat_id: '1',bacg: require('../assets/max-rovensky-545700-unsplash.jpg')},
        { box2Title: 'WADY STÓP', class: 'box2-image2', cat_id: '2', bacg: require('../assets/beach-boy-bubbles-106684.jpg')},
        { box2Title: 'REHABILITACJA DZIECI', class: 'box2-image3', cat_id: '3', bacg: require('../assets/abstract-beach-desert-723997.jpg')},
        { box2Title: 'REHABILITACJA DOROSŁYCH', class: 'box2-image4', cat_id: '4'}
      ]
     }
  },
  components: {
    OfferComponent
  },
    methods: {
        fetchCatMethods() {
            this.$http.get('/api/categories/kind/metoda',
                {
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Accept': 'application/json'
                    }
                }
            )
                .then(response => response.json())
                .then(result => {
                    this.methodsCatApi = result
                    this.loaded = true
                })
        },
    },
    created: function () {

        this.fetchCatMethods();
    }
}
</script>

<style scoped>
  ul {
  list-style: none;
  padding: 0px;
  margin: 0px;
}
  .offerts{
      margin-top: 20px;
  }

  @media (min-width: 650px){
    .offerts{
        display: grid;
        list-style: none;
        grid-template-columns: 25% 25% 25% 25%;
    }
}
</style>
