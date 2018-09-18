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
    <div class="contactitem" id="ctc">
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
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    grid-gap:10px;
    /*margin-top:100px;*/
  }
  .contactitem>h3 {
    margin: auto;
    font-size: 1.5rem;
  }
  .contact-text {
    margin: 10px 20px;
    text-align: center;
    padding: 10px;
  }
  .contactitem{
    border: 2px dotted #FECB6E;
    margin:10px;
    display: flex;
    align-items: center;
    word-break: break-word;
  }
  #phone,#addres,#at{
    height:50px;
    width: 50px;
    color: #FECB6E;
    margin:5px;
  }
  /*h3{*/
    /*font-size: 20px;*/
  /*}*/

  @media (max-width: 350px) {
    .contactitem>h3{
      font-size: 1.3rem;
    }
    .contact{
      display:grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      grid-gap:10px;
      /*margin-top:50px;*/
    }
  }

  @media (min-width: 500px) {
    .contact {
      display: grid;
      grid-template-columns: repeat(2, minmax(250px, 1fr));
      grid-gap: 10px;
      /*margin-top: 50px;*/
    }

    #ctc {
      grid-column: 1/3;
    }

  }
    @media (min-width: 1000px){
      .contact{
        display:grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        grid-gap:10px;
        /*margin-top:50px;*/
      }
      #ctc{
        grid-column: 3/4;
      }
    }



</style>
