<template>
<div>
    <h1>{{method[0].metName}}</h1>
    <span v-html="method[0].metBody"/>
</div>
  <!-- <div v-if="method[0].metId === $route.params.id">
    <h1>method[0].metName</h1>
  </div>
  -->
  <!--
  <div v-if="$route.params.id === 'metoda1'">
    <img v-bind:src="methods[0].photo">
    <h1>{{methods[0].title}}</h1>
    <h2>{{methods[0].price}}</h2>
    <h4>{{methods[0].body}}</h4>

  </div>
  <div v-else-if="$route.params.id === 'metoda2'">
    <img v-bind:src="methods[0].photo">
    <h1>{{methods[1].title}}</h1>
    <h1>{{methods[1].price}}</h1>
    <h4>{{methods[1].body}}</h4>
  </div>
  <div v-else-if="$route.params.id === 'metoda3'">
    <img v-bind:src="methods[0].photo">
    <h1>{{methods[2].title}}</h1>
    <h1>{{methods[2].price}}</h1>
    <h4>{{methods[2].body}}</h4>
  </div>
  <div v-else-if="$route.params.id === 'metoda4'">
    <img v-bind:src="methods[0].photo">
    <h1>{{methods[3].title}}</h1>
    <h1>{{methods[3].price}}</h1>
    <h4>{{methods[3].body}}</h4>
  </div>
  -->
</template>

<script>
  export default {
      data(){
          return{
             method: {
                "0": {},
                 "photos":[]
             }
          }
      },

      methods: {
          fetchMethod() {
              this.$http.get('/api/method/'+ this.$route.params.id,
                  {
                      headers: {
                          'Content-Type': 'application/x-www-form-urlencoded',
                          'Accept': 'application/json'
                      }
                  }
              )
                  .then(response => response.json())
                  .then(result => {
                      this.method = result
                      this.loaded = true
                  })
          }
      },
      created: function () {
          this.fetchMethod();
      }
   /* props: ['methods'] */
  }
</script>

<style>

</style>
