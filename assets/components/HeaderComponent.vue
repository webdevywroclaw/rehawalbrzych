<template>
<header class="header">
  <div id="contact-top">
    <!-- <img src="../assets/placeholder-for-map.png" class="button-image nr1">
    <span class="nr1">{{adres}}</span>
    <img src="../assets/phone-receiver.png" class="button-image nr2">
    <span class="nr2">{{telephone}}</span>
    <img src="../assets/black-envelope.png" class="button-image nr3">
    <span class="nr3">{{mail}}</span> -->
    <font-awesome-icon id="addres" icon="map-marker-alt"></font-awesome-icon>
    <span class="nr1">{{adres}}</span>
    <font-awesome-icon id="phone" icon="phone"></font-awesome-icon>
    <span class="nr2">{{telephone}}</span>
    <font-awesome-icon id="at" icon="at"></font-awesome-icon>
    <span class="nr3">{{mail}}</span>
  <router-view name="menu"></router-view>
  </div>
</header>
</template>

<script>
import MenuComponent from './MenuComponent'
export default {
  data () {
    return {
      adres: 'ul. Wrocławska 5, 58-332 Wałbrzych',
      telephone: '+48 784 891 919',
      mail: 'rehawałbrzych@gmail.com'
    }
  },
  components: {
    MenuComponent
  }
}
</script>

<style scoped>

  .header{
    min-height: 100px;
  }
  #contact-top {
    margin-right: 10px;
    width: 100%;
    height: 30px;
    line-height: 30px;
    text-align: right;
    /*Szablon 2 i 3*/
    border-bottom: 2px dotted #25D9E8;
    /*border-bottom: 2px dotted #ff9dae;*/



    background-color: #F0EDD2;
    background-color: #ffe2a8;
    /*Option 2*/
    background-color: #AFAFAF;
    background-color: #25D9E8;
    background-color: #ffffff;
  }

  #contact-top span {
    margin-right: 5px;
    font-weight: 450;
  }

  #addres,#phone,#at {
    margin-left: 20px;
    margin-right: 3px;
    color: #25D9E8;
    color: #FC71F8;
    color: #eb0165;
    color: #25D9E8;
  }

  @media (max-width:550px){
    .nr1{
      display:none;
    }
    #addres{
      display: none;
    }
  }
  @media (max-width:800px){
    .nr3{
      display:none;
    }
    #at{
      display: none;
    }
  }
</style>
