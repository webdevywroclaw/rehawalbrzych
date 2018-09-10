<template>
<div>
    <h1>{{method[0].metName}}</h1>
    <span v-html="method[0].metBody"/>
    <gallery-component :id="method[0].galleryGal.galId"></gallery-component>
</div>

</template>

<script>
    import GalleryComponent from '../components/GalleryComponent'
  export default {
      data(){
          return{
             method: {
                "0": {},
                 "photos":[]
             }
          }
      },
      components: {
          GalleryComponent
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
