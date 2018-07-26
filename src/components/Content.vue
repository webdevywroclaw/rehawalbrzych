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

        margin: auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-row-gap: 20px;


    }

    #image {
        border: 2px solid black;
        grid-column: 1/-1;
        justify-self: center;
    }

    .trailerBox {
        grid-column: 1/-1;
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
        grid-column: -1/1;
        display: grid;
        grid-template-columns: repeat(8, auto);
        grid-template-rows: auto auto;
        grid-gap: 10px;


    }

    .offer {
        grid-auto-flow: dense;
        grid-column: span 3;

        border: 1px solid black;



    }

</style>
