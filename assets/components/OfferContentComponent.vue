<template>
  <div id="test2">
    <div class="offerts" v-if="$route.name === 'OfferContentComponent'">
    <ul>
      <offer-component v-for="methodCatApi in methodsCatApi" :key="methodCatApi" :methodCatApi="methodCatApi" ></offer-component>
    </ul>
    </div>
    <div v-else>
      <h1>dupa</h1>
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
        { box2Title: 'WADY POSTAWY', class: 'box2-image1', cat_id: '1'},
        { box2Title: 'WADY STÓP', class: 'box2-image2', cat_id: '2'},
        { box2Title: 'REHABILITACJA DZIECI', class: 'box2-image3', cat_id: '3'},
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
        }
    },
    created: function () {
        this.fetchCatMethods();
    }
}
</script>

<style>
  ul {
  list-style: none;
  padding: 0px;
  margin: 0px;
}
  @media (min-width: 700px){
        .offerts {
        display: grid;
        grid-template-columns: repeat(6,1fr);
    }
    .offerts ul {
        display: grid;
        list-style: none;
        grid-column-start: 2;
        grid-column-end: 6;
        grid-template-columns: repeat(4,1fr);
        grid-gap: 20px;
    }
} 
</style>
