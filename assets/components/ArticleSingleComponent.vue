<template>
  <div class="art">
    <div class="author">
      <img v-bind:src="article[0].artAuthor.photoPhoto.photoSrc">
      <h3>{{article[0].artAuthor.therapName}} {{article[0].artAuthor.therapSurname}}</h3>
    </div>
    <h1>{{article[0].artTitle}}</h1>
    <p>{{article[0].artBody}}</p>


  </div>
</template>

<script>
export default {
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

<style scoped>
img{
  height: 150px;
  width: 150px;
  border-radius: 100%;
  margin:10px;
}
  art{
    display: block;
  }
  .author{
    width: 200px;
    text-align: center;
  }
</style>