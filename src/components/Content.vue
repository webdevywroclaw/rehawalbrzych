<template>
  <div class="content">
      <img id="image" src="../assets/logo.png"/>
    <div class="trailerBox">
          <div class="trailer">TRAILER</div>
          <div class="trailer">TRAILER</div>
          <div class="trailer">TRAILER</div>
          <div class="trailer">TRAILER</div>
     </div>
     <div class="offerBox">
      <div class="offer"><img src="../assets/logo.png"/></div>
      <div class="offer"><img src="../assets/logo.png"/></div>
      <div class="offer"><img src="../assets/logo.png"/></div>
      <div class="offer"><img src="../assets/logo.png"/></div>
      </div>
  </div>
</template>

<script>
    export default {
        name: 'Content',
        data() {
            return {
                msg: 'Welcome to Your Vue.js App'
            }
        }
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .content {
        background: #FFE4B5;
        margin: 0;
        display: grid;
        grid-row-gap: 20px;
        grid-template-columns: 1fr 1fr 8fr 1fr 1fr;


    }

    #image {
        border: 2px solid black;
        grid-column: 1/-1;
        justify-self: center;
    }

    .trailerBox {
        grid-column: 2/5;
        display: grid;
        grid-gap: 20px;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    }

    .trailer {
        font-size: 20px;
        border: 2px solid black;
        height: 200px;
        text-align: center;
    }

    .offerBox {
        grid-column: 3/4;
        display: grid;
        grid-template-columns: repeat(auto-fill,minmax(300px,1fr));
        grid-gap: 10px;


    }

    .offer {

        border: 1px solid black;
    }

</style>
