<template>
  <div>
    <div v-for="gallery in galleries" :key="gallery" v-bind:gallery="gallery">
      <h2   style="text-align: center">{{gallery.galName}}</h2>
      <gallery-component  :id="gallery.galId"></gallery-component>
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

<style>
  .preview-img-list {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
  }
  .preview-img-item {
    /*margin: 5px;*/
  }
  figure {
    border: thin #c0c0c0 solid;
    padding: 5px;
    height: 250px;
    width: min-content;
    background-color: white;
    margin: 4px;
  }

  figure figcaption {
    text-align: center;
    word-wrap: break-word;
    overflow-y:auto;
    max-height: 20px;
    bottom: 0;
    right: 0;
    left: 0;
  }

  figure img {
    height: 90%;
    width: auto;

  }
</style>
