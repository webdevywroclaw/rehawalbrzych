<template>
<header class="header">
  <div id="contact-top">
    <!-- <img src="../assets/placeholder-for-map.png" class="button-image nr1">
    <span class="nr1">{{adres}}</span>
    <img src="../assets/phone-receiver.png" class="button-image nr2">
    <span class="nr2">{{telephone}}</span>
    <img src="../assets/black-envelope.png" class="button-image nr3">
    <span class="nr3">{{mail}}</span> -->
    <span class="nr0"><a href="http://old.rehawalbrzych.pl">Stara wersja strony</a></span>
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
      adres: 'ul. Mieszka I nr 97, 58-309 Wałbrzych',
      telephone: '+48 784 891 919',
      mail: 'rehawalbrzych@gmail.com'
    }
  },
  components: {
    MenuComponent
  }
}
</script>

<style scoped>

  .header{
    position: fixed;
    top: 0;
    z-index: 2;
    width: 100%;
    max-width: 1400px;
    min-height: 120px;
    box-shadow: 0 3px 2px -2px #a6a6a6;
  }

  #contact-top {
    margin-right: 0px;
    padding-right: 0px;
    height: 40px;
    line-height: 40px;
    text-align: right;
    border-bottom: 1px solid #25D9E8;
    background-color: #ffffff;
  }

  #contact-top span {
    margin-right: 5px;
    font-weight: 500;
  }

  #addres,#phone,#at {
    margin-left: 20px;
    margin-right: 3px;
    color: #25D9E8;
    color: #FC71F8;
    color: #eb0165;
    color: #25D9E8;
  }
  .nr0{
    font-size: 10px;
    position: absolute;
    color: black;
    top: 0%;
    left: 1%
  }
  a{
    color: #000;
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
  @media (max-width:900px){
    .nr0{
      display: none;
    }
  }
</style>
