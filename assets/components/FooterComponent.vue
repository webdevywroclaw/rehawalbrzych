<template>
  <div class="contact">
    <h3 class="contact-text">{{adres}}</h3>
    <h3 class="contact-text">{{telephone}}</h3>
    <h3 class="contact-text">{{mail}}</h3>
  </div>
</template>

<script>
export default {
  data () {
    return {
      adres: 'ul. Wrocławska 5, 58-332 Wałbrzych',
      telephone: '+48 784 891 919',
      mail: 'rehawałbrzych@gmail.com'
    }
  }
}

</script>

<style scoped>
  .contact-text {
    border: 1px dotted #FBC13C;
    padding: 10px;
    margin: 10px 20px;
    text-align: center;
  }
</style>
