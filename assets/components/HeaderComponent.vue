<template>
<div class="header">
  <div id="contact-top">
    <img src="../assets/placeholder-for-map.png" class="button-image nr1">
    <span class="nr1">{{adres}}</span>
    <img src="../assets/phone-receiver.png" class="button-image nr2">
    <span class="nr2">{{telephone}}</span>
    <img src="../assets/black-envelope.png" class="button-image nr3">
    <span class="nr3">{{mail}}</span>
  </div>
  <router-view name="menu"></router-view>
</div>
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
    height: 100px;
  }
  #contact-top {
    margin-right: 10px;
    width: 100%;
    height: 30px;
    line-height: 30px;
    text-align: right;
    border-bottom: 1px dotted #FDE36B;
  }

  #contact-top span {
    margin-right: 5px;
  }

  #contact-top img {
    height: 15px;
    width: 15px;
    margin-left: 20px;
    margin-right: 3px;
  }

  @media (max-width:550px){
    .nr1{
      display:none;
    }
  }
  @media (max-width:800px){
    .nr3{
      display:none;
    }
  }
</style>
