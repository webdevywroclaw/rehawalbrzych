<template>

    <div id="ter">

      <div class="obramowanie">
          <router-link :to="'/terapeuta/'+therapeutistApi.therapId">
            <img v-bind:src="therapeutistApi.photoPhoto.photoSrc" :alt="'Avatar - '+ therapeutistApi.therapName + ' ' + therapeutistApi.therapSurname">
          </router-link>
      </div>
      <h2 >{{therapeutistApi.therapName}} {{therapeutistApi.therapSurname}}</h2>
      <h4> {{therapeutistApi.therapShort}} </h4>
       <router-link :to="'/terapeuta/'+therapeutistApi.therapId">
        <button>Więcej</button>
       </router-link>
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
  h4{
      margin: 10px 0;
  }
   @media (max-width: 500px){

     #ter{
       grid-template-columns: 1fr 1fr;
     }
   }
    button{
        background-color: #ffffff;
        border: 2px solid #25D9E8;
        border-radius:6px;
        text-align: center;
        font-size: 24px;
    }
  button:hover{
      background-color: #25D9E8;
      transition: 0.8s;
  }

</style>
