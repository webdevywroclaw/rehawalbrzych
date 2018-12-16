<template>
    <div id="articles" >
        <div class="article" v-for="article in articles">
            <h2 >{{article.artTitle}}</h2>
            <h4>{{article.artAuthor.therapName}} {{article.artAuthor.therapSurname}}</h4>
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
        margin-top: 20px;
        display:grid;
        grid-template-columns: repeat(auto-fit,minmax(300px,1fr));
    }
    .article{
        border: 3px dotted rgb(37,217,232);
        margin: 10px;
        padding:10px;
    }

    button{
        margin: 5px;
        background-color: #ffffff;
        border: 2px solid rgb(37,217,232);
        border-radius:10%;
        text-align: center;
        font-size: 20px;
    }
    button:hover{
        background-color: rgb(37,217,232);
        transition: 0.8s;
    }
    h2{
        font-size: 24px;
    }
    h4{
        font-size: 18px;
    }
    @media (min-width: 500px){
        #articles {
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
        }
    }
</style>
