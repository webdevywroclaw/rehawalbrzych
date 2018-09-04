<template>
  <div id="ter">
  <img v-bind:src="therapeutistApi.photoPhoto.photoSrc">
  <div class="description">
   <h2 >{{therapeutistApi.therapName}} {{therapeutistApi.therapSurname}}</h2>
   <h4>{{therapeutistApi.therapDesc}}</h4>
   <router-link :to="'/terapeuta/'+therapeutistApi.therapId"><button>More</button></router-link>
  </div>
  </div>
</template>

<script>
export default {
  props: ['therapeutistApi'],
}

</script>

<style scoped>
  #ter{
  border: 1px solid #fde36b;
  display: grid;
  grid-template-columns: 200px 1fr;
  margin: 10px;
  }
  img{
    width: 200px;
    height:250px;
  }
  h2{
  overflow-wrap: break-word;
  word-wrap: break-word;
  hyphens: auto;

  }
   @media (max-width: 500px){
     img{
       width:100px;
       height:125px;
     }
     #ter{
       grid-template-columns: 100px 1fr;
     }
   }

</style>
