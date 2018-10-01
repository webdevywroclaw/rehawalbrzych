<template>
    <div>
        <div v-if="done" class="preview-img-list">

            <figure  v-for="(photo, index) in photos" :key="photo" v-bind:photo="photo" @click="$photoswipe.open(index, photos)">
                <img class="preview-img-item" :src="photo.src" :alt="photo.title">
                <figcaption itemprop="caption description">{{photo.title}}</figcaption>

            </figure>

        </div>

    </div>
</template>

<style scoped>
    /*.preview-img-list {*/
    /*display: flex;*/
    /*flex-wrap: wrap;*/
    /*align-items: center;*/
    /*justify-content: center;*/
    /*}*/
    /*.preview-img-item {*/
    /*!*margin: 5px;*!*/
    /*max-width: 200px;*/
    /*max-height: 200px;*/
    /*}*/
    /*figure {*/
    /*width: 250px;*/
    /*height: 250px;*/
    /*position: relative;*/
    /*background-color: darkorange;*/
    /*margin: 4px;*/
    /*}*/

    /*figure figcaption {*/
    /*text-align: center;*/
    /*position: absolute;*/
    /*bottom: 0;*/
    /*right: 0;*/
    /*left: 0;*/
    /*}*/

    /*figure img {*/
    /*position: absolute;*/
    /*left: 50%;*/
    /*top: 50%;*/
    /*transform: translate(-50%, -60%);*/
    /*}*/

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
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-size: 12px;
        /*border: thin #c0c0c0 solid;*/
        /*padding: 5px;*/
        height: 200px;
        display: inline-block;
        width: min-content;
        background-color: white;
        margin: 4px;
    }

    figure figcaption {
        font-style: italic;
        text-align: center;
        word-wrap: break-word;
        overflow-y:auto;
        max-height: 20px;
        max-width: 300px;
        bottom: 0;
        right: 0;
        left: 0;
        background-color: #FEFAD1;
    }

    figure img {
        height: 90%;
        width: auto;

    }
</style>

<script>

export default {
  name: 'GalleryComponent',
  props: ['id'],
  data () {
    return {
      img: [],
      done: false,
      size: [],
      galleries: [],
      photos: [
        {
          'photoId': 25,
          'photoSrc': '/img/Categories/5b7c6ada5c54d.jpeg',
          'photoStorage': null,
          'photoTitle': '5b7c6ada5c54d.jpeg'
        },
        {
          'photoId': 51,
          'photoSrc': '/img/Categories/5b8706d98dcf2.jpeg',
          'photoStorage': null,
          'photoTitle': '5b8706d98dcf2.jpeg'
        },
        {
          'photoId': 53,
          'photoSrc': '/img/Categories/5b87d392c78b8.jpeg',
          'photoStorage': null,
          'photoTitle': '5b87d392c78b8.jpeg'
        }
      ]

    }
  },
  methods: {
    fetchGallery () {
      this.$http.get('/api/photos/' + this.id,
        {
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Accept': 'application/json'
          }
        }
      )
        .then(response => response.json())
        .then(result => {
          this.photos = result
          this.getPhotosSize()
          this.done = true
        })
    },
    getPhotosSize () {
      for (var i = 0; i < this.photos.length; i++) {
        var photo = this.photos[i]
        photo.src = photo.photoSrc
        photo.title = photo.photoTitle
        // photo.h = 400;
        // photo.w = 400;
        this.img[i] = new Image()
        this.img[i].onload = function () {
            this.photo.h = this.height
            this.photo.w = this.width
          // alert(this.width)
        }
        this.img[i].onerror = function () {
          alert('błąd wczytywania obrazu')
        }
        this.img[i].photo = photo
          this.img[i].src = photo.src
        // photo.w = this.img[i].width
        // photo.h = this.img[i].height
      }

      // var photo = this.items[0]
      // var img = new Image()
      // img.src = photo.src
      // img.onload = function () {
      //     alert(this.width + ' ' + this.height)
      //     photo.h = this.width
      //     photo.w = this.height
      // }
    }
  },
  created: function () {
    this.fetchGallery()
    // this.getPhotosSize()
  }
}
</script>
