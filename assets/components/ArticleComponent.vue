<template>
    <div >
        <div v-for="article in articles">
        <span >{{article.artTitle}}</span>
        <span>{{article.artAuthor.therapName}} {{article.artAuthor.therapSurname}}</span>
        <router-link :to="'/artykul/'+article.artId"><button>Czytaj</button></router-link>
        </div>
    </div>

</template>

<script>
    import ArticleSingleComponent from './ArticleSingleComponent'
export default {
  data () {
   return {
        articles:[],
        }
      },
    components:{
        ArticleSingleComponent
    },
    methods: {
        fetchArticles() {
            this.$http.get('/api/articles',
                {
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Accept': 'application/json'
                    }
                }
            )
                .then(response => response.json())
                .then(result => {
                    this.articles = result
                    this.loaded = true
                })

        }
    },
    created: function () {
        this.fetchArticles();
    }
  };
</script>

<style>

</style>
