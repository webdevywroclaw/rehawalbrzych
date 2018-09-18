<template>
  <div>
    <div v-if="gallery.galId!=1 && gallery.galId!=2" class="gallery" v-for="gallery in galleries" :key="gallery" v-bind:gallery="gallery">
      <h2 v-if="gallery.galId!=1 && gallery.galId!=2"  class="gal-header">
        <span >{{gallery.galName}}</span>
        <router-link v-if="gallery.metId!=null" :to="'metoda/'+gallery.metId.metId">Więcej...</router-link>
        <router-link v-if="gallery.artId!=null" :to="'artykul/'+gallery.artId.artId">Więcej...</router-link>
      </h2>
      <gallery-component v-if="gallery.galId!=1 && gallery.galId!=2" :id="gallery.galId"></gallery-component>
    </div>
  </div>
</template>

<script>
  import GalleryComponent from '../components/GalleryComponent'
    export default {
        name: 'GalleriesComponent',
        components: {
            GalleryComponent
        },
        data () {
            return {
                galleries: []
            }
        },
        methods: {
            fetchGalleries () {
                this.$http.get('/api/galleries',
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        }
                    }
                )
                    .then(response => response.json())
                    .then(result => {
                        this.galleries = result
                        this.loaded = true
                    })
            },
            getPhotosSize () {
                var photo = this.items[0]
                var img = new Image()
                img.src = photo.src
                img.onload = function () {
                    //   alert(this.width + ' ' + this.height)
                    photo.h = this.width
                    photo.w = this.height
                }
            }
        },
        created: function () {
            this.fetchGalleries()
            this.getPhotosSize()
        }
    }
</script>

<style scoped>
  .preview-img-list {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
  }
  .preview-img-item {
    /*margin: 5px;*/
  }
  /*figure {*/
    /*border: thin #c0c0c0 solid;*/
    /*padding: 5px;*/
    /*height: 250px;*/
    /*width: min-content;*/
    /*background-color: white;*/
    /*margin: 4px;*/
  /*}*/

  /*figure figcaption {*/
    /*text-align: center;*/
    /*word-wrap: break-word;*/
    /*overflow-y:auto;*/
    /*max-height: 20px;*/
    /*bottom: 0;*/
    /*right: 0;*/
    /*left: 0;*/
  /*}*/

  /*figure img {*/
    /*height: 90%;*/
    /*width: auto;*/

  /*}*/


  h2.gal-header {
    text-align: center;
    /*color: white;*/
    font-size: 24px;
    border: 2px;
    padding-bottom: 15px;
  }

  h2.gal-header>a {
    text-decoration: none;
    transition: background-color 1s;
  }

  h2.gal-header>a:active, h2.gal-header>a:visited, h2.gal-header>a:link {
    /*color: #FBC13C;*/
    color: #000000;
    border-radius: 7px;
    padding: 8px;
    display: block;
    margin: auto;
    margin-top: 15px;
    width: 100px;
    /*font-weight: 600;*/
    border: 1px #FECB6E;
    font-size: 14px;
    background-color: #FEFAD1;
  }

  h2.gal-header>a:hover {
    background-color: #fdf38f;
    /*color: #FBC13C;*/
    color: black;
  }

  .gallery {
    background-color: #FECB6E;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin: 20px 20px 0 20px;
    padding-top: 20px;
    padding-bottom: 20px;
  }

  .gallery:last-child {
      margin-bottom: 20px;
  }
</style>
