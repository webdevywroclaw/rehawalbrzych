<template>

            <div class="box2" title="Kategoria metod">
                <div class="bx">
                     <h2 class="box2-title">{{methodCatApi.catName}}</h2>
                    <router-link :to="'/metody/'+methodCatApi.catId"><button>Więcej</button></router-link>
                </div>
             <!-- </div> -->
            </div>

</template>

<script>
export default {
    props: ['methodCatApi'],
    data(){
      return{

          cat:[],
          bckgs:[
          {ident: 'one',bacg: url('../assets/max-rovensky-545700-unsplash.jpg')},
          {ident: 'two' ,bacg: url('../assets/beach-boy-bubbles-106684.jpg')},
          {ident: 'three',bacg: url('../assets/beach-elderly-love-160936.jpg')},
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
    justify-self: center;
  padding: 0 20px;
    margin:20px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 90%;
    height: 300px;
    opacity: 0.5;
}

.box2:hover {
    opacity: 0.9;
    transition: 0.4s;
}
.bx{
    text-align: center;
    vertical-align: middle;
    opacity: 1;
}
.box2:nth-child(1){
    grid-column: 1/3;
    margin-top: 0px;
}
.box2:nth-child(2){
    grid-column: 3/5;
    margin-top: 0px;
}
.box2:nth-child(3){
    grid-column: 2/4;
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
button{
    margin-top: 30px;
    backgroud-color: none;
    border: 2px solid black;
    border-radius: 6px;
    font-size: 24px;
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

    h2{
        font-size: 30px;
    }
</style>
