<template>
  <div>
    <h1>{{article[0].artTitle}}</h1>
    <p>{{article[0].artBody}}</p>
    <div v-for="art in articles" v-bind:art="art">
      <div v-if="art.artId == $route.params.id">
        <h1>{{art.artTitle}}</h1>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props:['articles'],
    data(){
        return{
            article: {
                "0":{},
                "photos":[]
            }
        }
    },
    methods: {
        fetchArticle() {
            this.$http.get('/api/article/' + this.$route.params.id,
                {
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Accept': 'application/json'
                    }
                }
            )
                .then(response => response.json())
                .then(result => {
                    this.article = result
                    this.loaded = true
                })
        }
    },
    created: function () {
        this.fetchArticle();
    }
}
</script>

<style>

</style>