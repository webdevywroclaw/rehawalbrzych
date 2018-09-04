<template>
    <div >
        <div v-for="article in articles">
        <span >{{article.artTitle}}</span>
        <span>{{article.artBody}}</span>
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

<style>

</style>
