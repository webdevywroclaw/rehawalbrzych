<template>

  <div class="contact">
    <div class="contactitem">
      <font-awesome-icon id="addres" icon="map-marker-alt"></font-awesome-icon>
      <h3 class="contact-text">{{adres}}</h3>
    </div>
    <div class="contactitem">
      <font-awesome-icon id="phone" icon="phone"></font-awesome-icon>
      <h3 class="contact-text">{{telephone}}</h3>
    </div>
    <div class="contactitem">
      <font-awesome-icon id="at" icon="at"></font-awesome-icon>
      <h3 class="contact-text">{{mail}}</h3>
    </div>
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
  .contact{
    display:grid;
    grid-template-columns: repeat(3,1fr);
    grid-gap:10px;
    margin-top:100px;
  }
  .contact-text {
    padding: 10px;
    margin: 10px 20px;
    text-align: center;
  }
  .contactitem{
    border: 2px dotted #FBC13C;
    margin:10px;
  }
  #phone,#addres,#at{
    height:50px;
    width: 50px;
    color: #fb933c;
    margin:5px;
  }
</style>
