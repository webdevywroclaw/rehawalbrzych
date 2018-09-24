<template>

  <div class="contact">
    <div class="contactitem">
      <div class="icon-center">
        <font-awesome-icon id="addres" icon="map-marker-alt"></font-awesome-icon>
      </div>
      <div class="textforcontact">
        <h3 class="contact-text">{{adres}}</h3>
      </div>
    </div>
    <div class="contactitem">
      <div class="icon-center">
        <font-awesome-icon id="phone" icon="phone"></font-awesome-icon>
      </div>
      <div class="textforcontact">
        <h3 class="contact-text">{{telephone}}</h3>
      </div>
    </div>
    <div class="contactitem" id="ctc">
      <div class="icon-center">
        <font-awesome-icon id="at" icon="at"></font-awesome-icon>
      </div>
      <div class="textforcontact">
        <h3 class="contact-text">{{mail}}</h3>
      </div>
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
    padding-top:20px;
  }
  .contactitem{
    margin-top: -30px;
  }
  #phone,#addres,#at{
    height:50px;
    width: 50px;
    color: #FECB6E;
    margin:5px;
  }
  .icon-center{
    position: relative;
    top: 40px;
    width: 80px;
    margin: auto;
    background-color: #fff;
  }
  .textforcontact{
    min-height: 120px;
    border: 2px dotted #FECB6E;
    margin:10px;
    display: flex;
    align-items: center;
    justify-content: center;
    word-break: break-word;
  }
  h3{
    margin: auto;
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

  @media (min-width: 640px) {
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
