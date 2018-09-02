<template>
  <div v-if="k === '1'">
    <h1>{{items.art_title}}</h1>
    <h1>dupa</h1>
  </div>
  <div v-else-if="k === '2'">
    <h1>{{items.art_title}}</h1>
  </div>
  <div v-else-if="k === '4'">
    C
  </div>
  <div v-else>
    Not A/B/C
  </div>
</template>

<script>
import OfferComponent from './OfferComponent'
export default {
  data () {
   return {
        items: [
          { art_id: '1', art_title:'Metoda1', art_body: 'aaaaaaaaaaaaaaaaaaaaaaa', category_id: '1'},
          { art_id: '2', art_title:'Metoda2', art_body: 'bbbbbbbbbbbbbbbbbbbbbbb', category_id: '1'},
          { art_id: '3', art_title:'Metoda3', art_body: 'cccccccccccccccccccccccc', category_id: '2'},
          { art_id: '4', art_title:'Metoda4', art_body: 'dddddddddddddddddddddddd', category_id: '2' }
        ]
      }
      },
    components: {
      OfferComponent
    }
  };
</script>

<style>

</style>
