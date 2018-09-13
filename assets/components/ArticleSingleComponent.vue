<template>
  <div class="art">
    <div class="author">
      <img v-bind:src="article[0].artAuthor.photoPhoto.photoSrc">
      <h3>{{article[0].artAuthor.therapName}} {{article[0].artAuthor.therapSurname}}</h3>
    </div>
    <h1 id="title">{{article[0].artTitle}}</h1>
    <p id="body">{{article[0].artBody}}</p>


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
#body {
  margin-left: 10px;
  margin-right: 10px;
  text-align: justify;
  overflow-wrap: break-word;
  word-wrap: break-word;
  hyphens: auto;
}
@media (min-width: 700px) {
  .art {
    display: grid;
    grid-template-columns: 200px 1fr;
    grid-gap: 20px;

  }

  .author {
    grid-column: 1/2;

  }

  .author {
    width: 200px;
    text-align: center;
  }

  #title {
    justify-self: center;
    align-self: center;
  }

  #body {
    grid-column: 1/-1;
  }
}
</style>