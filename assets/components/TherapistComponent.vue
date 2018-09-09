<template>
  <div id="ter">
      <h2 >{{therapeutistApi.therapName}} {{therapeutistApi.therapSurname}}</h2>
      <div class="obramowanie">
      <img v-bind:src="therapeutistApi.photoPhoto.photoSrc" alt="Avatar">
      </div>
      <h2> TERAPEUTA </h2>
      <router-link :to="'/terapeuta/'+therapeutistApi.therapId"><button>More</button></router-link>
  </div>
</template>

<script>
export default {
  props: ['therapeutistApi'],
}

</script>

<style scoped>
  #ter{
  /* border: 1px solid #fde36b; */
  margin: 10px;
  }
  img{
      height: 250px;
      width: 250px;
      border-radius: 100%;
      margin:10px;
  }
  h2{
  overflow-wrap: break-word;
  word-wrap: break-word;
  hyphens: auto;

  }
   @media (max-width: 500px){

     #ter{
       grid-template-columns: 1fr 1fr;
     }
   }

</style>
