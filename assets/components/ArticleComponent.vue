<template>
    <div id="articles" >
        <div class="article" v-for="article in articles">
            <h2 >{{article.artTitle}}</h2>
            <h3>{{article.artAuthor.therapName}} {{article.artAuthor.therapSurname}}</h3>
            <router-link :to="'/artykul/'+article.artId"><button>Czytaj</button></router-link>
        </div>
    </div>

</template>

<script>

export default {
  data () {
   return {
        articles:[],
        }
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

<style scoped>
    #articles{
        display:grid;
        grid-template-columns: repeat(auto-fit,minmax(300px,1fr));
    }
    .article{
        border: 1px dotted #fbc13c;
        margin: 10px;
    }
    button{
        margin: 5px;
        border-radius: 10%;
    }
</style>
