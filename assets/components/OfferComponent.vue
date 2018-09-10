<template>

            <div class="box2" >
              <!-- <div :id="offer.class" :style="{ backgroundImage: 'url('+offer.backgroundUrl+');'}"> -->
                <div class="bx">

                     <span class="box2-title">{{methodCatApi.catName}}</span>
                    <router-link :to="'/metody/'+methodCatApi.catId"><button>More</button></router-link>
                </div>
             <!-- </div> -->
            </div>


</template>

<script>
export default {
  props: ['methodCatApi'],
    data(){
      return{
      bckgs:[
          {bacg: url('../assets/max-rovensky-545700-unsplash.jpg')},
          {bacg: url('../assets/beach-boy-bubbles-106684.jpg')},
          {bacg: url('../assets/beach-elderly-love-160936.jpg')},
      ]
      }
    }
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
.bx{
    text-align: center;
    vertical-align: middle;
}
.box2:nth-child(1) {
  background-image: url('../assets/max-rovensky-545700-unsplash.jpg');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: 100%;
  opacity: 0.4;
}
#166 {

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
    img{
        width: 100%;
        height: 100%;

    }
</style>
