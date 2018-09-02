<template>
  <li>
    <div class="box2">
      <!-- <div :id="offer.class" :style="{ backgroundImage: 'url('+offer.backgroundUrl+');'}"> -->
        <h2 class="box2-title">{{methodCatApi.catName}}</h2>
        <router-link :to="{ name: 'MethodsComponent',params:{idcat: methodCatApi.catId}}"><button>More</button></router-link>
        <img v-bind:src="methodCatApi.photoId.photoSrc">
     <!-- </div> -->
    </div>
  </li>
</template>

<script>
export default {
  props: ['methodCatApi'],
}

</script>

<style scoped>

li {
  margin: 5px 0;
  padding: 0px;
}

.box2 {
  margin: 0;
  padding: 0;
}
#box2-image1 {

  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: 100%;
  z-index: -1;
  opacity: 0.4;
}
#box2-image2 {

  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: 100%;
  z-index: -1;
  opacity: 0.4;
}
#box2-image3 {

  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: 100%;
  z-index: -1;
  opacity: 0.4;
}
#box2-image4 {

  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: 100%;
  z-index: -1;
  opacity: 0.4;
}
.box2-title {
  margin-top: 0px;
  padding-top: 20px;
}
.more{
    padding: 5px;
    border: 1px solid black;
    border-radius: 10%;
    text-align: center;
    background: none;
    font-size: 16px;
    margin-bottom: 10px;
}
 @media (min-width: 700px){
    
 li{
        height:200px;
        display: grid;
        grid-column: span 2;
    }
 }
</style>
