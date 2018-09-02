<template>
  <div>
    <h3>{{adres}}</h3>
    <h3>{{telephone}}</h3>
    <h3>{{mail}}</h3>
    <google-map></google-map>
  </div>
</template>

<script>
    import GoogleMap from "./GoogleMap"
export default {
  data () {
    return {
      adres: 'ul. Wrocławska 5, 58-332 Wałbrzych',
      telephone: '+48 784 891 919',
      mail: 'rehawałbrzych@gmail.com'
    }
  },
    components: {
        GoogleMap
    }
}
</script>

<style>
</style>
